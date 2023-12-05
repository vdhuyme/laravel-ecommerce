<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Order;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class IndexPage extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $perPage = 20;

    public $isDeleteId;

    public $totalEarnings;

    public function deleteOrder($id)
    {
        $order = Order::findOrFail($id);
        $this->isDeleteId = $order->id;
    }

    public function destroyOrder()
    {
        $id = $this->isDeleteId;
        $order = Order::findOrFail($id);
        $order->delete();
        session()->flash('success', 'Delete order successfully.');
        $this->dispatchBrowserEvent('hidden-modal');
    }

    public function render()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        $allOrders = Order::orderBy('created_at', 'desc')->get();
        $pendingOrders = Order::orderBy('created_at', 'desc')
            ->where('status', 'pending')->paginate($this->perPage);
        $this->totalEarnings = Order::where('status', 'success')->sum('total');

        return view('livewire.admin.dashboard.index-page', [
            'users' => $users,
            'allOrders' => $allOrders,
            'pendingOrders' => $pendingOrders,
        ])
            ->extends('admin.layouts.app')
            ->section('content');
    }
}
