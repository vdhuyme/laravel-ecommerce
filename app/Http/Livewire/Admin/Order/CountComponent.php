<?php

namespace App\Http\Livewire\Admin\Order;

use App\Models\Order;
use Livewire\Component;

class CountComponent extends Component
{
    public $count;

    public function mount()
    {
        $this->count = Order::where('status', 'pending')->count();
    }

    public function render()
    {
        return view('livewire.admin.order.count-component');
    }
}
