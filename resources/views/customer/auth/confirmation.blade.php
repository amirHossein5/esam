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
                    <a href="{{ route('customer.auth.resendCode', $otp->token) }}" disabled class="btn btn-sm btn-warning d-none" id="timer">ارسال مجدد کد</a>
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

@section('scripts')

    <script>
        function startTimer(duration, display, endText, url) {
            var timer = duration, minutes, seconds;
            var interval = setInterval(function () {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                $(display).removeClass('d-none');
                $(display).addClass('bg-secondary').addClass('text-white');
                display.href = '#'
                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    display.textContent = endText;
                    $(display).removeClass('bg-secondary').removeClass('text-white');
                    display.href = url
                    clearInterval(interval)
                }
            }, 1000);
        }

        window.onload = function () {
            var durationPerSecond = {{ $otp->updated_at->addMinutes(2)->timestamp - now()->timestamp }},
                display = document.querySelector('#timer');
            var endText = $(display).text();
            var url = display.href;

            if (durationPerSecond > 0) {
                startTimer(durationPerSecond, display, endText, url);
            }
        };
    </script>

@endsection
