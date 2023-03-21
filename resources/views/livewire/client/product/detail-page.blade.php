@section('metaDes')
{{$metaDescription}}
@endsection
@section('metaTitle')
{{$metaTitle}}
@endsection
@section('metaKey')
{{$metaKey}}
@endsection

<div>
    <div class="breadcrumbs-area position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-content position-relative section-content">
                        <h3 class="title-3">{{$productName}}</h3>
                        <ul>
                            <li><a href="/">Trang chủ</a></li>
                            <li>{{$productName}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End Here -->
    <!-- Single Product Main Area Start -->
    <div class="single-product-main-area">
        <div class="container container-default custom-area">
            <div class="row">
                <div class="col-lg-5 col-custom" wire:ignore>
                    <div class="product-details-img horizontal-tab">
                        <div class="product-slider popup-gallery product-details_slider" data-slick-options='{
                                    "slidesToShow": 1,
                                    "arrows": false,
                                    "fade": true,
                                    "draggable": false,
                                    "swipe": false,
                                    "asNavFor": ".pd-slider-nav"
                                    }'>

                            @if ($productImages->count() > 0)
                            @foreach ($productImages as $productImage)
                            <div class="single-image border">
                                <a href="{{$productImage->productImage}}">
                                    <img src="{{$productImage->productImage}}" alt="Product">
                                </a>
                            </div>
                            @endforeach
                            @else
                            <div class="single-image border">
                                <a href="client/assets/images/default.png">
                                    <img src="client/assets/images/default.png" alt="Product">
                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="pd-slider-nav product-slider" data-slick-options='{
                                    "slidesToShow": 4,
                                    "asNavFor": ".product-details_slider",
                                    "focusOnSelect": true,
                                    "arrows" : false,
                                    "spaceBetween": 30,
                                    "vertical" : false
                                    }' data-slick-responsive='[
                                        {"breakpoint":1501, "settings": {"slidesToShow": 4}},
                                        {"breakpoint":1200, "settings": {"slidesToShow": 4}},
                                        {"breakpoint":992, "settings": {"slidesToShow": 4}},
                                        {"breakpoint":575, "settings": {"slidesToShow": 3}}
                                    ]'>
                            @if ($productImages->count() > 0)
                            @foreach ($productImages as $productImage)
                            <div class="single-thumb border">
                                <img src="{{$productImage->productImage}}" alt="Product Thumnail">
                            </div>
                            @endforeach
                            @else
                            <div class="single-thumb border">
                                <img src="client/assets/images/default.png" alt="Product Thumnail">
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-custom">
                    <div class="product-summery position-relative">
                        <div class="product-head mb-3">
                            <h2 class="product-title">{{$productName}}</h2>
                        </div>
                        <div class="price-box mb-2">
                            <span class="regular-price">{{number_format($sellingPrice, 0, '.',
                                '.')}} VNĐ</span>
                            <span class="old-price"><del>{{number_format($originalPrice, 0, '.',
                                    '.')}} VNĐ</del></span>
                        </div>
                        <div class="sku mb-3">
                            <span>@if ($stock === "inStock")
                                <strong class="text-success">Còn hàng</strong>
                                @else
                                <strong class="text-danger">Hết hàng</strong>
                                @endif</span>
                        </div>
                        <div class="sku mb-3">
                            <span>Danh mục: {{$category}}</span>
                        </div>
                        <p class="desc-content mb-5">{{$description}}</p>

                        <div>
                            @include('client.components.alerts')
                        </div>

                        @if ($stock !== "outStock")
                        <div class="quantity-with_btn mb-4">
                            <div class="quantity">
                                <div class="cart-plus-minus">
                                    <input readonly wire:model="quantity" value="{{$quantity}}"
                                        class="cart-plus-minus-box">
                                    <div wire:click="decQuantity" class="dec qtybutton">-</div>
                                    <div wire:click="incQuantity" class="inc qtybutton">+</div>
                                </div>
                            </div>
                            <div class="add-to_cart">
                                <button wire:click.prevent="addToCart({{$productId}})"
                                    class="btn obrien-button primary-btn">Thêm
                                    vào
                                    giỏ
                                </button>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Single Product Main Area End -->
</div>

<livewire:client.product.random-product>