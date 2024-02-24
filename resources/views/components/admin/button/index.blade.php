@props([
    'type' => 'button',
    'class' => 'primary',
    'disable' => false,
    'clickMethod' => '',
])

@php
    $class = match($class) {
        'secondary' => 'btn btn-secondary',
        'danger' => 'btn btn-danger',
        'dark' => 'btn btn-dark',
        'warning' => 'btn btn-warning',
        'primary' => 'btn btn-primary',
    };
@endphp

<button
        type="{{ $type }}"
        class="{{ $class }}"
        {{ $disable ? 'disabled' : '' }}
        wire:click="{{ $clickMethod }}"
        {{ $attributes }}>

        <span class="d-flex align-items-center" >
            <span class="spinner-border flex-shrink-0"
                  wire:loading
                  wire:target="{{ $clickMethod }}"
                  role="status"
                  aria-hidden="true">
                <span class="visually-hidden">Loading...</span>
            </span>
            <span class="flex-grow-1 ms-2">
                {{ $slot }}
            </span>
        </span>
</button>
