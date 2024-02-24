@extends('auth.layouts.app')
@section('content')
    <div class="text-center mt-2">
        <h5 class="text-primary">{{ __('Đăng nhập') }}</h5>
    </div>
    <div class="p-2">
        <x-form method="POST" action="{{ route('login') }}">
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
                <x-admin.input.checkbox
                        model="remember"
                        name="remember"
                        id="remember">{{ __('Ghi nhớ đăng nhập') }}</x-admin.input.checkbox>
            </div>

            <x-admin.button
                    class="btn btn-primary w-100"
                    type="submit">{{ __('Đăng nhập') }}
            </x-admin.button>
        </x-form>

        <div class="my-3 text-center">
            <div class="signin-other-title">
                <h5 class="fs-13 title">{{ __('Bạn chưa có tài khoản') }}</h5>
            </div>
            <a href="{{ route('register') }}"> {{ __('Đăng kí ngay') }}</a>
        </div>

        <div class="text-center">
            <a href="{{ route('socialite.redirect', ['provider' => 'google']) }}" class="btn btn-danger btn-icon waves-effect waves-light"><i class="ri-google-fill fs-16"></i></a>
            <a href="{{ route('socialite.redirect', ['provider' => 'facebook']) }}" class="btn btn-primary btn-icon waves-effect waves-light"><i class="ri-facebook-fill fs-16"></i></a>
        </div>
    </div>
@endsection