<?php

namespace App\Http\Livewire\Client\Home;

use App\Models\Category;
use Illuminate\View\View;
use Livewire\Component;

class ProductComponent extends Component
{
    public function render(): View
    {
        $categoryProducts = Category::with(['products' => function ($query) {
            $query->where('status', 'active')
                ->where('is_featured', 1)
                ->latest();
        }])
            ->where('is_featured', 1)
            ->latest()
            ->take(3)
            ->get();

        return view('livewire.client.home.product-component', [
            'categoryProducts' => $categoryProducts
        ]);
    }
}
