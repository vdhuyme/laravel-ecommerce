<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Order;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class IndexPage extends Component
{
    use WithPagination;

    protected string $paginationTheme = 'bootstrap';

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

    public function render(): View
    {
        return view('livewire.admin.dashboard.index-page');
    }
}
