@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش مشتری</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">مشتری ها</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش مشتری</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویرایش مشتری
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.user.customer.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.user.customer.update', $customer->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <section class="row">

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="first_name">نام</label>
                                    <input type="text" name="first_name" id="first_name"
                                        class="form-control form-control-sm" value="{{ old('first_name', $customer->first_name) }}">

                                    @error('first_name')
                                        <span class="text-danger mt-2">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="last_name">نام خانوادگی</label>
                                    <input type="text" name="last_name" id="last_name" class="form-control form-control-sm"
                                        value="{{ old('last_name', $customer->last_name) }}">

                                    @error('last_name')
                                        <span class="text-danger mt-2">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="email">ایمیل</label>
                                    <input type="email" name="email" id="email" class="form-control form-control-sm"
                                        value="{{ old('email', $customer->email) }}">

                                    @error('email')
                                        <span class="text-danger mt-2">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="mobile"> شماره موبایل</label>
                                    <input type="tel" name="mobile" id="mobile" class="form-control form-control-sm"
                                        value="{{ old('mobile', $customer->mobile) }}">

                                    @error('mobile')
                                        <span class="text-danger mt-2">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="profile_photo_path">تصویر</label>
                                    <input type="file" name="profile_photo_path" id="profile_photo_path"
                                        class="form-control form-control-sm">

                                    @error('profile_photo_path')
                                        <span class="text-danger mt-2">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </section>

                            <section class="col-12 col-md-6">
                                @if ($customer->profile_photo_path)
                                    <img src="{{ asset($customer->profile_photo_path) }}" width="50" height="50" alt="">
                                @endif
                            </section>

                            <section class="col-12">
                                <button class="btn btn-primary btn-sm">ثبت</button>
                            </section>
                        </section>
                    </form>
                </section>

            </section>
        </section>
    </section>

@endsection
