@extends('admin.layouts.master')

@section('head-tag')
    <title>ساخت بنر جدید</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/select2/css/select2.modification.css') }}">

@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بنر ساز</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="banner"> ایجاد بنر</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد بنر
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.content.banner.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.content.banner.update', $banner->id) }}" method="post" id="form" enctype="multipart/form-data">
                        @csrf @method('put')
                        <section class="row">

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="url">آدرس URL</label>
                                    <input type="text" id="url" name="url" value="{{ old('url', $banner->url) }}" class="form-control form-control-sm">

                                    @error('url')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="banner">بنر</label>
                                    <input type="file" name="banner" class="form-control form-control-sm" id="banner">

                                    <img src="{{ asset($banner->banner) }}" class="m-3" width="150px" alt="">

                                    @error('banner')
                                        <span class="text-danger">{{ $message }}</span>
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
    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('body');
        select2TagsInForm();
    </script>

@endsection
