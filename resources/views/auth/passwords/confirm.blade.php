@extends('auth.layouts.app')
@section('content')
    <div class="text-center mt-2">
        <h5 class="text-primary">{{ __('Xác nhận lại mật khẩu') }}</h5>
    </div>
    <div class="p-2">
        <x-form method="POST" action="{{ route('password.confirm') }}">
            <div class="mb-3">
                <x-admin.input
                        name="password"
                        id="password"
                        model="password"
                        type="password"
                        placeholder="Nhập mật khẩu"
                        label="Mật khẩu" />
            </div>

            <x-admin.button
                    class="btn btn-primary w-100"
                    type="submit">{{ __('Tiếp tục') }}
            </x-admin.button>
        </x-form>
    </div>
@endsection