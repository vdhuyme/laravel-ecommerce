@props([
    'label' => null,
    'type' => 'text',
    'class' => 'form-control',
    'placeholder' => null,
    'model' => null,
    'name' => null,
    'id' => null,
    'value' => null,
    'require' => true,
    ])

<div>
    @if($label)
        <label for="{{ $id ?: $name }}" class="form-label">
            {{ $label }} {!! $require ? '<span class="text-danger">*</span>' : '' !!}
        </label>
    @endif

    <input
            type="{{ $type ?: 'text' }}"
            class="{{ $class }} @error($model) is-invalid @enderror"
            placeholder="{{ __(':placeholder', ['placeholder' => $placeholder]) ?: __('') }}"
            wire:model="{{ $model ?: '' }}"
            value="{{ $value ?: '' }}"
            name="{{ $name ?: '' }}"
            id="{{ $id ?: '' }}"
            {{ $attributes }}>

    {{ $slot }}

    @error($model)
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>