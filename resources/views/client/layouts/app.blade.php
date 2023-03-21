<!doctype html>
<html class="no-js" lang="en">

<head>
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('metaTitle', 'Vie Fruits')</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="@yield('metaDes')">
    <meta name="keywords" content="@yield('metaKey')">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="client/assets/images/favicon.ico">

    @include('client.layouts.css')
</head>

<body>

    <div class="home-wrapper home-2">
        <!-- Header Area Start Here -->
        @include('client.layouts.header')
        <!-- Header Area End Here -->

        @yield('content')

        @include('client.layouts.footer')
    </div>

    <!-- Scroll to Top Start -->
    <a class="scroll-to-top" href="#">
        <i class="ion-chevron-up"></i>
    </a>
    <!-- Scroll to Top End -->

    @include('client.layouts.javascript')

</body>

</html>