<?php

namespace App\Http\Livewire\Admin\Order;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class IndexPage extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $perPage = 10;
    public $isDeleteId;
    public $searchTerm;

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


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        return view('livewire.admin.order.index-page', [
            'orders' => Order::where('userName', 'like', $searchTerm)
                ->orWhere('userEmail', 'like', $searchTerm)
                ->orWhere('trackingNumber', 'like', $searchTerm)
                ->orderBy('created_at', 'desc')
                ->paginate($this->perPage)
        ])
            ->extends('admin.layouts.app')
            ->section('content');
    }
}
