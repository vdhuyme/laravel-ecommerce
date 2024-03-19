@props([
    'product' => null,
    'scrollToZoom' => false
])

@php
    $originalPrice = $product->original_price;
    $sellingPrice = $product->selling_price;
    $discountPercentage = 0;

    if ($originalPrice && $sellingPrice && $originalPrice > $sellingPrice) {
        $discountPercentage = (($originalPrice - $sellingPrice) / $originalPrice) * 100;
        $discountPercentage = ceil($discountPercentage);
    }
@endphp

<div class="product-wrap mb-25 {{ $scrollToZoom ?? 'scroll-zoom' }}">
    <div class="product-img">
        <x-link :to="route('product-detail', ['id' => $product->id, 'slug' => $product->slug])">
            <img class="default-img" src="{{ asset($product->featured_image) }}" alt="{{ $product->name }}">
        </x-link>

        @if ($discountPercentage > 0)
            <span class="pink">{{ __('- :discountPercentage', ['discountPercentage' => $discountPercentage]) }}%</span>
        @endif
    </div>

    <div class="product-content text-center">
        <h3><x-link :to="route('product-detail', ['id' => $product->id, 'slug' => $product->slug])">{{ $product->name }}</x-link></h3>
        <div class="product-price">
            <span>{{ FormatCurrencyHelper::formatCurrency($product->selling_price ?? $product->original_price) }}</span>
            @if($product->selling_price)
                <span class="old">{{ FormatCurrencyHelper::formatCurrency($product->original_price) }}</span>
            @endif
        </div>
    </div>
</div>