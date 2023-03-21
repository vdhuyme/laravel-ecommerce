<?php

namespace App\Http\Livewire\Client\Home;

use App\Models\Article;
use Livewire\Component;

class ArticleComponent extends Component
{
    public function render()
    {
        $featuredArticles = Article::orderBy('created_at', 'desc')
            ->where('featuredArticle', 'yes')
            ->take(10)->get();
        return view('livewire.client.home.article-component', [
            'featuredArticles' => $featuredArticles,
        ]);
    }
}
