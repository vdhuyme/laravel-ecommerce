<?php

namespace App\Http\Livewire\Client\Article;

use App\Models\Article;
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
        $this->totalRecords = Article::count();
    }

    public function render()
    {
        return view('livewire.client.article.index-page')
            ->with(
                'articles',
                Article::orderBy('created_at', 'desc')
                    ->limit($this->loadAmount)
                    ->get()
            )
            ->extends('client.layouts.app')
            ->section('content');
    }
}
