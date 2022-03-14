@extends('admin.layouts.master')

@section('head-tag')
    <title> ایجاد روش ارسال</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">روش های ارسال</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد روش ارسال</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد روش ارسال
                    </h5>
                </section>

                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.market.delivery.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.market.delivery.store') }}" method="post">
                        @csrf
                        <section class="row">

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="name">نام روش ارسال</label>
                                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                                        class="form-control form-control-sm">

                                    @error('name')

                                        <div class="my-2 text-danger">
                                            {{ $message }}
                                        </div>

                                    @enderror
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="amount">هزینه روش ارسال (تومان) </label>
                                    <input type="text" id="amount" name="amount" value="{{ old('amount') }}"
                                        class="form-control form-control-sm">

                                    @error('amount')

                                        <div class="my-2 text-danger">
                                            {{ $message }}
                                        </div>

                                    @enderror
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="delivery_time">زمان ارسال</label>
                                    <input type="text" id="delivery_time" name="delivery_time"
                                        value="{{ old('delivery_time') }}" class="form-control form-control-sm">


                                    @error('delivery_time')

                                        <div class="my-2 text-danger">
                                            {{ $message }}
                                        </div>

                                    @enderror
                                </div>
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="delivery_time_unit">واحد زمان ارسال </label>
                                    <input type="text" id="delivery_time_unit" value="{{ old('delivery_time_unit') }}"
                                        name="delivery_time_unit" class="form-control form-control-sm" placeholder="روز">


                                    @error('delivery_time_unit')

                                        <div class="my-2 text-danger">
                                            {{ $message }}
                                        </div>

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
