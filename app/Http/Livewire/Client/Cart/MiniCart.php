<?php

namespace App\Http\Livewire\Client\Cart;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

#[On('refreshMiniCart')]
class MiniCart extends Component
{
    public function render(): View
    {
        $userId = Auth::id();
        $cartProducts =  Cart::where('user_id', $userId)
            ->with(['product', 'product.images'])
            ->orderByDesc('created_at')
            ->get();

        return view('livewire.client.cart.mini-cart', [
            'cartProducts' => $cartProducts,
        ]);
    }
}
