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
    <link href="{{ asset('assets/admin/libs/filepond/filepond.min.css') }}" rel="stylesheet"  type="text/css"/>
    <link href="{{ asset('assets/admin/libs/filepond/filepond-plugin-image-preview.min.css') }}" rel="stylesheet"  type="text/css"/>
    <link href="{{ asset('assets/admin/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('assets/admin/libs/tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/layout.js') }}"></script>
    @livewireStyles
</head>

<body>
<div id="layout-wrapper">
    <x-admin.top-sidebar />
    <x-admin.left-sidebar />

    <div class="vertical-overlay"></div>

    <div class="main-content">
        {{ $slot }}
    </div>
</div>

<button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
    <i class="ri-arrow-up-line"></i>
</button>

<x-livewire-alert::scripts />
<script src="{{ asset('assets/admin/js/sweetalert2@11.js') }}"></script>
<script src="{{ asset('assets/admin/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/app.js') }}"></script>
<script src="{{ asset('assets/admin/libs/filepond/filepond.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/filepond/filepond-plugin-file-validate-size.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/filepond/filepond-plugin-image-preview.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/flatpickr/flatpickr.js') }}"></script>
<script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/apexcharts.js') }}"></script>
@stack('scripts')
@livewireScripts
</body>

</html>