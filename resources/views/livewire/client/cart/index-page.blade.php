<div>
    <div class="breadcrumbs-area position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-content position-relative section-content">
                        <h3 class="title-3">Giỏ hàng</h3>
                        <ul>
                            <li><a href="/">Trang chủ</a></li>
                            <li>Giỏ hàng của tôi</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="cart-main-wrapper mt-no-text mb-no-text">
        <div class="container container-default-2 custom-area">
            @if ($cartProducts->count() > 0)
                <div class="row">
                    <div class="col-lg-12">

                        @include('client.components.alerts')

                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="pro-thumbnail">Hình ảnh</th>
                                    <th class="pro-title">Tên sản phẩm</th>
                                    <th class="pro-price">Giá mua</th>
                                    <th class="pro-quantity">Số lượng</th>
                                    <th class="pro-subtotal">Thành tiền</th>
                                    <th class="pro-remove">Xóa</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($cartProducts as $product)
                                    <tr>
                                        <td class="pro-thumbnail">
                                            @if ($product->product->productImages->count() > 0)
                                                <a
                                                        href="{{ route('productDetail', ['id' => $product->product->id, 'slug' => $product->product->productSlug]) }}"><img
                                                            class="img-fluid"
                                                            src="{{ $product->product->productImages[0]->productImage }}"
                                                            alt="Product" /></a>
                                            @else
                                                <a  href="{{route('productDetail', ['id' => $product->product->id, 'slug' => $product->product->productSlug])}}"><img
                                                            class="img-fluid" src="{{ asset('client/assets/images/default.png') }}"
                                                            alt="Product" /></a>
                                            @endif
                                        </td>
                                        <td class="pro-title">
                                            <a href="{{ route('productDetail', ['id' => $product->product->id, 'slug' => $product->product->productSlug]) }}">{{ $product->product->productName }}</a>
                                        </td>
                                        <td class="pro-price"><span>{{ number_format($product->product->sellingPrice, 0, '.', '.') }} VNĐ </span> <span
                                                    class="old-price"><del>{{ number_format($product->product->originalPrice, 0, '.', '.') }} VNĐ</del></span></td>
                                        <td class="pro-quantity">
                                            <div class="quantity">
                                                <div class="cart-plus-minus">
                                                    <input readonly class="cart-plus-minus-box"
                                                           value="{{ $product->quantity }}" type="text">
                                                    <div wire:click="decQuantity({{ $product->id }})" class="dec qtybutton"><i
                                                                class="fa fa-minus"></i>
                                                    </div>
                                                    <div wire:click="incQuantity({{ $product->id }})" class="inc qtybutton"><i
                                                                class="fa fa-plus"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="pro-subtotal">
                                        <span>{{ number_format($product->product->sellingPrice*$product->quantity, 0, '.', '.')}} VNĐ</span>
                                        </td>
                                        <td class="pro-remove"><button wire:click="deleteCartProduct({{ $product->id }})"><i
                                                        class="ion-trash-b"></i></button></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 ml-auto">
                        <div class="cart-calculator-wrapper">
                            <a href="{{ route('checkOut') }}" class="btn obrien-button primary-btn d-block">Thanh toán</a>
                        </div>
                    </div>
                </div>
            @else
                <span class="text-center">
                <div class="error-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="error_form">
                                    <h3 class="title-3">Chưa có sản phẩm nào được thêm vào giỏ hàng</h3>
                                    <a href="{{ route('listOfProducts') }}">Tiếp tục mua sắm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </span>
            @endif
        </div>
    </div>
</div>