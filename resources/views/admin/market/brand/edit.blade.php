@extends('admin.layouts.master')

@section('head-tag')
    <title>برند</title>
    <link href="{{ asset('admin-assets/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin-assets/select2/css/select2.modification.css') }}" rel="stylesheet" />
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">برند</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد برند</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد برند
                    </h5>
                </section>

                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.market.brand.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.market.brand.update', $brand->id) }}" id="form" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <section class="row">

                            <section class="my-2 col-12 col-md-6">
                                <div class="m-1 form-group">
                                    <div>
                                        <label for="persian_name">نام برند به فارسی</label>
                                        <input type="text" id="persian_name" class="form-control form-control-sm"
                                            name="persian_name" value="{{ old('persian_name', $brand->persian_name) }}">
                                    </div>
                                    @error('persian_name')
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
                                        <label for="original_name">نام برند به انگلیسی</label>
                                        <input type="text" id="original_name" class="form-control form-control-sm"
                                            name="original_name" value="{{ old('original_name', $brand->original_name) }}">
                                    </div>
                                    @error('original_name')
                                        <div class="mt-1">
                                            <span class="text-danger font-weight-bold">
                                                {{ $message }}
                                            </span>
                                        </div>
                                    @enderror
                                </div>
                            </section>

                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <div>
                                        <label for="tags">تگ ها</label>
                                        <input type="hidden" id="tags" name="tags" value="{{ old('tags', $brand->tags) }}">
                                        <select id="select2" class="form-control" multiple></select>
                                    </div>
                                    @error('tags')
                                        <div class="mt-1">
                                            <span class="text-danger font-weight-bold">
                                                {{ $message }}
                                            </span>
                                        </div>
                                    @enderror
                                </div>
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="status">وضعیت</label>
                                    <select name="status" id="status" class="form-control form-control-sm">
                                        <option value="1" @if (old('status', $brand->status) == '1')selected @endif>فعال</option>
                                        <option value="0" @if (old('status', $brand->status) == '0')selected @endif>غیرفعال</option>
                                    </select>

                                    @error('status')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </section>

                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <div>
                                        <label for="logo">لوگو</label>
                                        <input type="file" id="logo" class="form-control form-control-sm" name="logo">
                                    </div>
                                    @if ($brand->logo)
                                        <div>
                                        <img src="{{ asset($brand->logo['index']['medium']) }}" width="50" height="50" alt="">
                                    </div>
                                    @endif
                                    @error('logo')
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

@section('script')

    <script src="{{ asset('admin-assets/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('admin-assets/select2/js/select2-tags-in-form.js') }}"></script>

    <script>
        select2TagsInForm();
    </script>

@endsection
