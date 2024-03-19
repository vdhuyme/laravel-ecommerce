<div>
    <x-client.breadcrumb :breadcrumbs="[
        ['url' => '/', 'label' => 'Trang chủ'],
        ['url' => '', 'label' => 'Cửa hàng']
    ]" />

    <div class="shop-area pt-95 pb-100">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-12">
                    <div class="shop-top-bar mb-35">
                        <div class="filter-active">
                            <a href="#"><i class="fa fa-plus"></i> {{ __('Lọc theo') }}</a>
                        </div>
                    </div>

                    <div class="product-filter-wrapper" wire:ignore>
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-xs-12 mb-30">
                                <div class="pro-sidebar-search mb-50">
                                    <div class="pro-sidebar-search-form">
                                        <input
                                                wire:model.live="searchTerm"
                                                name="searchTerm"
                                                id="searchTerm"
                                                type="text"
                                                placeholder="{{ __('Nhập từ khóa') }}" />
                                        <button><i class="pe-7s-search"></i> </button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6 col-xs-12 mb-30">
                                <div class="product-filter">
                                    <h5>Sắp xếp theo</h5>
                                    <ul class="color-filter">
                                        <li><input
                                                    id="sort-default"
                                                    wire:model.live="sortTerm"
                                                    name="sortTerm"
                                                    type="radio"
                                                    value=""> <label for="sort-default">{{ __('Mặc định') }}</label></li>

                                        <li><input
                                                    id="sort-low-to-high"
                                                    wire:model.live="sortTerm"
                                                    name="sortTerm"
                                                    type="radio"
                                                    value="lowToHigh"> <label for="sort-low-to-high">{{ __('Giá: từ thấp đến cao') }}</label></li>

                                        <li><input
                                                    id="sort-high-to-low"
                                                    wire:model.live="sortTerm"
                                                    name="sortTerm"
                                                    type="radio"
                                                    value="highToLow"> <label for="sort-high-to-low">{{ __('Giá: từ cao đến thấp') }}</label></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6 col-xs-12 mb-30">
                                <div class="product-filter">
                                    <h5>{{ __('Danh mục') }}</h5>
                                    <ul class="color-filter">
                                        @foreach($categories as $key => $category)
                                            <li><input
                                                        id="{{ __(':name-:key', ['name' => $category->name, 'key' => $key]) }}"
                                                        wire:model.live="filterTerm"
                                                        name="filterTerm"
                                                        type="checkbox"
                                                        value="{{ $category->id }}"> <label for="{{ __(':name-:key', ['name' => $category->name, 'key' => $key]) }}">{{ $category->name }}</label></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="shop-bottom-area">
                        <div class="row">
                            @foreach($products as $product)
                                <div class="col-xl-4 col-md-6 col-lg-4 col-sm-6">
                                    <x-client.product-card
                                            wire:key="shopProducts"
                                            :product="$product"
                                            :scrollToZoom="true" />
                                </div>
                            @endforeach
                        </div>

                        <div
                                x-intersect="$wire.loadMore()"
                                class="load-more">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>