@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش پیج</title>
        <link rel="stylesheet" href="{{ asset('admin-assets/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/select2/css/select2.modification.css') }}">
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">پیج ساز</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش پیج</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویرایش پیج
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.content.page.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.content.page.update', $page->id) }}" method="post" id="form">
                        @csrf
                        @method('put')
                        <section class="row">

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="title">عنوان </label>
                                    <input type="text" id="title" name="title" value="{{ old('title', $page->title) }}" class="form-control form-control-sm">

                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="tags">تگ ها </label>
                                    <input type="hidden" id="tags" name="tags" value="{{ old('tags', $page->tags) }}">
                                    <select id="select2" multiple class="form-control form-control-sm"></select>

                                    @error('tags')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="status">وضعیت </label>
                                    <select id="status" name="status" class="form-control form-control-sm">
                                        <option value="0" @if(old('status', $page->status) == '0') selected @endif>
                                            غیرفعال
                                        </option>
                                        <option value="1" @if(old('status', $page->status) == '1') selected @endif>
                                            فعال
                                        </option>
                                    </select>

                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </section>


                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="slug">آدرس URL</label>
                                    <input type="text" id="slug" name="slug" value="{{ old('slug', $page->slug) }}" class="form-control form-control-sm">

                                    @error('slug')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </section>

                            <section class="col-12">
                                <div class="form-group">
                                    <label for="body">محتوی</label>
                                    <textarea name="body" id="body" class="form-control form-control-sm"
                                        rows="6">{{ old('body', $page->body) }}</textarea>

                                    @error('body')
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
