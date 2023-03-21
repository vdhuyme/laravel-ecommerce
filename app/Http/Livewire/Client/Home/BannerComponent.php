<?php

namespace App\Http\Livewire\Client\Home;

use App\Models\Banner;
use Livewire\Component;

class BannerComponent extends Component
{
    public function render()
    {
        $banners = Banner::orderBy('created_at', 'desc')
            ->where('bannerStatus', 'show')
            ->take(4)->get();
        return view('livewire.client.home.banner-component', [
            'banners' => $banners,
        ]);
    }
}
