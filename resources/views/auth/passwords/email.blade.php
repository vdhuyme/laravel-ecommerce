@extends('auth.layouts.app')
@section('content')
    <div class="text-center mt-2">
        <h5 class="text-primary">{{ __('Quên mật khẩu') }}</h5>
    </div>
    <div class="p-2">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <x-form action="{{ route('password.email') }}" method="POST">
            <div class="mb-3">
                <x-admin.input
                        name="email"
                        id="email"
                        model="email"
                        placeholder="Nhập địa chỉ email"
                        label="Email" />
            </div>

            <x-admin.button
                    class="btn btn-primary w-100"
                    type="submit">{{ __('Gửi email khôi phục mật khẩu') }}
            </x-admin.button>
        </x-form>
    </div>
@endsection