<!-- Product Area Start Here -->
<div class="product-area mb-no-text mt-text">
    <div class="container container-default custom-area">
        <div class="row">
            <div class="col-lg-5 m-auto text-center col-custom">
                <div class="section-content">
                    <h2 class="title-1 text-uppercase">Có thể bạn cũng thích</h2>
                    <div class="desc-content">
                        <p>Dưới đây là một số sản phẩm được đề xuất bởi chúng tôi.</p>
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
                    @foreach ($randomProducts as $product)
                    <div class="single-item">
                        <div class="single-product position-relative">
                            <div class="product-image">
                                @if ($product->productImages->count() > 0)
                                <a class="d-block"
                                    href="{{route('productDetail', ['id' => $product->id, 'slug' => $product->productSlug])}}">
                                    <img src="{{$product->productImages[0]->productImage}}" alt=""
                                        class="product-image-1 w-100">
                                    <img src="{{$product->productImages[1]->productImage}}" alt=""
                                        class="product-image-2 position-absolute w-100">
                                </a>
                                @else
                                <a class="d-block"
                                    href="{{route('productDetail', ['id' => $product->id, 'slug' => $product->productSlug])}}">
                                    <img src="client/assets/images/default.png" alt="" class="product-image-1 w-100">
                                    <img src="client/assets/images/default.png" alt=""
                                        class="product-image-2 position-absolute w-100">
                                </a>
                                @endif
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