<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePage extends Component
{
    use WithFileUploads;
    public $categoryName, $categorySlug, $categoryImage,
        $metaDescription, $metaKey, $metaTitle, $featuredCategory;

    protected $rules = [
        'categoryName' => 'required|max:255',
        'categorySlug' => 'required|max:255',
        'categoryImage' => 'required|image',
        'metaDescription' => 'max:255',
        'metaKey' => 'max:255',
        'metaTitle' => 'max:255',
        'featuredCategory' => 'required|in:yes,no',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function storeCategory()
    {
        $validatedData = $this->validate();
        $imgUrl = $this->categoryImage->store('upload');
        $validatedData['categoryImage'] = $imgUrl;
        Category::create($validatedData);
        $this->reset();
        session()->flash('success', 'Create new category successfully.');
        return redirect()->route('categories');
    }


    public function generateSlug()
    {
        $this->categorySlug = Str::slug($this->categoryName);
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
        return view('livewire.admin.category.create-page')
            ->extends('admin.layouts.app')
            ->section('content');
    }
}
