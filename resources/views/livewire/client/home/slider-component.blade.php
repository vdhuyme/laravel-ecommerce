<div class="slider-area">
    <div class="slider-active owl-carousel nav-style-1 owl-dot-none">
        @forelse($sliders as $slider)
            <div class="single-slider-2 slider-height-20 d-flex align-items-center slider-height-res bg-img" style="background-image:url({{ asset($slider->image) }});">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider-content-20 slider-animated-1">
                                <h3 class="animated">{{ $slider->title }}</h3>
                                <h1 class="animated">{{ $slider->subtitle }}</h1>
                                <div class="slider-btn slider-btn-round btn-hover">
                                    <x-link class="animated" :to="route('product-list')">{{ __('Mua sắm ngay') }}</x-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center">
                {{ __('Không có dữ liệu') }}
            </div>
        @endforelse
    </div>
</div>