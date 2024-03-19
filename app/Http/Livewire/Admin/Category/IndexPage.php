<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class IndexPage extends Component
{
    use WithPagination;
    use LivewireAlert;

    public string $searchTerm = '';

    public int $perPage = 10;

    public function delete(string|int $id): void
    {
        $category = Category::findOrFail($id);

        if (!$category->products->count()) {
            File::delete($category->image);
            $category->delete();
            $this->alert('success', trans('Xóa danh mục thành công'));
            return;
        }

        $this->alert('error', trans('Không thể xóa thư mục này'));
    }

    public function render(): View
    {
        $categories = Category::where('name', 'like', '%' . $this->searchTerm . '%')
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.admin.category.index-page', [
            'categories' => $categories
        ]);
    }
}
