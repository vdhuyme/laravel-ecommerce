<?php

namespace App\Http\Livewire\Client\Home;

use Livewire\Component;

class IndexPage extends Component
{
    public function render()
    {
        return view('livewire.client.home.index-page')
            ->extends('client.layouts.app')
            ->section('content');
    }
}
