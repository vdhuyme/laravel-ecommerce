@extends('auth.layouts.app')
@section('content')
    <div class="text-center mt-2">
        <h5 class="text-primary">{{ __('Xác thực tài khoản') }}</h5>
        <p>{{ __('Nếu bạn không nhận được email') }}</p>
    </div>
    <div class="p-2">
        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('Vui lòng kiểm tra email.') }}
            </div>
        @endif

        <x-form method="POST" action="{{ route('verification.resend') }}">
            <x-admin.button
                    class="btn btn-primary w-100"
                    type="submit">{{ __('Gửi yêu cầu mới') }}
            </x-admin.button>
        </x-form>
    </div>
@endsection