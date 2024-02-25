<?php

namespace App\Http\Livewire\Admin\Product;

use App\Helpers\GenerateSlug;
use App\Models\Category;
use App\Models\Product;
use App\Models\Image;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditPage extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public mixed $product;

    #[Validate('required|string|min:3|max:120')]
    public string $name = '';

    #[Validate('required|string')]
    public string $description = '';

    #[Validate('required|in:active,draft,archived')]
    public string $status = '';

    #[Validate('required|in:1,0')]
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

    public mixed $oldImages;

    public function mount(string|int $id): void
    {
        $product = Product::findOrFail($id);
        $this->product = $product;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->status = $product->status;
        $this->isFeatured = $product->is_featured;
        $this->slug = $product->slug;
        $this->originalPrice = $product->original_price;
        $this->sellingPrice = $product->selling_price;
        $this->categoryId = $product->category_id;
        $this->oldImages = $product->images()->get();
    }

    public function delete(string|int $id): void
    {
        $image = Image::findOrFail($id);

        $imageUrl = $image->url;
        $image->delete();

        if (File::exists($imageUrl)) {
            File::delete($imageUrl);
        }

        $this->alert('success', trans('Xóa ảnh thành công'));
        $this->dispatch('refreshImage');
    }

    public function update(): void
    {
        $validatedData = $this->validate();
        $validatedData['category_id'] = $this->categoryId;
        $validatedData['original_price'] = $this->originalPrice;
        $validatedData['selling_price'] = $this->sellingPrice;
        $validatedData['is_featured'] = $this->isFeatured;

        $product = $this->product;

        $newSlug = GenerateSlug::generate($this->name);

        if ($newSlug !== $product->slug) {
            $validatedData['slug'] = $newSlug;
        }

        if ($this->images) {
            $imageData = [];

            foreach ($this->images as $image) {
                $url = $image->store('/upload');
                $imageData[] = ['url' => $url];
            }

            $product->images()->createMany($imageData);
        }

        $product->update($validatedData);

        $this->alert('success', trans('Cập nhật sản phẩm thành công'));

        $this->redirect(IndexPage::class, navigate: true);
    }

    #[On('refreshImage')]
    #[Layout('admin.layouts.app')]
    public function render(): View
    {
        $categories = Category::orderByDesc('created_at')
            ->get(['id', 'name'])
            ->pluck('name', 'id')
            ->toArray();

        return view('livewire.admin.product.edit-page', [
            'categories' => $categories
        ]);
    }
}
