<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePage extends Component
{
    use WithFileUploads;

    public $productName;

    public $description;

    public $productStatus;

    public $featuredProduct;

    public $productSlug;

    public $metaTitle;

    public $metaDescription;

    public $metaKey;

    public $originalPrice;

    public $sellingPrice;

    public $stock;

    public $productImages = [];

    public $categoryId;

    protected $rules = [
        'productImages.*' => 'image',
        'productName' => 'required|max:255',
        'description' => 'required',
        'productStatus' => 'required|in:published,unPublished',
        'featuredProduct' => 'required|in:yes,no',
        'productSlug' => 'required|max:255',
        'metaTitle' => 'max:255',
        'metaDescription' => 'max:255',
        'metaKey' => 'max:255',
        'categoryId' => 'required',
        'originalPrice' => 'required',
        'sellingPrice' => 'required',
        'stock' => 'required|in:inStock,outStock',
    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function storeProduct()
    {
        $validatedData = $this->validate();
        $validatedData['categoryId'] = $this->categoryId;
        $validatedData['originalPrice'] = str_replace('.', '', $this->originalPrice);
        $validatedData['sellingPrice'] = str_replace('.', '', $this->sellingPrice);
        $product = Product::create($validatedData);
        $productId = $product->id;
        foreach ($this->productImages as $image) {
            $this->productImages = $image->store('upload');
            ProductImage::create([
                'productImage' => $this->productImages,
                'productId' => $productId,
            ]);
        }

        $this->reset();
        session()->flash('success', 'Create new product successfully.');
        return redirect()->route('products');
    }

    public function generateSlug()
    {
        $this->productSlug = Str::slug($this->productName);
    }

    public function render()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();

        return view('livewire.admin.product.create-page', [
            'categories' => $categories
        ])
            ->extends('admin.layouts.app')
            ->section('content');
    }
}
