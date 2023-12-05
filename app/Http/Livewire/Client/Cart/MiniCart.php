<?php

namespace App\Http\Livewire\Client\Cart;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MiniCart extends Component
{
    public $count;

    public $total;

    public $cartProducts;

    protected $listeners = [
        'update' => 'checkCount',
    ];

    public function checkCount()
    {
        if (Auth::user()) {
            $cartProducts = Cart::where('userId', Auth::user()->id)->get();
            $count = Cart::where('userId', Auth::user()->id)->count();
            $this->cartProducts = $cartProducts;
            return $this->count = $count;
        } else {
            return $this->count = 0;
        }
    }

    public function render()
    {
        $this->count = $this->checkCount();
        return view('livewire.client.cart.mini-cart');
    }
}
