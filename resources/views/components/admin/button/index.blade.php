@props([
    'type' => 'button',
    'class' => 'primary',
    'disable' => false,
])

<button
        type="{{ $type }}"
        class="{{ $class }}"
        {{ $disable ? 'disabled' : '' }}
        {{ $attributes }}>

    {{ $slot }}
</button>
