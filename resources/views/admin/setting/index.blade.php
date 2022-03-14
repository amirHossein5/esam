@extends('admin.layouts.master')

@section('head-tag')
    <title>تنظیمات</title>
    <link href="{{ asset('admin-assets/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin-assets/select2/css/select2.modification.css') }}" rel="stylesheet" />
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> تنظیمات</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="my-4 main-body-container-header">
                    <h5>
                        تنظیمات
                    </h5>
                </section>

                <section class="container">
                    <form action="{{ route('admin.setting.update') }}" id="form" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="title">عنوان سایت</label>
                                    <input id="title" class="form-control form-control-sm" type="text"
                                        value="{{ old('title', $setting->title) }}" name="title">

                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="phone_number">شماره تلفن</label>
                                    <input id="phone_number" class="form-control form-control-sm" type="text"
                                        value="{{ old('phone_number', $setting->phone_number) }}" name="phone_number">

                                    @error('phone_number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="available_hours">ساعت های کاری</label>
                                    <input id="available_hours" class="form-control form-control-sm" type="text"
                                        value="{{ old('available_hours', $setting->available_hours) }}" name="available_hours">

                                    @error('available_hours')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="keywords">کلمات کلیدی سایت</label>
                                    <input id="keywords" type="hidden"
                                        value="{{ old('keywords', $setting->keywords) }}" name="keywords">

                                    <select id="select2" class="form-control" multiple></select>
                                    @error('keywords')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    @if ($setting->logo)
                                        <div class="my-2">
                                            <img src="{{ asset($setting->logo) }}" alt="" width="50">
                                        </div>
                                    @endif
                                    <label for="logo">لوگو سایت</label>
                                    <input id="logo" class="form-control form-control-sm" type="file" name="logo">

                                    @error('logo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    @if ($setting->icon)
                                        <div class="my-2">
                                            <img src="{{ asset($setting->icon) }}" alt="" width="50">
                                        </div>
                                    @endif
                                    <label for="icon">آیکون سایت</label>
                                    <input id="icon" class="form-control form-control-sm" type="file" name="icon">

                                    @error('icon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </section>

                            <section class="my-4 col-12">
                                <div class="form-group">
                                    <label for="title">توضیحات سایت</label>
                                    <textarea type="text" id="description" class="form-control"
                                        name="description">{{ old('description', $setting->description) }}</textarea>
                                </div>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </section>

                            <section class="col-12">
                                <button type="submit" class="btn btn-info btn-sm">ویرایش</button>
                            </section>
                        </section>
                    </form>
                </section>

            </section>
        </section>
    </section>

@endsection

@section('script')
    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('admin-assets/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('admin-assets/select2/js/select2-tags-in-form.js') }}"></script>

    <script>
        CKEDITOR.replace('description')
        select2TagsInForm('#select2', '#keywords');
    </script>
@endsection
