@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد کپن تخفیف</title>
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
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد کپن تخفیف</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد کپن تخفیف
                    </h5>
                </section>

                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.market.discount.copan.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.market.discount.copan.update', $copan->id) }}" method="post">
                        @method('put')
                        @csrf
                        <section class="row">

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="code">کد کوپن</label>
                                    <input type="text" id="code" name="code" value="{{ old('code', $copan->code) }}"
                                        class="form-control form-control-sm">

                                    @error('code')
                                        <span class="my-1 text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="amount">میزان تخفیف</label>
                                    <input type="text" id="amount" name="amount" value="{{ old('amount', $copan->amount) }}"
                                        class="form-control form-control-sm">

                                    @error('amount')
                                        <span class="my-1 text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="amount_type">نوع قیمت</label>

                                    <select name="amount_type" id="amount_type" class="form-control form-control-sm">
                                        <option value="{{ App\Models\Market\Copan::PERCENTAGE }}"
                                            @if(old('amount_type', $copan->amount_type) == App\Models\Market\Copan::PERCENTAGE) selected @endif
                                        >
                                            درصدی
                                        </option>
                                        <option value="{{ App\Models\Market\Copan::PRICEUNIT }}"
                                            @if(old('amount_type', $copan->amount_type) == App\Models\Market\Copan::PRICEUNIT) selected @endif
                                        >
                                            تومان
                                        </option>
                                    </select>

                                    @error('amount_type')
                                        <span class="my-1 text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="discount_ceiling">حداکثر تخفیف</label>
                                    <input type="text" id="discount_ceiling" name="discount_ceiling"
                                        value="{{ old('discount_ceiling', $copan->discount_ceiling) }}" class="form-control form-control-sm">

                                    @error('discount_ceiling')
                                        <span class="my-1 text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="type">نوع تخفیف</label>

                                    <select name="type" id="type" id="type" class="form-control form-control-sm">
                                        <option value="{{ App\Models\Market\Copan::PUBLIC }}"
                                            @if (old('type', $copan->type) == App\Models\Market\Copan::PUBLIC) selected @endif
                                        >
                                            عمومی
                                        </option>
                                        <option value="{{ App\Models\Market\Copan::PRIVATE }}"
                                            @if (old('type', $copan->type) == App\Models\Market\Copan::PRIVATE) selected @endif
                                        >
                                            خصوصی (فقط کاربر انتخاب شده می تواند استفاده کند)
                                         </option>
                                    </select>

                                    @error('type')
                                        <span class="my-1 text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="user_id">کاربر</label>

                                    <input type="hidden" name="user_id" id="user_id" value="{{ old('user_id') }}">

                                    <select id="select2" class="form-control form-control-sm user_id_selection">
                                        <option value="">ــ کاربر ــ</option>

                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}" @if($user->id == old('user_id', $copan->user_id)) selected @endif>{{ $user->first_name . '' . $user->last_name }}</option>
                                        @endforeach
                                    </select>

                                    @error('user_id')
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
                                        name="start_date" value="{{ old('start_date', $copan->start_date) }}">

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
                                        name="end_date" value="{{ old('end_date', $copan->end_date) }}">


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
            var data = $('#user_id').val() ? $('#user_id').val() : null;

            $('#select2').select2();

            // $(`#select2 option`).attr('selected', true).trigger('change');

            $('form').submit(function (e) {
                $('#user_id').val($('#select2').val());
            })
        })
    </script>

    <script>
        $(function () {
            copanTypeChanged();

            $('select#type').on('change', function() {
                copanTypeChanged();
            });

            function copanTypeChanged() {
                if ($('select#type').val() === "{{ App\Models\Market\Copan::PUBLIC }}") {
                    $('select.user_id_selection').prop('disabled', true);
                } else {
                    $('select.user_id_selection').prop('disabled', false);
                }
            }
        });
    </script>

    <script>
        $(function () {
            amountTypeChanged();

            $('select#amount_type').on('change', function() {
                amountTypeChanged();
            });

            function amountTypeChanged() {
                if ($('select#amount_type').val() === "{{ App\Models\Market\Copan::PRICEUNIT }}") {
                    $('input[name=discount_ceiling]').prop('disabled', true);
                } else {
                    $('input[name=discount_ceiling]').prop('disabled', false);
                }
            }
        });
    </script>
@endsection
