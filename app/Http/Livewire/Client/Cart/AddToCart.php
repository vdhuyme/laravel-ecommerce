<?php

namespace App\Http\Livewire\Client\Cart;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AddToCart extends Component
{
    use LivewireAlert;

    public string|int $productId;

    #[Validate('nullable|numeric|min:1')]
    public int $quantity = 1;

    public function increase(): int
    {
        return $this->quantity++;
    }

    public function decrease(): int
    {
        return $this->quantity > 1 ? --$this->quantity : $this->quantity;
    }

    public function addToCart(): void
    {
        $validatedData = $this->validate();

        if (!Auth::check()) {
            $this->alert('warning', trans('Bạn cần đăng nhập trước đã'));
            return;
        }

        Cart::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'product_id' => $this->productId,
            ],
            [
                'user_id' => Auth::id(),
                'product_id' => $this->productId,
                'quantity' => DB::raw('quantity + ' . intval($validatedData['quantity']) ?: 1),
            ]
        );

        $this->alert('success', trans('Sản phẩm đã được thêm vào giỏ hàng'));
        $this->dispatch('refreshMiniCart');
    }

    public function render(): View
    {
        return view('livewire.client.cart.add-to-cart');
    }
}
