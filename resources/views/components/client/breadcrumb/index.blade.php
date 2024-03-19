@props([
    'breadcrumbs' => [],
])

<div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                @foreach($breadcrumbs as $breadcrumb)
                    <li>
                        @if($breadcrumb['url'])
                            <x-link
                                    :to="route($breadcrumb['url'])">{{ $breadcrumb['label'] }}</x-link>
                        @else
                            <span>{{ $breadcrumb['label'] }}</span>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
