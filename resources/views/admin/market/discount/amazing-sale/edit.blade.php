@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد تخفیف شگفت انگیز</title>
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
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد تخفیف شگفت انگیز</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد تخفیف شگفت انگیز
                    </h5>
                </section>

                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.market.discount.amazingSale.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.market.discount.amazingSale.update', $amazingSale->id) }}" method="post">
                        @method('put')
                        @csrf
                        <section class="row">

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="product_id">محصول</label>

                                    <input type="hidden" name="product_id" id="product_id" value="{{ old('product_id') }}">

                                    <select id="select2" class="form-control form-control-sm">
                                        <option value="">__محصول__</option>

                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}" @if($product->id == old('product_id', $amazingSale->product_id)) selected @endif>{{ $product->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('product_id')
                                        <span class="my-1 text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="percentage">درصد تخفیف</label>
                                    <input type="text" id="percentage" name="percentage" value="{{ old('percentage', $amazingSale->percentage) }}"
                                        class="form-control form-control-sm">

                                    @error('percentage')
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
                                        name="start_date" value="{{ old('start_date', $amazingSale->start_date) }}">

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
                                        name="end_date" value="{{ old('end_date', $amazingSale->end_date) }}">


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
    <script src="{{ asset('admin-assets/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('admin-assets/persian-date-picker/date-picker-options.js') }}"></script>
    <script src="{{ asset('admin-assets/persian-date-picker/persian-date.min.js') }}"></script>
    <script src="{{ asset('admin-assets/persian-date-picker/persian-datepicker.min.js') }}"></script>

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
            var data = $('#product_id').val() ? $('#product_id').val() : null;

            $('#select2').select2();

            $('form').submit(function (e) {
                $('#product_id').val($('#select2').val());
            })
        })
    </script>
@endsection
