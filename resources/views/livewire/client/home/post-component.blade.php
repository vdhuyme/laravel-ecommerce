<div>
    <div class="latest-blog-area mb-text">
        <div class="container container-default custom-area">
            <div class="row">
                <div class="col-lg-5 m-auto text-center col-custom">
                    <div class="section-content">
                        <h2 class="title-1 text-uppercase">Bài viết nổi bật</h2>
                        <div class="desc-content">
                            <p>Nếu bạn muốn biết về sản phẩm hữu cơ thì hãy theo dõi blog của chúng tôi.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-custom">
                    <div class="obrien-slider" data-slick-options='{
                    "slidesToShow": 3,
                    "slidesToScroll": 1,
                    "autoplay" : true,
                    "autoplaySpeed" : 2000,
                    "infinite": true,
                    "arrows": false,
                    "dots": false
                    }' data-slick-responsive='[
                    {"breakpoint": 1200, "settings": {
                    "slidesToShow": 2
                    },
                    {"breakpoint": 992, "settings": {
                    "slidesToShow": 2
                    },
                    {"breakpoint": 768, "settings": {
                    "slidesToShow": 1
                    },
                    {"breakpoint": 576, "settings": {
                    "slidesToShow": 1
                    }
                    ]'>
                        @foreach ($featuredArticles as $article)
                            <div class="single-blog">
                                <div class="single-blog-thumb">
                                    <a
                                            href="{{ route('articleDetail', ['id' => $article->id, 'slug' => $article->articleSlug]) }}">
                                        <img src="{{ $article->articleImage }}" alt="Blog Image">
                                    </a>
                                </div>
                                <div class="single-blog-content position-relative">
                                    <div class="post-date text-center border rounded d-flex flex-column position-absolute">
                                        <span>{{ $article->created_at->format('d') }}</span>
                                        <span>{{ $article->created_at->format('m') }}</span>
                                    </div>
                                    <div class="post-meta">
                                        <span class="author">Viết bởi: {{$article->user->roles}}</span>
                                    </div>
                                    <h2 class="post-title">
                                        <a
                                                href="{{ route('articleDetail', ['id' => $article->id, 'slug' => $article->articleSlug])}}">
                                            {{ substr($article->articleTitle, 0, 30) }}</a>
                                    </h2>
                                    <p class="desc-content">{{ substr($article->shortContent, 0, 30) }}...</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>