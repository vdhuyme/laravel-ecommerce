@props([
    'class' => null,
    'to' => null,
    'navigate' => true,
])

<a
        {{ $navigate ? 'wire:navigate' : '' }}
        class="{{ $class }}"
        href="{{ $to }}"
        {{ $attributes }} >
    {{ $slot }}
</a>
