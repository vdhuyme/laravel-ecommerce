<?php

namespace App\Http\Livewire\Admin\Post;

use App\Models\Post;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class IndexPage extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $searchTerm;

    public $isDeleteId;

    public $perPage = 10;

    public function deleteArticle($id)
    {
        $article = Post::findOrFail($id);
        $this->isDeleteId = $article->id;
    }

    public function destroyArticle()
    {
        $isDeleteId = $this->isDeleteId;
        $article = Post::findOrFail($isDeleteId);
        File::delete($article->articleImage);
        $article->delete();
        session()->flash('success', 'Delete articles successfully.');
        $this->dispatchBrowserEvent('hidden-modal');
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        return view('livewire.admin.article.index-page', [
            'articles' => Post::where('articleTitle', 'like', $searchTerm)
                ->orderBy('created_at', 'desc')
                ->paginate($this->perPage)
        ])
            ->extends('admin.layouts.app')
            ->section('content');
    }
}
