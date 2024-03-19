<div>
    <x-client.breadcrumb :breadcrumbs="[
        ['url' => '/', 'label' => 'Trang chủ'],
        ['url' => '', 'label' => __('Sản phẩm: :name', ['name' => $product->name])]
    ]" />

    <div class="shop-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-7 col-md-12">
                    <div class="product-details-img mr-20 product-details-tab">
                        <div id="gallery" class="product-dec-slider-2">
                            @foreach($product->images as $key => $image)
                                <a data-image="{{ asset($image->url) }}" data-zoom-image="{{ asset($image->url) }}">
                                    <img src="{{ asset($image->url) }}" alt="{{ $product->name }}">
                                </a>
                            @endforeach
                        </div>
                        <div class="zoompro-wrap zoompro-2 pl-20">
                            <div class="zoompro-border zoompro-span">
                                <img class="zoompro" src="{{ asset($image->url) }}" data-zoom-image="{{ asset($image->url) }}" alt=""/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-lg-5 col-md-12">
                    <div class="product-details-content">
                        <h2>{{ $product->name }}</h2>
                        <div class="product-details-price">
                            <span>{{ FormatCurrencyHelper::formatCurrency($product->selling_price ?? $product->original_price) }}</span>
                            @if($product->selling_price)
                                <span class="old">{{ FormatCurrencyHelper::formatCurrency($product->original_price) }}</span>
                            @endif
                        </div>

                        <p>{!! $product->description !!}</p>

                        <livewire:client.cart.add-to-cart :productId="$product->id" />

                        <div class="pro-details-meta">
                            <span>{{ __('Danh mục: ') }}</span>
                            <ul>
                                <li><x-link to="">{{ $product->category->name }}</x-link></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <livewire:client.product.related-product
                wire:key="relatedProduct"
                :productId="$product->id"
                :categoryId="$product->category->id" />
    </div>
</div>

