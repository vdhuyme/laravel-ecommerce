<?php

namespace App\Http\Livewire\Client\Shop;

use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class IndexPage extends Component
{
    use WithPagination;

    public int $perPage = 12;

    public string $searchTerm = '';

    public array $filterTerm = [];

    public string $sortTerm = '';

    public function loadMore(): int
    {
        return $this->perPage += 12;
    }

    #[Layout('client.layouts.app')]
    public function render(): View
    {
        $categories = Category::orderByDesc('created_at')
            ->get();

        $products = Product::where('status', 'active')
            ->where('name', 'like', '%' . $this->searchTerm . '%')
            ->when($this->filterTerm, function ($query) {
                $query->whereIn('category_id', $this->filterTerm);
            })
            ->when($this->sortTerm, function ($query) {
                $query->when($this->sortTerm === 'highToLow', function ($subQuery) {
                    $subQuery->orderBy('selling_price', 'desc');
                })
                    ->when($this->sortTerm === 'lowToHigh', function ($subQuery) {
                        $subQuery->orderBy('selling_price', 'asc');
                    });
            })
            ->take($this->perPage)
            ->get();

        return view('livewire.client.shop.index-page', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }
}
