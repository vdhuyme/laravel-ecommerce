<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
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

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $this->isDeleteId = $category->id;
    }

    public function destroyCategory()
    {
        $isDeleteId = $this->isDeleteId;
        $category = Category::findOrFail($isDeleteId);
        if ($category->products->count() > 0) {
            session()->flash('danger', 'You can not delete this category.');
            $this->dispatchBrowserEvent('hidden-modal');
        } else {
            File::delete($category->categoryImage);
            $category->delete();
            session()->flash('success', 'Delete category successfully.');
            $this->dispatchBrowserEvent('hidden-modal');
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        return view('livewire.admin.category.index-page', [
            'categories' => Category::where('categoryName', 'like', $searchTerm)
                ->orderBy('created_at', 'desc')
                ->paginate($this->perPage)
        ])
            ->extends('admin.layouts.app')
            ->section('content');
    }
}
