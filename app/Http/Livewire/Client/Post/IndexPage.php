<?php

namespace App\Http\Livewire\Client\Post;

use App\Models\Post;
use Livewire\Component;

class IndexPage extends Component
{
    public $totalRecords;

    public $loadAmount = 6;

    public function loadMore()
    {
        $this->loadAmount += 6;
    }

    public function mount()
    {
        $this->totalRecords = Post::count();
    }

    public function render()
    {
        return view('livewire.client.article.index-page')
            ->with(
                'articles',
                Post::orderBy('created_at', 'desc')
                    ->limit($this->loadAmount)
                    ->get()
            )
            ->extends('client.layouts.app')
            ->section('content');
    }
}
