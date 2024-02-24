@props([
    'method' => ''
])

<div class="d-inline" x-data="{ confirmDelete:false }">
    <span x-show="!confirmDelete" x-on:click="confirmDelete=true" class="badge badge-soft-danger">{{ __('Xóa') }}</span>

    <span x-show="confirmDelete" x-on:click="confirmDelete=false" wire:click="{{ $method }}" class="badge badge-soft-danger">{{ __('Xác nhận') }}</span>

    <span x-show="confirmDelete" x-on:click="confirmDelete=false" class="badge badge-soft-info">{{ __('Hủy') }}</span>
</div>