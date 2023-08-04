<div>
    <div class="breadcrumbs-area position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-content position-relative section-content">
                        <h3 class="title-3">Cửa hàng</h3>
                        <ul>
                            <li><a href="/">Trang chủ</a></li>
                            <li>Cửa hàng</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="shop-main-area mb-text">
        <div class="container container-default custom-area">
            <div class="row flex-row-reverse">
                <div class="col-lg-9 col-12 col-custom widget-mt">
                    <!--shop toolbar start-->
                    <div class="shop_toolbar_wrapper">
                        <div class="shop_toolbar_btn">
                            <button data-role="grid_3" type="button" class="active btn-grid-3" data-bs-toggle="tooltip"
                                title="3"><i class="fa fa-th"></i></button>
                            <!-- <button data-role="grid_4" type="button"  class=" btn-grid-4" data-bs-toggle="tooltip" title="4"></button> -->
                            <button data-role="grid_list" type="button" class="btn-list" data-bs-toggle="tooltip"
                                title="List"><i class="fa fa-th-list"></i></button>
                        </div>
                    </div>
                    <!--shop toolbar end-->
                    <!-- Shop Wrapper Start -->
                    <div class="row shop_wrapper grid_3">
                        @if ($products->count() >0 )
                        @foreach ($products as $product)
                        <div class="col-md-6 col-sm-6 col-lg-4 col-custom product-area">
                            <div class="single-product position-relative">
                                <div class="product-image">
                                    @if ($product->productImages->count() > 0)
                                    <a class="d-block"
                                        href="{{route('productDetail', ['id' => $product->id, 'slug' => $product->productSlug])}}">
                                        <img src="{{ isset($product->productImages[0]) ? $product->productImages[0]->image
                                        : 'client/assets/images/default.png' }}" alt="{{ $product->name }}"
                                            class="product-image-1 w-100">
                                        <img src="{{ isset($product->productImages[1]) ? $product->productImages[0]->image
                                        : 'client/assets/images/default.png' }}" alt="{{ $product->name }}"
                                            class="product-image-2 position-absolute w-100">
                                    </a>
                                    @else
                                    <a class="d-block"
                                        href="{{route('productDetail', ['id' => $product->id, 'slug' => $product->productSlug])}}">
                                        <img src="client/assets/images/default.png" alt=""
                                            class="product-image-1 w-100">
                                        <img src="client/assets/images/default.png" alt=""
                                            class="product-image-2 position-absolute w-100">
                                    </a>
                                    @endif
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a
                                                href="{{route('productDetail', ['id' => $product->id, 'slug' => $product->productSlug])}}">{{$product->productName}}</a>
                                        </h4>
                                    </div>
                                    <div class="price-box">
                                        <span class="regular-price ">{{number_format($product->sellingPrice, 0, '.',
                                            '.')}} VNĐ</span>
                                        <span class="old-price"><del>{{number_format($product->originalPrice, 0,
                                                '.', '.')}} VNĐ</del></span>
                                    </div>
                                </div>
                                <div class="product-content-listview">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a
                                                href="{{route('productDetail', ['id' => $product->id, 'slug' => $product->productSlug])}}">{{$product->productName}}</a>
                                        </h4>
                                    </div>
                                    <div class="price-box">
                                        <span class="regular-price ">{{number_format($product->sellingPrice, 0, '.',
                                            '.')}} VNĐ</span>
                                        <span class="old-price"><del>{{number_format($product->originalPrice, 0,
                                                '.', '.')}} VNĐ</del></span>
                                    </div>
                                    <p class="desc-content">
                                        {{$product->description}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="row">
                            <div class="col-sm-12 col-custom">
                                <div class="mt-3 mb-3">
                                    <div class="text-center mt-3">Không có sản phẩm nào</div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <!-- Shop Wrapper End -->

                    {{$products->onEachSide(1)->links('client.components.pagination')}}

                    <!-- Bottom Toolbar End -->
                </div>
                <div class="col-lg-3 col-12 col-custom">
                    <!-- Sidebar Widget Start -->
                    <aside class="sidebar_widget widget-mt">
                        <div class="widget_inner">
                            <div class="widget-list widget-mb-1">
                                <h3 class="widget-title">Tìm kiếm</h3>
                                <div class="search-box">
                                    <div class="input-group">
                                        <input wire:model="searchTerm" type="text" class="form-control"
                                            placeholder="Tìm kiếm sản phẩm">
                                    </div>
                                </div>
                            </div>

                            <div class="widget-list widget-mb-1">
                                <h3 class="widget-title">Danh mục</h3>
                                <div class="sidebar-body">
                                    <ul class="sidebar-list">
                                        @if ($categories->count()>0)
                                        @foreach ($categories as $category)
                                        <li>
                                            <input class="form-check-input" type="checkbox" wire:model="filterTerm"
                                                value="{{$category->id}}" id="{{$category->categoryName}}">
                                            <label class="form-check-label" for="{{$category->categoryName}}">
                                                {{$category->categoryName}} ({{$category->products->count()}})
                                            </label>
                                        </li>
                                        @endforeach
                                        @else
                                        <li>Không có danh mục nào</li>
                                        @endif
                                    </ul>
                                </div>
                            </div>

                            <div class="widget-list widget-mb-1">
                                <h3 class="widget-title">Sắp xếp</h3>
                                <div class="sidebar-body">
                                    <ul class="sidebar-list">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" wire:model="sortTerm" value=""
                                                name="flexRadioDefault" id="flexRadioDefault3">
                                            <label class="form-check-label" for="flexRadioDefault3">
                                                Mặc định
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" wire:model="sortTerm"
                                                value="lowToHight" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Giá tăng dần
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" wire:model="sortTerm"
                                                value="hightToLow" name="flexRadioDefault" id="flexRadioDefault2">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Giá giảm dần
                                            </label>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <!-- Sidebar Widget End -->
                </div>
            </div>
        </div>
    </div>
</div>
