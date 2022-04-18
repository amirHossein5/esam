@extends('customer.auth.layouts.master')

@section('content')
    <section class="pb-5 vh-100 d-flex justify-content-center align-items-center">
        <form action="{{ route('customer.auth.confirmation', $otp->token) }}" method="post">
            @csrf

            <section class="mb-5 login-wrapper">
                <section class="mb-5 d-flex justify-content-center">
                    <img src="{{ asset('app-assets/images/mdLogo.webp') }}" alt="">
                </section>
                <section class="login-title">
                    <a href="{{ route('customer.auth.loginRegisterForm') }}" class="btn btn-sm btn-success">برگشت</a>
                    <a href="{{ route('customer.auth.resendCode', $otp->token) }}" class="btn btn-sm btn-warning">ارسال مجدد کد</a>
                </section>
                <section class="login-info">   کد ارسال شده به ایمیل را وارد کنید.</section>
                <section class="login-input-text">
                    <input type="text" value="{{ old('code') }}" name="code" class="px-2 py-1 border">


                    @if (session('sent'))
                        <div class="my-1 text-success" style="font-size: 0.8rem; font-weight: bold">
                            {{ session('sent') }}
                        </div>
                    @endif

                    @error('code')
                        <div class="my-1 text-danger" style="font-size: 0.8rem; font-weight: bold">
                            {{ $message }}
                        </div>
                    @enderror
                </section>


                <section class="login-btn d-grid g-2">
                    <button class="btn btn-danger">ورود به ایسام</button>
                </section>
            </section>

        </form>
    </section>
@endsection
