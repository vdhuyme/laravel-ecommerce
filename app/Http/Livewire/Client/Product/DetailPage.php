<?php

namespace App\Http\Livewire\Client\Product;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DetailPage extends Component
{
    public $productName;

    public $description;

    public $metaTitle;

    public $metaDescription;

    public $metaKey;

    public $originalPrice;

    public $sellingPrice;

    public $stock;

    public $productImages = [];

    public $category;

    public $categoryId;

    public $quantity = 1;

    public $productId;

    public $product;

    public function mount($id, $slug)
    {
        $product = Product::where('id', $id)
            ->where('productSlug', $slug)
            ->firstOrFail();

        $this->product = $product;
        $this->productId = $product->id;
        $this->productName = $product->productName;
        $this->description = $product->description;
        $this->metaTitle = $product->metaTitle;
        $this->metaDescription = $product->metaDescription;
        $this->metaKey = $product->metaKey;
        $this->originalPrice = $product->originalPrice;
        $this->sellingPrice = $product->sellingPrice;
        $this->stock = $product->stock;
        $this->productImages = $product->productImages()->get();
        $this->category = $product->category->categoryName;
        $this->categoryId = $product->categoryId;
    }

    public function incQuantity()
    {
        if ($this->quantity < 5) {
            $this->quantity++;
        }
    }

    public function decQuantity()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function addToCart($productId)
    {
        if (Auth::user()) {
            if (Cart::where('userId', Auth::user()->id)->where('productId', $productId)->exists()) {
                session()->flash('warning', 'Sản phẩm đã có trong giỏ hàng.');
            } else {
                Cart::create([
                    'userId' => Auth::user()->id,
                    'productId' => $productId,
                    'quantity' => $this->quantity,
                ]);
                session()->flash('success', 'Thêm sản phẩm vào giỏ hàng thành công.');
                $this->emit('update');
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function render()
    {
        return view('livewire.client.product.detail-page')
            ->extends('client.layouts.app')
            ->section('content');
    }
}
