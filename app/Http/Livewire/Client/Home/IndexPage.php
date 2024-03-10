<?php

namespace App\Http\Livewire\Client\Home;

use Livewire\Attributes\Layout;
use Livewire\Component;

class IndexPage extends Component
{
    #[Layout('client.layouts.app')]
    public function render()
    {
        return view('livewire.client.home.index-page')
            ->extends('client.layouts.app')
            ->section('content');
    }
}
