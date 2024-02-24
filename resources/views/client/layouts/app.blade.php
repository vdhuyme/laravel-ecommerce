<!doctype html>
<html lang="en">

<head>
    <title>{{ config('app.name') ?? __('Thương mại điện tử') }}</title>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('assets/client/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/font.awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/nice-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/style.css') }}">
    @livewireStyles
</head>

<body>
    <div class="home-wrapper home-2">
        @include('client.layouts.header')

        @yield('content')

        @include('client.layouts.footer')
    </div>

    <a class="scroll-to-top" href="#">
        <i class="ion-chevron-up"></i>
    </a>

    <script src="{{ asset('assets/client/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/modernizr-2.8.3.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/main.js') }}"></script>
    @livewireScripts
</body>

</html>