@props([
    'title' => ''
])

<div class="card-header">
    {{ $slot }}
    <h6 class="card-title mb-0">{{ $title ?? '' }}</h6>
</div>