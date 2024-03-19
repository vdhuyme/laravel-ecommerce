<div class="same-style cart-wrap">
    <button class="icon-cart">
        <i class="pe-7s-shopbag"></i>
        @if(Auth::check())
            <span class="count-style">{{ $cartProducts->count() }}</span>
        @endif
    </button>

    @if(Auth::check())
        <div class="shopping-cart-content">
            <ul>
                @forelse($cartProducts as $cartProduct)
                    <li class="single-shopping-cart">
                        <div class="shopping-cart-img">
                            <x-link
                                    :to="route('product-detail', ['id' => $cartProduct->product->id, 'slug' => $cartProduct->product->slug])">
                                <img
                                        class="img-fluid"
                                        alt="{{ $cartProduct->product->name }}"
                                        src="{{ asset($cartProduct->product->featured_image) }}"></x-link>
                        </div>

                        <div class="shopping-cart-title">
                            <h4><x-link
                                        :to="route('product-detail', ['id' => $cartProduct->product->id, 'slug' => $cartProduct->product->slug])">{{ $cartProduct->product->name }}</x-link></h4>
                            <h6>{{ __('Số lượng: :amount', ['amount' => $cartProduct->quantity]) }}</h6>
                            <span>{{ __(':price', ['price' => FormatCurrencyHelper::formatCurrency($cartProduct->quantity * $cartProduct->product->selling_price)]) }}</span>
                        </div>
                    </li>
                @empty
                    <li class="single-shopping-cart">
                        <p>{{ __('Giỏ hàng đang trống kìa bạn ơi 😢') }}</p>
                    </li>
                @endforelse
            </ul>

            <div class="shopping-cart-btn btn-hover text-center">
                <x-link
                        :to="route('user-cart')"
                        class="default-btn">{{ __('Xem giỏ hàng') }}</x-link>
                <x-link
                        class="default-btn">{{ __('Thanh toán') }}</x-link>
            </div>
        </div>
    @endif
</div>
