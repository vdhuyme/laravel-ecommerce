<?php

namespace App\Http\Livewire\Admin\Slider;

use App\Models\Slider;
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

    public int $perPage = 10;

    public string $searchTerm = '';

    public function delete(string|int $id): void
    {
        $slider = Slider::findOrFail($id);

        File::delete($slider->image);
        $slider->delete();
        $this->alert('success', trans('Xóa danh mục thành công'));
    }

    #[Layout('admin.layouts.app')]
    public function render(): View
    {
        $sliders = Slider::where('title', 'like', '%' . $this->searchTerm . '%')
            ->orderByDesc('created_at')
            ->paginate($this->perPage);

        return view('livewire.admin.slider.index-page', [
            'sliders' => $sliders,
        ]);
    }
}
