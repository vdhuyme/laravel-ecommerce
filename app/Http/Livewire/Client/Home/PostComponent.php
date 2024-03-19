<?php

namespace App\Http\Livewire\Client\Home;

use App\Models\Post;
use Illuminate\View\View;
use Livewire\Component;

class PostComponent extends Component
{
    public function render(): View
    {
        $featuredArticles = Post::orderByDesc('created_at')
            ->where('is_featured', 1)
            ->take(3)
            ->get();

        return view('livewire.client.home.post-component', [
            'featuredArticles' => $featuredArticles,
        ]);
    }
}
