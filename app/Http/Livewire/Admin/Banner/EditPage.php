<?php

namespace App\Http\Livewire\Admin\Banner;

use App\Models\Banner;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditPage extends Component
{
    use WithFileUploads;

    public $bannerImage;

    public $bannerTitle;

    public $bannerSubTitle;

    public $bannerStatus;

    public $newBannerImage;

    public $showOldImage;

    public $isEditId;

    protected $rules = [
        'bannerTitle' => 'required',
        'bannerSubTitle' => 'required',
        'bannerStatus' => 'required|in:show,hide',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount($id)
    {
        $banner = Banner::findOrFail($id);
        $this->isEditId = $banner->id;
        $this->bannerTitle = $banner->bannerTitle;
        $this->bannerSubTitle = $banner->bannerSubTitle;
        $this->showOldImage = $banner->bannerImage;
        $this->bannerStatus = $banner->bannerStatus;
    }

    public function updateBanner()
    {
        $this->validate();
        $isEditId = $this->isEditId;
        $banner = Banner::findOrFail($isEditId);
        $oldImage = $banner->bannerImage;
        $newImage = $this->newBannerImage;
        if ($newImage != null) {
            File::delete($oldImage);
            $newImgUrl = $this->newBannerImage->store('upload');
        } else {
            $newImgUrl = $oldImage;
        }
        $banner->update([
            'bannerTitle' => $this->bannerTitle,
            'bannerSubTitle' => $this->bannerSubTitle,
            'bannerImage' => $newImgUrl,
        ]);
        $this->reset();
        session()->flash('success', 'Update banner successfully.');
        return redirect()->route('banners');
    }

    public function cleanupOldUploads()
    {
        $storage = Storage::disk('local');

        foreach ($storage->allFiles('livewire-tmp') as $filePathname) {
            $yesterdaysStamp = now()->subSeconds(1)->timestamp;
            if ($yesterdaysStamp > $storage->lastModified($filePathname)) {
                $storage->delete($filePathname);
            }
        }
    }

    public function render()
    {
        return view('livewire.admin.banner.edit-page')
            ->extends('admin.layouts.app')
            ->section('content');
    }
}
