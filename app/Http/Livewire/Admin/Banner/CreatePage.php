<?php

namespace App\Http\Livewire\Admin\Banner;

use App\Models\Slider;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePage extends Component
{
    use WithFileUploads;

    public $bannerImage;

    public $bannerTitle;

    public $bannerSubTitle;

    public $bannerStatus;

    protected $rules = [
        'bannerImage' => 'required|image',
        'bannerTitle' => 'required',
        'bannerSubTitle' => 'required',
        'bannerStatus' => 'required|in:show,hide',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function storeBanner()
    {
        $validatedData = $this->validate();
        $imgUrl = $this->bannerImage->store('upload');
        $validatedData['bannerImage'] = $imgUrl;
        Slider::create($validatedData);
        $this->reset();
        session()->flash('success', 'Create new banner successfully.');
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
        return view('livewire.admin.banner.create-page')
            ->extends('admin.layouts.app')
            ->section('content');
    }
}
