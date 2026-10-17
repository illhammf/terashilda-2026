<?php

namespace App\Livewire;

use App\Models\MenuItem;
use Livewire\Component;

class CartComponent extends Component
{
    public array $cart = [];
    public bool $isOpen = false;

    protected $listeners = ['cartUpdated' => '$refresh', 'openCart' => 'open'];

    public function mount(): void
    {
        $this->cart = session('cart', []);
    }

    public function open(): void
    {
        $this->isOpen = true;
    }

    public function close(): void
    {
        $this->isOpen = false;
    }

    public function add(int $menuItemId): void
    {
        $menuItem = MenuItem::available()->findOrFail($menuItemId);

        if (isset($this->cart[$menuItemId])) {
            $this->cart[$menuItemId]['quantity']++;
        } else {
            $this->cart[$menuItemId] = [
                'id' => $menuItem->id,
                'name' => $menuItem->name,
                'price' => (float) $menuItem->final_price,
                'image' => $menuItem->image,
                'quantity' => 1,
                'notes' => '',
            ];
        }

        $this->saveCart();
        $this->dispatch('cartUpdated', count: $this->count);
        $this->dispatch('notify', message: "{$menuItem->name} ditambahkan ke keranjang");
    }

    public function remove(int $menuItemId): void
    {
        unset($this->cart[$menuItemId]);
        $this->saveCart();
        $this->dispatch('cartUpdated', count: $this->count);
    }

    public function increment(int $menuItemId): void
    {
        if (isset($this->cart[$menuItemId])) {
            $this->cart[$menuItemId]['quantity']++;
            $this->saveCart();
            $this->dispatch('cartUpdated', count: $this->count);
        }
    }

    public function decrement(int $menuItemId): void
    {
        if (isset($this->cart[$menuItemId])) {
            $this->cart[$menuItemId]['quantity']--;

            if ($this->cart[$menuItemId]['quantity'] <= 0) {
                unset($this->cart[$menuItemId]);
            }

            $this->saveCart();
            $this->dispatch('cartUpdated', count: $this->count);
        }
    }

    public function updateNotes(int $menuItemId, string $notes): void
    {
        if (isset($this->cart[$menuItemId])) {
            $this->cart[$menuItemId]['notes'] = $notes;
            $this->saveCart();
        }
    }

    public function clear(): void
    {
        $this->cart = [];
        $this->saveCart();
        $this->dispatch('cartUpdated', count: 0);
        $this->dispatch('notify', message: 'Keranjang dikosongkan');
    }

    public function getSubtotalProperty(): float
    {
        return collect($this->cart)->sum(fn ($item) => $item['price'] * $item['quantity']);
    }

    public function getCountProperty(): int
    {
        return collect($this->cart)->sum('quantity');
    }

    private function saveCart(): void
    {
        session(['cart' => $this->cart]);
    }

    public function render()
    {
        return view('livewire.cart-component');
    }
}
