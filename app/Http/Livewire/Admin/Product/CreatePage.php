<?php

namespace App\Http\Livewire\Admin\Product;

use App\Helpers\GenerateSlug;
use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePage extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    #[Validate('required|string|min:3|max:120')]
    public string $name = '';

    #[Validate('required|string')]
    public string $description = '';

    #[Validate('required|in:active,draft,archived')]
    public string $status = '';

    #[Validate('nullable|in:1,0')]
    public string $isFeatured = '';

    #[Validate('nullable|string')]
    public string $slug;

    #[Validate('required|numeric|min:1|max:10000000000')]
    public int|float $originalPrice;

    #[Validate('nullable|numeric|min:1|max:10000000000|lte:originalPrice')]
    public int|float $sellingPrice;

    #[Validate('required|numeric')]
    public int $categoryId;

    public array $images = [];

    public function store(): void
    {
        $validatedData = $this->validate();
        $validatedData['category_id'] = $this->categoryId;
        $validatedData['original_price'] = $this->originalPrice;
        $validatedData['selling_price'] = $this->sellingPrice;
        $validatedData['is_featured'] = $this->isFeatured;

        if (empty($this->slug)) {
            $validatedData['slug'] = GenerateSlug::generate($this->name);
        }

        $product = Product::create($validatedData);

        if ($this->images) {
            $imageData = [];

            foreach ($this->images as $image) {
                $url = $image->store('/upload');
                $imageData[] = ['url' => $url];
            }

            $product->images()->createMany($imageData);
        }

        $this->alert('success', trans('Thêm sản phẩm mới thành công'));

        $this->redirect(IndexPage::class, navigate: true);
    }

    #[Layout('admin.layouts.app')]
    public function render(): View
    {
        $categories = Category::orderByDesc('created_at')
            ->get(['id', 'name'])
            ->pluck('name', 'id')
            ->toArray();

        return view('livewire.admin.product.create-page', [
            'categories' => $categories
        ]);
    }
}
