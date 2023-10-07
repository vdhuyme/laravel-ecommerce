<?php

namespace App\Http\Livewire\Admin\Article;

use App\Models\Article;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class EditPage extends Component
{
    use WithFileUploads;

    public $articleTitle;
    public $articleSlug;
    public $articleContent;
    public $articleImage;
    public $featuredArticle;
    public $shortContent;
    public $metaDescription;
    public $metaKey;
    public $metaTitle;

    public $newArticleImage;
    public $showOldImage;
    public $isEditId;

    protected $rules = [
        'articleTitle' => 'required|max:255',
        'articleSlug' => 'required|max:255',
        'articleContent' => 'required',
        'featuredArticle' => 'required|in:yes,no',
        'shortContent' => 'required|max:255',
        'metaDescription' => 'max:255',
        'metaKey' => 'max:255',
        'metaTitle' => 'max:255',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount($id)
    {
        $article = Article::findOrFail($id);
        $this->isEditId = $article->id;
        $this->articleTitle = $article->articleTitle;
        $this->articleSlug = $article->articleSlug;
        $this->showOldImage = $article->articleImage;
        $this->metaDescription = $article->metaDescription;
        $this->metaTitle = $article->metaTitle;
        $this->metaKey = $article->metaKey;
        $this->featuredArticle = $article->featuredArticle;
        $this->shortContent = $article->shortContent;
        $this->articleContent = $article->articleContent;
    }

    public function updateArticle()
    {
        $this->validate();
        $isEditId = $this->isEditId;
        $article = Article::findOrFail($isEditId);
        $oldImage = $article->articleImage;
        $newImage = $this->newArticleImage;
        if ($newImage != null) {
            File::delete($oldImage);
            $newImgUrl = $this->newArticleImage->store('upload');
        } else {
            $newImgUrl = $oldImage;
        }
        $article->update([
            'articleTitle' => $this->articleTitle,
            'articleSlug' => $this->articleSlug,
            'articleContent' => $this->articleContent,
            'featuredArticle' => $this->featuredArticle,
            'shortContent' => $this->shortContent,
            'metaDescription' => $this->metaDescription,
            'metaKey' => $this->metaKey,
            'metaTitle' => $this->metaTitle,
            'articleImage' => $newImgUrl,
        ]);
        $this->reset();
        session()->flash('success', 'Update article successfully.');
        return redirect()->route('articles');
    }

    public function generateSlug()
    {
        $this->articleSlug = Str::slug($this->articleTitle);
    }

    public function cleanupOldUploads()
    {
        $storage = Storage::disk('local');

        foreach ($storage->allFiles('livewire-tmp') as $filePathname) {
            $yesterdaysStamp = now()->subSeconds(1)->timestamp;
            if ($yesterdaysStamp > $storage->lastModified($filePathname)) {
                $storage->delete($filePathname);
            }
        }
    }

    public function render()
    {
        return view('livewire.admin.article.edit-page')
            ->extends('admin.layouts.app')
            ->section('content');
    }
}
