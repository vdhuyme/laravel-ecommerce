<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
      data-sidebar-image="none" data-preloader="disable">

<head>
    <title>{{ config('app.name') ?? __('Trang quản trị') }}</title>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" href="{{ asset('assets/admin/images/favicon.ico') }}">
    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/admin/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/admin/css/app.min.css') }}" rel="stylesheet" type="text/css"/>
    <script src="{{ asset('assets/admin/js/layout.js') }}"></script>
</head>

<body>
<div class="auth-page-wrapper pt-5">
    <div class="auth-page-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4">
                        <div class="card-body p-4">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/admin/js/app.js') }}"></script>
<script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
</body>

</html>