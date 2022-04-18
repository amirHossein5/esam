@extends('customer.auth.layouts.master')

@section('content')
    <section class="pb-5 vh-100 d-flex justify-content-center align-items-center">
        <form action="{{ route('customer.auth.loginRegister') }}" method="post">
            @csrf

            <section class="mb-5 login-wrapper">
                <section class="mb-5 d-flex justify-content-center">
                    <img src="{{ asset('app-assets/images/mdLogo.webp') }}" alt="">
                </section>
                <section class="login-title">ورود / ثبت نام</section>
                <section class="login-info">   پست الکترونیک خود را وارد کنید</section>
                <section class="login-input-text">
                    <input type="text" value="{{ old('id') }}" name="id" class="px-2 py-1 border">

                    @error('id')
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
