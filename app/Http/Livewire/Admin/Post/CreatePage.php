<?php

namespace App\Http\Livewire\Admin\Post;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class CreatePage extends Component
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

    protected $rules = [
        'articleTitle' => 'required|max:255',
        'articleSlug' => 'required|max:255',
        'articleContent' => 'required',
        'articleImage' => 'required|image',
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

    public function storeArticle()
    {
        $validatedData = $this->validate();
        $imgUrl = $this->articleImage->store('upload');
        $validatedData['articleImage'] = $imgUrl;
        $userId = Auth::user()->id;
        $validatedData['userId'] = $userId;
        Post::create($validatedData);
        $this->reset();
        session()->flash('success', 'Create new article successfully.');
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
        return view('livewire.admin.article.create-page')
            ->extends('admin.layouts.app')
            ->section('content');
    }
}
