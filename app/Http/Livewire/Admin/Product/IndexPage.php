<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class IndexPage extends Component
{
    use WithPagination;
    use LivewireAlert;

    public string $searchTerm = '';

    public array $filterTerm = [];

    public string $sortTerm = '';

    public int $perPage = 10;

    public function delete(string|int $id): void
    {
        $product = Product::findOrFail($id);

        if (!$product->orderProducts->count()
            && !$product->carts->count()) {
            $images = $product->images()->get();
            foreach ($images as $image) {
                File::delete($image->url);
                $image->delete();
            }

            $product->delete();
            $this->alert('success', trans('Xóa sản phẩm thành công'));
            return;
        }

        $this->alert('error', trans('Không thể xóa sản phẩm này'));
    }

    #[Layout('admin.layouts.app')]
    public function render(): View
    {
        $categories = Category::orderByDesc('created_at')
            ->withCount('products')
            ->get();

        $products = Product::where('name', 'like', '%' . $this->searchTerm . '%')
            ->when($this->filterTerm, function ($query) {
                $query->whereIn('category_id', $this->filterTerm);
            })
            ->when($this->sortTerm, function ($query) {
                $query->when($this->sortTerm == 'highToLow', function ($subQuery) {
                    $subQuery->orderBy('selling_price', 'desc');
                })
                    ->when($this->sortTerm == 'lowToHigh', function ($subQuery) {
                        $subQuery->orderBy('selling_price');
                    });
            })
            ->orderByDesc('created_at')
            ->paginate($this->perPage);

        return view('livewire.admin.product.index-page', [
            'products' => $products,
            'categories' => $categories,
        ])
            ->extends('admin.layouts.app')
            ->section('content');
    }
}
