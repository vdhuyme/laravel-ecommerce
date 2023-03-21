<?php

namespace App\Http\Livewire\Client\Home;

use App\Models\Article;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
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
