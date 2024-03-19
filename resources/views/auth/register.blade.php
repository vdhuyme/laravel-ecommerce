@extends('auth.layouts.app')
@section('content')
    <div class="text-center mt-2">
        <h5 class="text-primary">{{ __('Đăng kí') }}</h5>
    </div>
    <div class="p-2">
        <x-form method="POST" action="{{ route('register') }}">
            <div class="mb-3">
                <x-admin.input
                        name="name"
                        id="name"
                        model="name"
                        placeholder="Nhập địa tên của bạn"
                        label="Họ và tên" />
            </div>

            <div class="mb-3">
                <x-admin.input
                        name="phone_number"
                        id="phone_number"
                        model="phone_number"
                        placeholder="Nhập địa số điện thoại"
                        label="Số điện thoại" />
            </div>

            <div class="mb-3">
                <x-admin.input
                        name="email"
                        id="email"
                        model="email"
                        placeholder="Nhập địa chỉ email"
                        label="Email" />
            </div>

            <div class="mb-3">
                <x-admin.input
                        name="password"
                        id="password"
                        model="password"
                        type="password"
                        placeholder="Nhập mật khẩu"
                        label="Mật khẩu" />
            </div>

            <div class="mb-3">
                <x-admin.input
                        name="password_confirmation"
                        id="password_confirmation"
                        model="password_confirmation"
                        type="password"
                        placeholder="Nhập lại mật khẩu"
                        label="Xác nhận mật khẩu" />
            </div>

            <x-admin.button
                    class="btn btn-primary w-100"
                    type="submit">{{ __('Đăng nhập') }}
            </x-admin.button>
        </x-form>

        <div class="my-3 text-center">
            <div class="signin-other-title">
                <h5 class="fs-13 title">{{ __('Có tài khoản') }}</h5>
            </div>
            <a href="{{ route('login') }}"> {{ __('Đăng nhập tại đây') }}</a>
        </div>

        <div class="text-center">
            <a href="{{ route('socialite.redirect', ['provider' => 'google']) }}" class="btn btn-danger btn-icon waves-effect waves-light"><i class="ri-google-fill fs-16"></i></a>
            <a href="{{ route('socialite.redirect', ['provider' => 'facebook']) }}" class="btn btn-primary btn-icon waves-effect waves-light"><i class="ri-facebook-fill fs-16"></i></a>
        </div>
    </div>
@endsection