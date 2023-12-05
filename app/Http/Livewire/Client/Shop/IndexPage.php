<?php

namespace App\Http\Livewire\Client\Shop;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class IndexPage extends Component
{
    use WithPagination;

    public $perPage = 6;

    protected $paginationTheme = 'bootstrap';

    public $searchTerm;

    public $filterTerm = [];

    public $sortTerm;

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('livewire.client.shop.index-page', [
            'products' => Product::where('productStatus', 'published')
                ->where('productName', 'like', $searchTerm)
                ->when($this->filterTerm, function ($query) {
                    $query->whereIn('categoryId', $this->filterTerm);
                })
                ->when($this->sortTerm, function ($query) {
                    $query->when($this->sortTerm == 'hightToLow', function ($subQuery) {
                        $subQuery->orderBy('sellingPrice', 'desc');
                    })
                        ->when($this->sortTerm == 'lowToHight', function ($subQuery) {
                            $subQuery->orderBy('sellingPrice', 'asc');
                        });
                })
                ->orderBy('created_at', 'desc')
                ->paginate($this->perPage),
            'categories' => $categories,
        ])
            ->extends('client.layouts.app')
            ->section('content');
    }
}
