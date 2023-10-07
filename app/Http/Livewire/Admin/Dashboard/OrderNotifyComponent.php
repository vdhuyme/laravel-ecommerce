<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Order;
use Livewire\Component;

class OrderNotifyComponent extends Component
{
    public $orders;
    public $limitOrders;

    public function mount()
    {

        $orders = Order::orderBy('created_at', 'desc')
            ->where('status', 'pending')->get();
        $limitOrders = Order::orderBy('created_at', 'desc')
            ->where('status', 'pending')->limit(20)->get();
        $this->orders = $orders;
        $this->limitOrders = $limitOrders;
    }

    public function render()
    {
        return view('livewire.admin.dashboard.order-notify-component');
    }
}
