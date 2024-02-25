@props([
    'label' => null,
    'options' => [],
    'name' => '',
    'model' => '',
    'require' => true,
])

<div>
    @if($label)
        <label for="{{ $name }}" class="form-label">
            {{ $label }} {!! $require ? '<span class="text-danger">*</span>' : '' !!}
        </label>
    @endif

    <select
            wire:model="{{ $model ?: '' }}"
            class="form-select"
            {{ $attributes }}>
        <option>{{ __('----------') }}</option>
        @foreach($options as $value => $optionLabel)
            <option value="{{ $value }}">{{ __($optionLabel) }}</option>
        @endforeach
    </select>

    @error($model)
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>