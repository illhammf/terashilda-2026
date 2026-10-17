<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use Livewire\Component;

class OrderFormComponent extends Component
{
    public array $cart = [];
    public string $customer_name = '';
    public string $customer_phone = '';
    public string $customer_email = '';
    public string $notes = '';
    public string $pickup_type = 'pickup';
    public string $payment_method = 'cash';
    public string $delivery_address = '';
    public float $delivery_fee = 0;

    protected $rules = [
        'customer_name' => 'required|string|max:255',
        'customer_phone' => 'required|string|max:20',
        'customer_email' => 'nullable|email|max:255',
        'notes' => 'nullable|string|max:500',
        'pickup_type' => 'required|in:pickup,delivery',
        'payment_method' => 'required|in:cash,transfer,qris,ewallet',
        'delivery_address' => 'required_if:pickup_type,delivery|string|max:500',
    ];

    protected $messages = [
        'customer_name.required' => 'Nama wajib diisi',
        'customer_phone.required' => 'Nomor HP wajib diisi',
        'customer_email.email' => 'Format email tidak valid',
        'delivery_address.required_if' => 'Alamat pengantaran wajib diisi',
    ];

    public function mount(): void
    {
        $this->cart = session('cart', []);
    }

    public function updatedPickupType(): void
    {
        $this->delivery_fee = $this->pickup_type === 'delivery' ? 5000 : 0;
    }

    public function getSubtotalProperty(): float
    {
        return collect($this->cart)->sum(fn ($item) => $item['price'] * $item['quantity']);
    }

    public function getTotalProperty(): float
    {
        return $this->subtotal + $this->delivery_fee;
    }

    public function submit(): void
    {
        if (empty($this->cart)) {
            $this->addError('cart', 'Keranjang masih kosong');
            return;
        }

        $this->validate();

        $order = Order::create([
            'customer_name' => $this->customer_name,
            'customer_phone' => $this->customer_phone,
            'customer_email' => $this->customer_email ?: null,
            'notes' => $this->notes ?: null,
            'subtotal' => $this->subtotal,
            'delivery_fee' => $this->delivery_fee,
            'total' => $this->total,
            'status' => 'pending',
            'payment_method' => $this->payment_method,
            'payment_status' => 'unpaid',
            'pickup_type' => $this->pickup_type,
            'delivery_address' => $this->pickup_type === 'delivery' ? $this->delivery_address : null,
            'estimated_ready_at' => now()->addMinutes(30),
        ]);

        foreach ($this->cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'menu_item_id' => $item['id'],
                'menu_name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'subtotal' => $item['price'] * $item['quantity'],
                'notes' => $item['notes'] ?: null,
            ]);
        }

        session()->forget('cart');

        $this->reset(['customer_name', 'customer_phone', 'customer_email', 'notes', 'delivery_address']);
        $this->cart = [];
        $this->delivery_fee = 0;
        $this->dispatch('cartUpdated', count: 0);
        $this->dispatch('orderCreated', orderNumber: $order->order_number);
    }

    public function render()
    {
        return view('livewire.order-form-component');
    }
}
