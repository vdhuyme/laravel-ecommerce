<?php

namespace App\Http\Livewire\Client\Home;

use App\Models\Category;
use Livewire\Component;

class CategoryComponent extends Component
{
    public function render()
    {
        $categories = Category::orderBy('created_at', 'desc')
            ->where('featuredCategory', 'yes')
            ->take(3)->get();
        return view('livewire.client.home.category-component', [
            'categories' => $categories,
        ]);
    }
}
