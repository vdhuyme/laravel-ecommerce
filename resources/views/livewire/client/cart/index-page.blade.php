<div>
    <x-client.breadcrumb :breadcrumbs="[
        ['url' => '/', 'label' => 'Trang chủ'],
        ['url' => '', 'label' => 'Giỏ hàng']
    ]" />

    <div class="cart-main-area pt-90 pb-100">
        <div class="container">
            <h3 class="cart-page-title">{{ __('Giỏ hàng của bạn') }}</h3>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="table-content table-responsive cart-table-content">
                        <table>
                            <thead>
                            <tr>
                                <th>{{ __('Hình ảnh') }}</th>
                                <th>{{ __('Tên sản phẩm') }}</th>
                                <th>{{ __('Giá mua') }}</th>
                                <th>{{ __('Số luợng') }}</th>
                                <th>{{ __('Tạm tính') }}</th>
                                <th>{{ __('Hành động') }}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse($cartProducts as $cartProduct)
                                <tr>
                                    <td class="product-thumbnail">
                                        <x-link
                                                :to="route('product-detail', ['id' => $cartProduct->product->id, 'slug' => $cartProduct->product->slug])">
                                            <img
                                                    class="img-fluid"
                                                    alt="{{ $cartProduct->product->name }}"
                                                    src="{{ asset($cartProduct->product->featured_image) }}"></x-link>
                                    </td>

                                    <td class="product-name"><x-link :to="route('product-detail', ['id' => $cartProduct->product->id, 'slug' => $cartProduct->product->slug])">{{ $cartProduct->product->name }}</x-link></td>

                                    <td class="product-price-cart"><span class="amount">{{ __(':price', ['price' => FormatCurrencyHelper::formatCurrency($cartProduct->product->selling_price)]) }}</span></td>

                                    <td class="product-quantity">
                                        <div class="cart-plus-minus">
                                            <div wire:click="decrease({{ $cartProduct->product_id }})" class="dec qtybutton">{{ __('-') }}</div>
                                            <input
                                                    readonly
                                                    value="{{ $cartProduct->quantity }}"
                                                    class="cart-plus-minus-box"
                                                    type="text"
                                                    name="qtybutton" />
                                            <div wire:click="increase({{ $cartProduct->product_id }})" class="inc qtybutton">{{ __('+') }}</div>
                                        </div>
                                    </td>

                                    <td class="product-subtotal">{{ __(':price', ['price' => FormatCurrencyHelper::formatCurrency($cartProduct->quantity * $cartProduct->product->selling_price)]) }}</td>

                                    <td class="product-remove">
                                        <a wire:click="delete({{ $cartProduct->product_id }})" title="{{ __('Xóa') }}"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="100%">{{ __('Giỏ hàng đang trống kìa bạn ơi 😢') }}</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-shiping-update-wrapper">
                                <div class="cart-shiping-update">
                                    <a href="#">{{ __('Tiếp tục mua sắm') }}</a>

                                    <a href="#">{{ __('Thanh toán') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
