@props([
    'pageTitle' => '',
    'breadcrumbs' => [],
])

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{ __(':pageTitle', ['pageTitle' => $pageTitle]) }}</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    @foreach($breadcrumbs as $breadcrumb)
                        @if($breadcrumb['url'])
                            <li class="breadcrumb-item"><a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['label'] }}</a></li>
                        @else
                            <li class="breadcrumb-item active">{{ $breadcrumb['label'] }}</li>
                        @endif
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</div>