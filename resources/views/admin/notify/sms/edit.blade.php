@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش اطلاعیه پیامکی</title>
    <link href="{{ asset('admin-assets/persian-date-picker/persian-datepicker.min.css') }}" rel="stylesheet" />
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">اطلاع رسانی</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">اطلاعیه پیامکی</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش اطلاعیه پیامکی</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویرایش اطلاعیه پیامکی
                    </h5>
                </section>

                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.notify.sms.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.notify.sms.update', $sms->id) }}" method="post">
                        @csrf
                        @method('put')
                        <section class="row">

                            <section class="col-12">
                                <div class="form-group">
                                    <label for="title">عنوان پیامک</label>
                                    <input
                                        type="text"
                                        name="title"
                                        id="title"
                                        value="{{ old('title', $sms->title) }}"
                                        class="form-control form-control-sm"
                                    >

                                    @error('title')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </section>


                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="view-date-picker"> تاریخ انتشار</label>
                                    <input
                                        id="main-date-picker"
                                        name="send_at"
                                        type="hidden"
                                        value="{{ old('send_at', $sms->send_at) }}"
                                    >

                                    <input
                                        id="view-date-picker"
                                        type="text"
                                        class="form-control direction-ltr form-control-sm"
                                    >

                                    @error('send_at')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="status">وضعیت</label>
                                    <select name="status" id="status" class="form-control form-control-sm">
                                        <option
                                            value="1"
                                            @if(old('status', $sms->status) == '1') selected @endif
                                        >
                                            فعال
                                        </option>
                                        <option
                                            value="0"
                                            @if(old('status', $sms->status) == '0') selected @endif
                                        >
                                            غیرفعال
                                        </option>
                                    </select>

                                    @error('status')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </section>

                            <section class="col-12">
                                <div class="form-group">
                                    <label for="body">متن پیامک</label>
                                    <textarea
                                        name="body"
                                        id="body"
                                        class="form-control form-control-sm"
                                        rows="6"
                                    >{{ old('body', $sms->body) }}</textarea>


                                    @error('body')
                                        <span class="text-danger">
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


@section('script')
    <script src="{{ asset('admin-assets/persian-date-picker/date-picker-options.js') }}"></script>
    <script src="{{ asset('admin-assets/persian-date-picker/persian-date.min.js') }}"></script>
    <script src="{{ asset('admin-assets/persian-date-picker/persian-datepicker.min.js') }}"></script>
    <script src="{{ asset('admin-assets/persian-date-picker/date-picker-old-setter.js') }}"></script>

    <script>
        $(document).ready(function () {
            var dp = $("#view-date-picker").pDatepicker(datePickerOptions());
            datePickerOldSetter(dp);
        });
    </script>
@endsection
