@extends('admin.layouts.master')

@section('head-tag')
    <title>فرم کالا</title>
    <link href="{{ asset('admin-assets/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin-assets/select2/css/select2.modification.css') }}" rel="stylesheet" />
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">فرم کالا</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد فرم کالا</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد فرم کالا
                    </h5>
                </section>

                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.market.attribute.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.market.attribute.store') }}" method="post" id="form">
                        @csrf
                        <section class="row">
                            <section class="col-12 ">
                                <div class="form-group">
                                    <label for="category_id">دسته بندی</label>
                                    <select name="category_id" id="category_id" class="form-control form-control-sm">
                                        <option value="">دسته بندی را انتخاب کنید</option>
                                        @foreach ($productCategories as $productCategory)
                                            <option
                                                value="{{ $productCategory->id }}"
                                                @if(old('category_id') == $productCategory->id) selected @endif
                                            >
                                                {{ $productCategory->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('category_id')

                                        <div class="my-2 text-danger">
                                            {{ $message }}
                                        </div>

                                    @enderror
                                </div>
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="name">نام فرم</label>
                                    <input type="text" placeholder="ضد آب" class="form-control form-control-sm" name="name" value="{{ old('name') }}" id="name">

                                    @error('name')

                                        <div class="my-2 text-danger">
                                            {{ $message }}
                                        </div>

                                    @enderror
                                </div>
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="values">مقادیر</label>

                                    <input type="hidden" id="values" name="values" value="{{ old('values') }}">
                                    <select id="select2" class="form-control" multiple></select>

                                    @error('values')

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

@section('script')
    <script src="{{ asset('admin-assets/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('admin-assets/select2/js/select2-tags-in-form.js') }}"></script>

    <script>
        $(function () {
            select2TagsInForm('#select2','#values','#form','مقدار')
        })
    </script>

@endsection

