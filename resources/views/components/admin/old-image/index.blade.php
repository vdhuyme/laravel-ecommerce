@props([
    'url' => ''
])

<div>
    <div class="d-flex justify-content-center align-items-center">
        <figure class="figure">
            <img src="{{ $url ? asset($url) : asset('assets/admin/images/default.jpg') }}"
                 class="rounded-circle avatar-xl" alt="{{ $url ? __('Ảnh đã tải lên') : __('Ảnh mặc định') }}">
        </figure>
    </div>
</div>