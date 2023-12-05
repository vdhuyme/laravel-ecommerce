<li class="minicart-wrap">
    <a href="{{ route('myCart') }}" class="minicart-btn toolbar-btn">
        <i class="ion-bag"></i>
        <span class="cart-item_count text-white">{{ $count }}</span>
    </a>
    @if (Auth::user())
        <div class="cart-item-wrapper dropdown-sidemenu dropdown-hover-2">
            @if ($cartProducts->count() > 0)
                @foreach ($cartProducts as $product)
                    <div class="single-cart-item">
                        @if ($product->product->productImages->count() > 0)
                            <div class="cart-img">
                                <a
                                        href="{{route('productDetail', ['id' => $product->product->id, 'slug' => $product->product->productSlug]) }}"><img
                                            src="{{ $product->product->productImages[0]->productImage }}" alt=""></a>
                            </div>
                        @else
                            <div class="cart-img">
                                <a
                                        href="{{ route('productDetail', ['id' => $product->product->id, 'slug' => $product->product->productSlug]) }}"><img
                                            src="{{ asset('client/assets/images/default.png') }}" alt=""></a>
                            </div>
                        @endif
                        <div class="cart-text">
                            <h5 class="title"><a
                                        href="{{ route('productDetail', ['id' => $product->product->id, 'slug' => $product->product->productSlug]) }}">{{ $product->product->productName }}</a>
                            </h5>
                            <div class="cart-text-btn">
                                <div class="cart-qty">
                                    <span>{{ $product->quantity }}×</span>
                                    <span class="cart-price">{{ number_format($product->product->sellingPrice, 0, '.', '.') }} VNĐ</span>
                                    <span class="old-price"><del>{{ number_format($product->product->originalPrice, 0, '.', '.') }} VNĐ</del></span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="cart-links d-flex justify-content-center">
                    <a class="obrien-button white-btn" href="{{ route('myCart') }}">Giỏ hàng</a>
                    <a class="obrien-button white-btn" href="{{ route('checkOut') }}">Thanh toán</a>
                </div>
            @else
                <span>Chưa có sản phẩm nào</span>
            @endif
        </div>
    @else
        <div class="cart-item-wrapper dropdown-sidemeny dropdown-hover-2">
            Chưa có sản phẩm nào
        </div>
    @endif
</li>