<?php

namespace App\Http\Livewire\Client\Order;

use Livewire\Component;

class ThankYou extends Component
{
    public function render()
    {
        return view('livewire.client.order.thank-you')
            ->extends('client.layouts.app')
            ->section('content');
    }
}
