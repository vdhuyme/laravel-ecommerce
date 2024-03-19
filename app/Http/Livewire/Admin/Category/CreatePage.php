<?php

namespace App\Http\Livewire\Admin\Category;

use App\Helpers\GenerateSlug;
use App\Models\Category;
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

    #[Validate('required|string|min:3|max:30')]
    public string $name = '';

    #[Validate('nullable|string|min:3|max:120')]
    public string $slug = '';

    #[Validate('required|file|max:1024')]
    public mixed $image = '';

    #[Validate('nullable')]
    public bool $isFeatured = false;

    public function store(): void
    {
        $validatedData = $this->validate();
        $validatedData['is_featured'] = $this->isFeatured;
        $validatedData['image'] = $this->image->store('upload');

        if (empty($this->slug)) {
            $validatedData['slug'] = GenerateSlug::generate($this->name);
        }

        Category::create($validatedData);
        $this->alert('success', trans('Thêm danh mục mới thành công'));

        $this->redirect(IndexPage::class, navigate: true);
    }

    #[Layout('admin.layouts.app')]
    public function render(): View
    {
        return view('livewire.admin.category.create-page');
    }
}
