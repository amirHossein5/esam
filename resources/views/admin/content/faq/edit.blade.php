@extends('admin.layouts.master')

@section('head-tag')
    <title>ساخت سوالات متداول</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/select2/css/select2.modification.css') }}">
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">سوالات متداول</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش سوال</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویرایش سوال
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.content.faq.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.content.faq.update', $faq->id) }}" method="post" id="form">
                        @csrf
                        @method('put')
                        <section class="row">

                            <section class="col-12">
                                <div class="form-group">
                                    <label for="question">پرسش</label>
                                    <input type="text" id="question" name="question" value="{{ old('question', $faq->question) }}" class="form-control form-control-sm">

                                    @error('question')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </section>

                            <section class="col-12">
                                <div class="form-group">
                                    <label for="answer">پاسخ</label>
                                    <textarea name="answer" name="answer" id="answer" class="form-control form-control-sm"
                                        rows="6">{{ old('answer', $faq->answer) }}</textarea>

                                    @error('answer')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </section>


                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <div>
                                        <label for="status">وضعیت</label>
                                        <select name="status" class="form-control" id="status">
                                            <option value="0" @if (old('status', $faq->status) == '0') selected @endif>غیرفعال</option>
                                            <option value="1" @if (old('status', $faq->status) == '1') selected @endif>فعال</option>
                                        </select>

                                        @error('status')
                                            <div class="mt-1">
                                                <span class="text-danger font-weight-bold">
                                                    {{ $message }}
                                                </span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <div>
                                        <label for="tags">تگ ها</label>
                                        <input type="hidden" id="tags" name="tags" value="{{ old('tags', $faq->tags) }}">
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
        CKEDITOR.replace('answer');
        select2TagsInForm();
    </script>

@endsection
