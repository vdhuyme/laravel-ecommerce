<?php

namespace App\Http\Livewire\Client\Home;

use App\Models\Product;
use Livewire\Component;

class ProductComponent extends Component
{
    public function render()
    {
        $featuredProducts = Product::orderBy('created_at', 'desc')
            ->where('featuredProduct', 'yes')
            ->where('productStatus', 'published')
            ->take(10)->get();
        return view('livewire.client.home.product-component', [
            'featuredProducts' => $featuredProducts
        ]);
    }
}
