@extends('admin.layouts.master')

@section('head-tag')
    <title>رنگ ها</title>
    <link href="{{ asset('admin-assets/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin-assets/select2/css/select2.modification.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">رنگ ها</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد رنگ </li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد رنگ
                    </h5>
                </section>

                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.market.colors.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.market.colors.store') }}" id="form" method="post">
                        @csrf
                        <section class="row">

                            <section class="my-2 col-12 col-md-6">
                                <div class="m-1 form-group">
                                    <div>
                                        <label for="name">نام رنگ</label>
                                        <input type="text" id="name" class="form-control form-control-sm" name="name"
                                            value="{{ old('name') }}">
                                    </div>
                                    @error('name')
                                        <div class="mt-1">
                                            <span class="text-danger font-weight-bold">
                                                {{ $message }}
                                            </span>
                                        </div>
                                    @enderror
                                </div>
                            </section>

                            <section class="my-2 col-12 col-md-6">
                                <div class="m-1 form-group">
                                    <div>
                                        <label for="background"> رنگ</label>
                                        <input type="color" id="background" class="form-control form-control-sm" name="background"
                                            value="{{ old('background') }}">
                                    </div>
                                    @error('background')
                                        <div class="mt-1">
                                            <span class="text-danger font-weight-bold">
                                                {{ $message }}
                                            </span>
                                        </div>
                                    @enderror
                                </div>
                            </section>



                            <section class="mt-3 col-12">
                                <button class="btn btn-primary btn-sm">ثبت</button>
                            </section>
                        </section>
                    </form>
                </section>

            </section>
        </section>
    </section>
@endsection
