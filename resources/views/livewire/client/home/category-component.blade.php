<div>
    <div class="banner-area">
        <div class="container container-default custom-area">
            <div class="row mb-text">
                <div class="col-lg-5 m-auto text-center col-custom">
                    <div class="section-content">
                        <h2 class="title-1 text-uppercase">Danh mục sản phẩm nổi bật</h2>
                        <div class="desc-content">
                            <p>Các danh mục hàng hóa nổi bật nhất hiện có sẵn cho bạn và bạn có thể mua sản phẩm này từ đây
                                mọi lúc, mọi nơi.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($categories as $category)
                <div class="col-md-4 col-sm-12 col-custom">
                    <div class="banner-image hover-style">
                        <a class="d-block" href="{{route('listOfProducts')}}">
                            <img class="w-100" src="{{$category->categoryImage}}" alt="Category Image">
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>