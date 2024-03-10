@props([
    'method' => '',
    'class' => '',
])

<div class="d-inline {{ $class }}"
     x-data="{ confirmDelete:false }">
    <span
            style="cursor: pointer"
            x-show="!confirmDelete"
            x-on:click="confirmDelete=true"
            class="badge badge-soft-danger">{{ __('Xóa') }}</span>

    <span
            style="cursor: pointer"
            x-show="confirmDelete"
            x-on:click="confirmDelete=false"
            wire:click="{{ $method }}"
            class="badge badge-soft-danger">{{ __('Xác nhận') }}</span>

    <span
            style="cursor: pointer"
            x-show="confirmDelete"
            x-on:click="confirmDelete=false"
            class="badge badge-soft-info">{{ __('Hủy') }}</span>
</div>