<?php

namespace App\Http\Livewire\Admin\Slider;

use App\Models\Slider;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditPage extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public mixed $slider;

    public string $oldImage;

    #[Validate('required|string|min:3|max:30')]
    public string $title = '';

    #[Validate('required|string|min:3|max:120')]
    public string $subtitle = '';

    #[Validate('nullable|file|max:1024')]
    public mixed $image = '';

    #[Validate('nullable')]
    public bool $isFeatured = false;

    public function mount(string|int $id): void
    {
        $this->slider = $slider = Slider::findOrFail($id);
        $this->title = $slider->title;
        $this->subtitle = $slider->subtitle;
        $this->oldImage = $slider->image;
        $this->isFeatured = $slider->status;
    }

    public function update(): void
    {
        $validatedData = $this->validate();
        $validatedData['status'] = $this->isFeatured;

        $slider = $this->slider;

        $validatedData['image'] = $slider->image;
        if (!empty($this->image) && $this->image !== $slider->image) {
            File::delete($slider->image);
            $validatedData['image'] = $this->image->store('upload');
        }

        $this->slider->update($validatedData);
        $this->alert('success', trans('Cập nhật hình ảnh thành công'));

        $this->redirect(IndexPage::class, navigate: true);
    }

    #[Layout('admin.layouts.app')]
    public function render(): View
    {
        return view('livewire.admin.slider.edit-page');
    }
}
