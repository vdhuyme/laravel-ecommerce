@section('metaTitle')
{{$this->metaDescription}}
@endsection
@section('metaDes')
{{$this->metaTitle}}
@endsection
@section('metaKey')
{{$this->metaKey}}
@endsection

<div>
    <!-- Breadcrumb Area Start Here -->
    <div class="breadcrumbs-area position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-content position-relative section-content">
                        <h3 class="title-3">{{$articleTitle}}</h3>
                        <ul>
                            <li><a href="/">Trang chủ</a></li>
                            <li>{{$articleTitle}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End Here -->
    <!-- Blog Main Area Start Here -->
    <div class="blog-main-area mb-text">
        <div class="container container-default-2 custom-area">
            <div class="row flex-row-reverse">
                <div class="col-12 col-custom mt-no-text">
                    <!-- Blog Details wrapper Area Start -->
                    <div class="blog-post-details">
                        <figure class="blog-post-thumb mb-5">
                            <img class="w-100" src="{{$articleImage}}" alt="Blog Image">
                        </figure>
                        <section class="blog-post-wrapper product-summery">
                            <div class="section-content">
                                {!!$articleContent!!}
                            </div>
                        </section>
                    </div>
                    <!-- Blog Details Wrapper Area End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Main Area End Here -->
</div>