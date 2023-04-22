<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class IndexPage extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $isDeleteId;
    public $searchTerm;
    public $filterTerm = [];
    public $sortTerm;
    public $perPage = 10;

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $this->isDeleteId = $product->id;
    }

    public function destroyProduct()
    {
        $isDeleteId = $this->isDeleteId;
        $product = Product::findOrFail($isDeleteId);
        if ($product->orderProducts->count() > 0 || $product->carts->count() > 0) {
            session()->flash('warning', 'You can not delete product. This product has been already existed in orders or carts');
            $this->dispatchBrowserEvent('hidden-modal');
        } else {
            $productOldImages = $product->productImages()->get();
            foreach ($productOldImages as $productOldImage) {
                File::delete($productOldImage->productImage);
                $productOldImage->delete();
            }
            $product->delete();
            session()->flash('success', 'Delete product successfully.');
            $this->dispatchBrowserEvent('hidden-modal');
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('livewire.admin.product.index-page', [
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
            ->extends('admin.layouts.app')
            ->section('content');
    }
}
