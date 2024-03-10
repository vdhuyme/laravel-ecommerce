<?php

namespace App\Http\Livewire\Client\Product;

use App\Models\Product;
use Illuminate\View\View;
use Livewire\Component;

class RelatedProduct extends Component
{
    public string|int $categoryId;

    public string|int $productId;

    public function render(): View
    {
        $products = Product::inRandomOrder()
            ->where('category_id', $this->categoryId)
            ->where('id', '!=', $this->productId)
            ->with(['images'])
            ->limit(4)
            ->get();

        return view('livewire.client.product.related-product', [
            'products' => $products,
        ]);
    }
}
