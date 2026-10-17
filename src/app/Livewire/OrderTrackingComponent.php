<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;

class OrderTrackingComponent extends Component
{
    public string $search = '';
    public ?Order $order = null;
    public bool $notFound = false;

    public function track(): void
    {
        $this->validate(['search' => 'required|string']);

        $order = Order::with('items')
            ->where('order_number', $this->search)
            ->orWhere(function ($query) {
                $query->where('customer_phone', $this->search)
                    ->where('order_number', $this->search);
            })
            ->first();

        if ($order) {
            $this->order = $order;
            $this->notFound = false;
        } else {
            $this->order = null;
            $this->notFound = true;
        }
    }

    public function render()
    {
        return view('livewire.order-tracking-component');
    }
}
