<div>
    <div class="product-area mt-text mb-text">
        <div class="container container-default custom-area">
            <div class="row">
                <div class="col-lg-5 m-auto text-center col-custom">
                    <div class="section-content">
                        <h2 class="title-1 text-uppercase">Sản phẩm nổi bật</h2>
                        <div class="desc-content">
                            <p>Tất cả các sản phẩm nổi bật nhất hiện có sẵn cho bạn và bạn có thể mua sản phẩm này từ
                                đây
                                mọi lúc, mọi nơi.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 product-wrapper col-custom">
                    <div class="product-slider" data-slick-options='{
                    "slidesToShow": 4,
                    "slidesToScroll": 1,
                    "autoplay" : true,
                    "autoplaySpeed" : 2000,
                    "infinite": true,
                    "arrows": false,
                    "dots": false
                    }' data-slick-responsive='[
                    {"breakpoint": 1200, "settings": {
                    "slidesToShow": 3
                    }},
                    {"breakpoint": 992, "settings": {
                    "slidesToShow": 2
                    }},
                    {"breakpoint": 576, "settings": {
                    "slidesToShow": 1
                    }}
                    ]'>
                        @foreach ($featuredProducts as $product)
                        <div class="single-item">
                            <div class="single-product position-relative">
                                <div class="product-image">
                                    <a class="d-block"
                                        href="{{route('productDetail', ['id' => $product->id, 'slug' => $product->productSlug])}}">
                                        <img src="{{ isset($product->productImages[0]) ? $product->productImages[0]->image
                                        : 'client/assets/images/default.png' }}" alt="{{ $product->productName }}">
                                        <img class="second-img" src="{{ isset($product->productImages[1]) ? $product->productImages[1]->image
                                            : 'client/assets/images/default.png' }}" alt="{{ $product->productName }}">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a
                                                href="{{route('productDetail', ['id' => $product->id, 'slug' => $product->productSlug])}}">{{$product->productName}}</a>
                                        </h4>
                                    </div>
                                    <div class="price-box">
                                        <span class="regular-price ">{{number_format($product->sellingPrice, 0, '.',
                                            '.')}} VNĐ</span>
                                        <span class="old-price"><del>{{number_format($product->originalPrice, 0,
                                                '.', '.')}} VNĐ</del></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
