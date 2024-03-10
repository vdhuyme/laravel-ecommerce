<!doctype html>
<html lang="en">

<head>
    <title>{{ config('app.name') ?? __('Thương mại điện tử') }}</title>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('assets/client/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/style.css') }}">
    @livewireStyles
</head>

<body>
    <x-client.header />

    {{ $slot }}

    <x-client.footer />

    <x-livewire-alert::scripts />
    <script src="{{ asset('assets/admin/js/sweetalert2@11.js') }}"></script>
    <script src="{{ asset('assets/client/js/vendor/modernizr-3.11.7.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/vendor/jquery-v3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/vendor/jquery-migrate-v3.3.2.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/client/js/main.js') }}"></script>
    @stack('scripts')
    @livewireScripts
</body>

</html>