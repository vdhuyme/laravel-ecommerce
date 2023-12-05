<div>
    <div class="breadcrumbs-area position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-content position-relative section-content">
                        <h3 class="title-3">Bài viết</h3>
                        <ul>
                            <li><a href="/">Trang chủ</a></li>
                            <li>Bài viết</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="blog-main-area mb-text mt-text">
        <div class="container container-default custom-area">
            <div class="row">
                <div class="col-12 col-custom">
                    <div class="row">
                        @foreach ($articles as $article)
                            <div class="col-lg-4 col-md-6 col-custom mb-4" @if ($loop->last) id="lastRecord" @endif>
                                <div class="single-blog">
                                    <div class="single-blog-thumb">
                                        <a
                                                href="{{ route('articleDetail', ['id' => $article->id, 'slug' => $article->articleSlug]) }}">
                                            <img src="{{ $article->articleImage }}" alt="Blog Image">
                                        </a>
                                    </div>
                                    <div class="single-blog-content position-relative">
                                        <div
                                                class="post-date text-center border rounded d-flex flex-column position-absolute">
                                            <span>{{ $article->created_at->format('d') }}</span>
                                            <span>{{ $article->created_at->format('m') }}</span>
                                        </div>
                                        <div class="post-meta">
                                            <span class="author">Viết bởi: {{ $article->user->roles }}</span>
                                        </div>
                                        <h2 class="post-title">
                                            <a
                                                    href="{{ route('articleDetail', ['id' => $article->id, 'slug' => $article->articleSlug]) }}">{{substr($article->articleTitle,
                                            0, 30)}}</a>
                                        </h2>
                                        <p class="desc-content">{{ substr($article->shortContent, 0, 30) }}...</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div wire:loading.delay>
                            <div class="row">
                                <div class="text-center">
                                    <div class="spinner-border spinner-border-sm"></div> Tải thêm
                                </div>
                            </div>
                        </div>
                        @if ($loadAmount >= $totalRecords)
                            <h3 class="text-center mt-text"><strong>Opps!!! Không còn bài viết nào nữa</strong></h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script>
        const lastRecord = document.getElementById('lastRecord');
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                @this.loadMore()
                }
            });
        });
        observer.observe(lastRecord);
    </script>
@endsection