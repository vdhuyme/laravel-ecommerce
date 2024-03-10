<div class="product-area pb-60">
    <div class="container">
        <div class="section-title text-center">
            <h2>{{ __('Các sản phẩm nổi bật') }}</h2>
        </div>
        <div class="product-tab-list nav pt-30 pb-55 text-center">
            @foreach($categoryProducts as $key => $category)
                <a class="{{ $key == 0 ? 'active' : '' }}" href="#product-{{ $key + 1 }}" data-bs-toggle="tab">
                    <h4>{{ $category->name }}</h4>
                </a>
            @endforeach
        </div>

        <div class="tab-content jump">
            @foreach($categoryProducts as $key => $categoryProduct)
                <div class="tab-pane {{ $key == 0 ? 'active' : '' }}" id="product-{{ $key + 1 }}">
                    <div class="row">
                        @foreach($categoryProduct->products as $product)
                            <div class="col-xl-3 col-md-6 col-lg-4 col-sm-6">
                                <x-client.product-card :product="$product" />
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
