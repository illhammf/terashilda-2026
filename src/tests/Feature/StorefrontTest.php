<?php

use App\Livewire\CartComponent;
use App\Livewire\ContactFormComponent;
use App\Livewire\OrderFormComponent;
use App\Livewire\OrderTrackingComponent;
use App\Models\BusinessProfile;
use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\MenuItem;
use App\Models\Order;
use App\Models\Testimonial;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

function makeMenuItem(): MenuItem
{
    $category = Category::create([
        'name' => 'Mie',
        'slug' => 'mie',
        'is_active' => true,
    ]);

    return MenuItem::create([
        'category_id' => $category->id,
        'name' => 'Mie Jebew Spesial',
        'slug' => 'mie-jebew-spesial',
        'price' => 12000,
        'is_available' => true,
        'is_featured' => true,
    ]);
}

it('renders the redesigned welcome page', function () {
    BusinessProfile::create(['name' => 'Teras Hilda', 'is_active' => true]);
    makeMenuItem();
    Testimonial::create([
        'name' => 'Rani',
        'origin' => 'Solo',
        'rating' => 5,
        'message' => 'Enak banget!',
        'is_approved' => true,
    ]);

    $this->get('/')
        ->assertOk()
        ->assertSee('Teras Hilda')
        ->assertSee('Pilih Favoritmu')
        ->assertSee('Mie Jebew Spesial')
        ->assertSee('Rani');
});

it('adds an item to the cart through the livewire event', function () {
    $item = makeMenuItem();

    Livewire::test(CartComponent::class)
        ->dispatch('addToCart', id: $item->id)
        ->assertSet('cart', fn ($cart) => isset($cart[$item->id]) && $cart[$item->id]['quantity'] === 1)
        ->assertDispatched('cartUpdated', count: 1)
        ->assertDispatched('notify');

    expect(session('cart'))->toHaveKey($item->id);
});

it('creates an order and resets the cart', function () {
    $item = makeMenuItem();

    session(['cart' => [
        $item->id => [
            'id' => $item->id,
            'name' => $item->name,
            'price' => 12000.0,
            'image' => null,
            'quantity' => 2,
            'notes' => '',
        ],
    ]]);

    Livewire::test(OrderFormComponent::class)
        ->set('customer_name', 'Budi')
        ->set('customer_phone', '08123456789')
        ->call('submit')
        ->assertHasNoErrors()
        ->assertDispatched('orderCreated')
        ->assertDispatched('cartUpdated', count: 0)
        ->assertSet('cart', []);

    $order = Order::first();

    expect($order)->not->toBeNull()
        ->and($order->customer_name)->toBe('Budi')
        ->and((float) $order->total)->toBe(24000.0)
        ->and($order->items()->count())->toBe(1)
        ->and(session('cart'))->toBeNull();
});

it('stores a contact message and notifies the front-end', function () {
    Livewire::test(ContactFormComponent::class)
        ->set('contact_name', 'Sari')
        ->set('contact_email', 'sari@example.com')
        ->set('contact_subject', 'Tanya jam buka')
        ->set('contact_message', 'Halo, buka jam berapa?')
        ->call('submitContact')
        ->assertHasNoErrors()
        ->assertDispatched('notify');

    expect(ContactMessage::count())->toBe(1);
});

it('tracks an order by number and by phone', function () {
    $order = Order::create([
        'customer_name' => 'Budi',
        'customer_phone' => '08123456789',
        'subtotal' => 12000,
        'delivery_fee' => 0,
        'total' => 12000,
        'status' => 'pending',
        'payment_method' => 'cash',
        'payment_status' => 'unpaid',
        'pickup_type' => 'pickup',
    ]);

    Livewire::test(OrderTrackingComponent::class)
        ->set('search', $order->order_number)
        ->call('track')
        ->assertSet('notFound', false)
        ->assertSee($order->order_number);

    Livewire::test(OrderTrackingComponent::class)
        ->set('search', '08123456789')
        ->call('track')
        ->assertSet('notFound', false)
        ->assertSet('order.id', $order->id);

    Livewire::test(OrderTrackingComponent::class)
        ->set('search', 'TIDAK-ADA')
        ->call('track')
        ->assertSet('notFound', true);
});
