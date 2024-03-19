<?php

namespace App\Http\Livewire\Admin\Slider;

use App\Models\Slider;
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

    #[Validate('required|file|max:1024')]
    public mixed $image = '';

    #[Validate('required|string|min:3|max:30')]
    public string $title = '';

    #[Validate('required|string|min:3|max:30')]
    public string $subtitle;

    #[Validate('nullable')]
    public bool $isFeatured = false;

    public function store(): void
    {
        $validatedData =  $this->validate();

        $validatedData['image'] = $this->image->store('upload');
        $validatedData['status'] = $this->isFeatured;

        Slider::create($validatedData);
        $this->alert('success', trans('Thêm ảnh mới thành công'));

        $this->redirect(IndexPage::class, navigate: true);
    }

    #[Layout('admin.layouts.app')]
    public function render(): View
    {
        return view('livewire.admin.slider.create-page');
    }
}
