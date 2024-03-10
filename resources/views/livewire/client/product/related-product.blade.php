<div class="related-product-area pb-95">
    <div class="container">
        <div class="section-title text-center mb-50">
            <h2>{{ __('Sản phẩm liên quan') }}</h2>
            <p class="text-muted">{{ __('Có thể bạn cũng thích') }}</p>
        </div>

        <div class="related-product-active owl-carousel owl-dot-none">
            @foreach($products as $product)
                <x-client.product-card :product="$product" />
            @endforeach
        </div>
    </div>
</div>
