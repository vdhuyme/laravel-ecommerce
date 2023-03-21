<?php

namespace App\Http\Livewire\Client\Article;

use App\Models\Article;
use Livewire\Component;

class DetailPage extends Component
{
    public $articleTitle, $articleContent, $articleImage,
        $metaDescription, $metaKey, $metaTitle;

    public function mount($id, $slug)
    {
        $article = Article::where('id', $id)
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
