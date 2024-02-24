@extends('auth.layouts.app')
@section('content')
    <div class="text-center mt-2">
        <h5 class="text-primary">{{ __('Đặt lại mật khẩu') }}</h5>
    </div>
    <div class="p-2">
        <x-form action="{{ route('password.update') }}" method="POST">
            <input
                    type="hidden"
                    name="token"
                    value="{{ $token }}" />

            <div class="mb-3">
                <x-admin.input
                        name="email"
                        id="email"
                        model="email"
                        placeholder="Nhập địa chỉ email"
                        label="Email"
                        value="{{ $email }}"
                        readonly />
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
                    type="submit">{{ __('Xác nhận') }}
            </x-admin.button>
        </x-form>
    </div>
@endsection