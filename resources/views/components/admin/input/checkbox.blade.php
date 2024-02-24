@props([
    'name' => null,
    'id' => null,
    'model' => null,
    'value' => null,
])

<div class="form-check">
    <input
            class="form-check-input"
            type="checkbox"
            id="{{ $id }}"
            name="{{ $name }}"
            wire:model="{{ $model ?: '' }}"
            value="{{ $value ?: '' }}"
    >
    <label class="form-check-label" for="{{ $id }}">
        {{ $slot }}
    </label>
</div>
