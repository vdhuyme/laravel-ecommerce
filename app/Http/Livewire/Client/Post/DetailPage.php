<?php

namespace App\Http\Livewire\Client\Post;

use App\Models\Post;
use Livewire\Component;

class DetailPage extends Component
{
    public $articleTitle;

    public $articleContent;

    public $articleImage;

    public $metaDescription;

    public $metaKey;

    public $metaTitle;

    public function mount($id, $slug)
    {
        $article = Post::where('id', $id)
            ->where('articleSlug', $slug)
            ->firstOrFail();

        $this->articleTitle = $article->articleTitle;
        $this->articleContent = $article->articleContent;
        $this->articleImage = $article->articleImage;
        $this->metaDescription = $article->metaDescription;
        $this->metaKey = $article->metaKey;
        $this->metaTitle = $article->metaTitle;
    }
    public function render()
    {
        return view('livewire.client.article.detail-page')
            ->extends('client.layouts.app')
            ->section('content');
    }
}
