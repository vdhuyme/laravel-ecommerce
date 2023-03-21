<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class EditPage extends Component
{
    use WithFileUploads;

    public $categoryName, $categorySlug, $categoryImage,
        $metaDescription, $metaKey, $metaTitle, $featuredCategory;

    public $newCategoryImage;
    public $showOldImage;
    public $isEditId;

    protected $rules = [
        'categoryName' => 'required|max:255',
        'categorySlug' => 'required|max:255',
        'metaDescription' => 'max:255',
        'metaKey' => 'max:255',
        'metaTitle' => 'max:255',
        'featuredCategory' => 'required|in:yes,no',
    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount($id)
    {
        $category = Category::findOrFail($id);
        $this->isEditId = $category->id;
        $this->categoryName = $category->categoryName;
        $this->categorySlug = $category->categorySlug;
        $this->showOldImage = $category->categoryImage;
        $this->metaDescription = $category->metaDescription;
        $this->metaTitle = $category->metaTitle;
        $this->metaKey = $category->metaKey;
        $this->featuredCategory = $category->featuredCategory;
    }

    public function updateCategory()
    {
        $this->validate();
        $isEditId = $this->isEditId;
        $category = Category::findOrFail($isEditId);
        $oldImage = $category->categoryImage;
        $newImage = $this->newCategoryImage;
        if ($newImage != null) {
            File::delete($oldImage);
            $newImgUrl = $this->newCategoryImage->store('upload');
        } else {
            $newImgUrl = $oldImage;
        }
        $category->update([
            'categoryName' => $this->categoryName,
            'categorySlug' => $this->categorySlug,
            'metaDescription' => $this->metaDescription,
            'metaKey' => $this->metaKey,
            'metaTitle' => $this->metaTitle,
            'featuredCategory' => $this->featuredCategory,
            'categoryImage' => $newImgUrl,
        ]);
        $this->reset();
        session()->flash('success', 'Update category successfully.');
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
        return view('livewire.admin.category.edit-page')
            ->extends('admin.layouts.app')
            ->section('content');
    }
}
