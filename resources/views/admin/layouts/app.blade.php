<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('admin.layouts.css')
</head>

<body>
    <div id="layout-wrapper">

        @include('admin.layouts.topbar')

        @include('admin.layouts.left-sidebar')

        <div class="vertical-overlay"></div>

        <div class="main-content">

            @yield('content')

        </div>
    </div>

    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>

    @include('admin.layouts.javascript')
</body>

</html>