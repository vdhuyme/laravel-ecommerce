<?php

namespace App\Http\Livewire\Client\Cart;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

class IndexPage extends Component
{
    use LivewireAlert;

    public mixed $cartProducts;

    public function increase(string|int $productId): void
    {
        Cart::where('product_id', $productId)
            ->where('user_id', Auth::id())
            ->firstOrFail()
            ->increment('quantity');

        $this->dispatch('refreshMiniCart');
        $this->alert('success', trans('Cập nhật thành công'));
    }

    public function decrease(string|int $productId): void
    {
        $cart = Cart::where('product_id', $productId)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $cart->decrement('quantity');

        if ($cart->quantity < 1) {
            $cart->delete();
        }

        $this->dispatch('refreshMiniCart');
        $this->alert('success', trans('Cập nhật thành công'));
    }

    public function delete(string|int $cartProductId): void
    {
        Cart::where('product_id', $cartProductId)
            ->where('user_id', Auth::id())
            ->delete();

        $this->alert('success', trans('Xóa thành công'));
        $this->dispatch('refreshMiniCart');
    }

    #[Layout('client.layouts.app')]
    public function render(): View
    {
        $this->cartProducts = $cartProducts = Cart::where('user_id', Auth::id())
            ->with(['product', 'product.images'])
            ->orderByDesc('created_at')
            ->get();

        return view('livewire.client.cart.index-page', [
            'cartProducts' => $cartProducts,
        ]);
    }
}
