<div>
    <div class="slider-area">
        <div class="obrien-slider arrow-style" data-slick-options='{
            "slidesToShow": 1,
            "slidesToScroll": 1,
            "infinite": true,
            "arrows": true,
            "dots": true,
            "autoplay" : true,
            "fade" : true,
            "autoplaySpeed" : 3000,
            "pauseOnHover" : false,
            "pauseOnFocus" : false
            }' data-slick-responsive='[
            {"breakpoint":992, "settings": {
            "slidesToShow": 1,
            "arrows": false,
            "dots": true
            }}
            ]'>

            @foreach ($banners as $banner)
                <div class="slide-item slide-1 bg-position slide-bg-1 animation-style-01" style="
            background-image: url('{{$banner->bannerImage}}');">
                    <div class="slider-content">
                        <h2 class="slider-large-title">{{ $banner->bannerTitle }}</h2>
                        <h4 class="slider-small-title">{{ $banner->bannerSubTitle }}</h4>
                        <div class="slider-btn">
                            <a class="obrien-button black-btn" href="{{ route('listOfProducts') }}">Mua sắm ngay</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>