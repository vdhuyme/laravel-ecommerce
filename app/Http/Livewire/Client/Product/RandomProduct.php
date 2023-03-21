<?php

namespace App\Http\Livewire\Client\Product;

use App\Models\Product;
use Livewire\Component;

class RandomProduct extends Component
{
    public function render()
    {
        $randomProducts = Product::inRandomOrder()->limit(10)->get();

        return view('livewire.client.product.random-product', [
            'randomProducts' => $randomProducts,
        ]);
    }
}
