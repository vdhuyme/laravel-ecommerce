<?php

namespace App\Http\Livewire\Client\Product;

use App\Models\Product;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class DetailPage extends Component
{
    public mixed $product;

    public function mount(string|int $id): void
    {
        $this->product = Product::where('id', $id)
            ->with(['images', 'category'])
            ->firstOrFail();
    }

    #[Layout('client.layouts.app')]
    public function render(): View
    {
        $product = $this->product;

        return view('livewire.client.product.detail-page', [
            'product' => $product,
        ]);
    }
}
