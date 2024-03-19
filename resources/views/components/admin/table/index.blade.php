@props([
    'headers' => [],
    'type' => '',
    'data' => [],
])

<div class="table-responsive">
    <table {{ $attributes->merge(['class' => 'table ' . $type]) }}>
        <thead>
        <tr>
            @foreach($headers as $key => $item)
                <th scope="col" id="{{ $key }}">{{ $item }}</th>
            @endforeach
        </tr>
        </thead>
        {{ $slot }}
    </table>
</div>

