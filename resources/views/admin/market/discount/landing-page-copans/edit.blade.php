@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش کپن های تخفیف صفحه اصلی</title>
    <link href="{{ asset('admin-assets/persian-date-picker/persian-datepicker.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin-assets/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin-assets/select2/css/select2.modification.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">برند</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش کپن های تخفیف صفحه اصلی</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویرایش کپن های تخفیف صفحه اصلی
                    </h5>
                </section>

                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.market.discount.landingPageCopans.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.market.discount.landingPageCopans.update', $landingPageCopan->id) }}" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <section class="row">

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="image">گیف یا عکس </label>
                                    <input type="file" id="image" name="image" class="form-control form-control-sm">

                                    <div class="m-1">
                                        <img src="{{ asset($landingPageCopan->image) }}" height="20" alt="">
                                    </div>

                                    @error('image')
                                        <div class="my-1 font-weight-bold text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="copan_id">کپن</label>

                                    <input type="hidden" name="copan_id" id="copan_id" value="{{ old('copan_id', $landingPageCopan->copan_id) }}">

                                    <select id="select2" class="form-control form-control-sm copan_id_selection">
                                        <option value="">ــ کپن تخفیف ــ</option>

                                        @foreach ($copans as $copan)
                                            <option
                                                value="{{ $copan->id }}"
                                                @if($copan->id == old('copan_id', $landingPageCopan->copan_id)) selected @endif
                                            >
                                                {{ $copan->code }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('copan_id')
                                        <span class="my-1 text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="start_date">تاریخ شروع</label>

                                    <input type="text" id="start-date-view-datepicker"
                                        class="form-control direction-ltr form-control-sm">
                                    <input type="text" class="d-none" id="start-date-main-datepicker"
                                        name="start_date" value="{{ old('start_date', $landingPageCopan->start_date) }}">

                                    @error('start_date')
                                        <span class="my-1 text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="end_date">تاریخ پایان</label>

                                    <input type="text" id="end-date-view-datepicker"
                                        class="form-control direction-ltr form-control-sm">
                                    <input type="text" class="d-none" id="end-date-main-datepicker"
                                        name="end_date" value="{{ old('end_date', $landingPageCopan->end_date) }}">


                                    @error('end_date')
                                        <span class="my-1 text-danger">
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
    <script src="{{ asset('admin-assets/select2/js/select2.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            var dp = $("#start-date-view-datepicker").pDatepicker(datePickerOptions('#start-date-main-datepicker'));
            var time = null;
            var mainDatePickerValue = $("#start-date-main-datepicker").attr("value");

            if (mainDatePickerValue) {
                if (mainDatePickerValue.split("-").length !== 1) {
                    time = Date.parse(mainDatePickerValue);
                } else {
                    time = parseInt(mainDatePickerValue);
                }
            }

            dp.setDate(time);
        });
    </script>

    <script>
        $(document).ready(function() {
            var dp = $("#end-date-view-datepicker").pDatepicker(datePickerOptions('#end-date-main-datepicker'));
            var time = null;
            var mainDatePickerValue = $("#end-date-main-datepicker").attr("value");

            if (mainDatePickerValue) {
                if (mainDatePickerValue.split("-").length !== 1) {
                    time = Date.parse(mainDatePickerValue);
                } else {
                    time = parseInt(mainDatePickerValue);
                }
            }

            dp.setDate(time);
        });
    </script>

    <script>
        $(function () {
            var data = $('#copan_id').val() ? $('#copan_id').val() : null;

            $('#select2').select2();

            // $(`#select2 option`).attr('selected', true).trigger('change');

            $('form').submit(function (e) {
                $('#copan_id').val($('#select2').val());
            })
        })
    </script>
@endsection
