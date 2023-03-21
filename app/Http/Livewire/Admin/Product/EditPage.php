<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class EditPage extends Component
{
    use WithFileUploads;
    public $productName, $description, $productStatus,
        $featuredProduct, $productSlug, $metaTitle,
        $metaDescription, $metaKey;
    public $originalPrice;
    public $sellingPrice;
    public $stock;
    public $productOldImages = [];
    public $productNewImages = [];
    public $categoryId;
    public $isEditId;
    public $isDeleteId;

    protected $listeners = [
        'refresh' => '$refresh'
    ];

    protected $rules = [
        'productNewImages.*' => 'image',
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

    public function mount($id)
    {
        $product = Product::findOrFail($id);

        $this->isEditId = $product->id;
        $this->productName = $product->productName;
        $this->description = $product->description;
        $this->productStatus = $product->productStatus;
        $this->featuredProduct = $product->featuredProduct;
        $this->productSlug = $product->productSlug;
        $this->metaTitle = $product->metaTitle;
        $this->metaDescription = $product->metaDescription;
        $this->metaKey = $product->metaKey;
        $this->originalPrice = $product->originalPrice;
        $this->sellingPrice = $product->sellingPrice;
        $this->stock = $product->stock;
        $this->categoryId = $product->categoryId;
        $this->productOldImages = $product->productImages()->get();
    }

    public function deleteProductImage($id)
    {
        $productOldImage = ProductImage::findOrFail($id);
        $this->isDeleteId = $productOldImage->id;
    }

    public function destroyProductImage()
    {
        $isDeleteId = $this->isDeleteId;
        $productOldImage = ProductImage::findOrFail($isDeleteId);
        File::delete($productOldImage->productImage);
        $productOldImage->delete();
        session()->flash('success', 'Delete product image successfully.');
        $this->dispatchBrowserEvent('hidden-modal');
        $this->emit('refresh');
    }

    public function updateProduct()
    {
        $this->validate();
        $isEditId = $this->isEditId;
        $product = Product::findOrFail($isEditId);
        $productId = $product->id;
        foreach ($this->productNewImages as $productNewImage) {
            $this->productNewImages = $productNewImage->store('upload');
            ProductImage::create([
                'productImage' => $this->productNewImages,
                'productId' => $productId,
            ]);
        }
        $product->update([
            'productName' => $this->productName,
            'description' => $this->description,
            'productStatus' => $this->productStatus,
            'featuredProduct' => $this->featuredProduct,
            'productSlug' => $this->productSlug,
            'metaTitle' => $this->metaTitle,
            'metaDescription' => $this->metaDescription,
            'metaKey' => $this->metaKey,
            'categoryId' => $this->categoryId,
            'originalPrice' => str_replace('.', '', $this->originalPrice),
            'sellingPrice' => str_replace('.', '', $this->sellingPrice),
            'stock' => $this->stock,
        ]);
        $this->reset();
        session()->flash('success', 'Update product successfully.');
        return redirect()->route('products');
    }

    public function generateSlug()
    {
        $this->productSlug = Str::slug($this->productName);
    }

    public function cleanupOldUploads()
    {
        $storage = Storage::disk('local');

        foreach ($storage->allFiles('livewire-tmp') as $filePathname) {
            $yesterdaysStamp = now()->subDay()->timestamp;
            if ($yesterdaysStamp > $storage->lastModified($filePathname)) {
                $storage->delete($filePathname);
            }
        }
    }

    public function render()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();

        return view('livewire.admin.product.edit-page', [
            'categories' => $categories
        ])
            ->extends('admin.layouts.app')
            ->section('content');
    }
}
