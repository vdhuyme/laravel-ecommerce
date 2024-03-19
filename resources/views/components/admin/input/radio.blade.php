@props([
    'name' => null,
    'id' => null,
    'model' => null,
    'value' => null,
])

<div class="form-check">
    <input
            class="form-check-input"
            type="radio"
            id="{{ $id }}"
            name="{{ $name }}"
            wire:model="{{ $model ?: '' }}"
            value="{{ $value ?: '' }}"
            {{ $attributes }} />
    <label class="form-check-label" for="{{ $id }}">
        {{ $slot }}
    </label>
</div>
