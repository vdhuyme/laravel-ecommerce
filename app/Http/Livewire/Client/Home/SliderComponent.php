<?php

namespace App\Http\Livewire\Client\Home;

use App\Models\Slider;
use Illuminate\View\View;
use Livewire\Component;

class SliderComponent extends Component
{
    public function render(): View
    {
        $sliders = Slider::orderByDesc('created_at')
            ->where('status', 1)
            ->get();

        return view('livewire.client.home.slider-component', [
            'sliders' => $sliders,
        ]);
    }
}
