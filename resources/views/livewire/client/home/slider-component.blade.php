<div>
    @if(!$sliders->isEmpty())
        <div class="slider-area">
            <div class="slider-active owl-carousel nav-style-1 owl-dot-none">
                @foreach($sliders as $key => $slider)
                    <div class="single-slider slider-height-1 bg-purple">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-6">
                                    <div class="slider-content slider-animated-1">
                                        <h3 class="animated">{{ $slider->title }}</h3>
                                        <h1 class="animated">{{ $slider->subtitle }}</h1>
                                        <div class="slider-btn btn-hover">
                                            <a class="animated" href="shop.html">{{ __('Mua sắm ngay') }}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-6">
                                    <div class="slider-single-img slider-animated-1">
                                        <img class="animated" src="{{ asset($slider->image) }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>