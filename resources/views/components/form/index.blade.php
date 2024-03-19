@props([
    'id' => null,
    'name' => null,
    'isFormData' => false,
    ])

<form
        id="{{ $id ?: '' }}"
        {{ $isFormData ?: 'enctype="multipart/form-data"' }}
        {{ $attributes }}>
    @csrf

    {{ $slot }}
</form>
