@extends('admin.layouts.master')

@section('head-tag')
    <title> اصلاح انبار</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">انبار</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page">   اصلاح انبار</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                         اصلاح انبار
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.market.store.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.market.store.update', $product->id) }}" method="post">
                        @csrf @method('put')
                        <section class="row">

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="sold_number">تعداد فروخته شده</label>
                                    <input type="number" id="sold_number" name="sold_number" class="form-control form-control-sm" value="{{ old('sold_number', $product->sold_number) }}">

                                    @error('sold_number')
                                        <div class="my-2 text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="marketable_number">تعداد قابل فروش</label>
                                    <input type="number" id="marketable_number" name="marketable_number" class="form-control form-control-sm" value="{{ old('marketable_number',$product->marketable_number) }}">

                                    @error('marketable_number')
                                        <div class="my-2 text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="frozen_number">تعداد رزرو شده</label>
                                    <input type="number" id="frozen_number" name="frozen_number" class="form-control form-control-sm" value="{{ old('frozen_number', $product->frozen_number) }}">

                                    @error('frozen_number')
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
