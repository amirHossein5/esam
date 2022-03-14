@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش ادمین</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">ادمین ها</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش ادمین</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویرایش کاربر ادمین
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.user.admin-user.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.user.admin-user.update', $admin->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <section class="row">

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="first_name">نام</label>
                                    <input type="text" name="first_name" id="first_name"
                                        class="form-control form-control-sm" value="{{ old('first_name', $admin->first_name) }}">

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
                                        value="{{ old('last_name', $admin->last_name) }}">

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
                                        value="{{ old('email', $admin->email) }}">

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
                                        value="{{ old('mobile', $admin->mobile) }}">

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
                                @if ($admin->profile_photo_path)
                                    <img src="{{ asset($admin->profile_photo_path) }}" width="50" height="50" alt="">
                                @endif
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="role">نقش  @if ($hasCustomRole) (شخصی سازی شده) @endif</label>

                                    <select name="role" id="role" class="form-control form-control-sm">
                                        <option value="">-</option>
                                        @foreach ($roles as $role)
                                            <option
                                                value="{{ $role->id }}"
                                                @if(old('role', optional($admin->role)->id) == $role->id)
                                                    selected
                                                @endif
                                            >
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('role')
                                        <span class="text-danger mt-2">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
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
