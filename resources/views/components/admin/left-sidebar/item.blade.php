@props(['route' => '', 'icon' => '', 'name' => ''])

<li class="nav-item">
    <x-link
            :to="$route"
            class="nav-link menu-link">
        <i class="{{ $icon }}"></i> <span>{{ __(':name', ['name' => $name]) }}</span>
    </x-link>
</li>