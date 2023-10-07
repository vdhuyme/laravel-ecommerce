<?php

namespace App\Http\Livewire\Admin\Banner;

use App\Models\Banner;
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

    public function deleteBanner($id)
    {
        $banner = Banner::findOrFail($id);
        $this->isDeleteId = $banner->id;
    }

    public function destroyBanner()
    {
        $isDeleteId = $this->isDeleteId;
        $banner = Banner::findOrFail($isDeleteId);
        File::delete($banner->bannerImage);
        $banner->delete();
        session()->flash('success', 'Delete banner successfully.');
        $this->dispatchBrowserEvent('hidden-modal');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        return view('livewire.admin.banner.index-page', [
            'banners' => Banner::where('bannerTitle', 'like', $searchTerm)
                ->orderBy('created_at', 'desc')
                ->paginate($this->perPage)
        ])
            ->extends('admin.layouts.app')
            ->section('content');
    }
}
