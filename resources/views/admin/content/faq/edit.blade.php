@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش  سوالات متداول</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/select2/css/select2.modification.css') }}">
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">سوالات متداول</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش  سوالات متداول</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویرایش  سوالات متداول
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.content.faq.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.content.faq.update', $faq->id) }}" method="post" id="form">
                        @method('put')
                        @csrf
                        <section class="row">

                           <section class="col-12 ">
                                <div class="form-group">
                                    <div>
                                        <label for="faq_category_id">برای دسته بندی </label>
                                        <select name="faq_category_id" class="form-control" id="faq_category_id">

                                            <option value="">انتخاب</option>

                                            @foreach ($faqCategories as $faqCategory)
                                                <option value="{{ $faqCategory->id }}"
                                                    @selected(old('faq_category_id', $faq->faq_category_id) == $faqCategory->id)
                                                >
                                                    {{ $faqCategory->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                    @error('faq_category_id')
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
                                    <label for="question">سوال</label>
                                    <input type="text" id="question" name="question" value="{{ old('question', $faq->question) }}" class="form-control form-control-sm">

                                    @error('question')
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
                                            <option value="0" @selected(old('status', $faq->status) == '0')>غیرفعال</option>
                                            <option value="1" @selected(old('status', $faq->status) == '1')>فعال</option>
                                        </select>
                                    </div>
                                    @error('status')
                                        <div class="mt-1">
                                            <span class="text-danger font-weight-bold">
                                                {{ $message }}
                                            </span>
                                        </div>
                                    @enderror
                                </div>
                            </section>

                            <section class="col-12">
                                <div class="form-group">
                                    <label for="answer">پاسخ</label>
                                    <textarea type="text" id="answer" name="answer" class="form-control form-control-sm">{{ old('answer', $faq->answer) }}</textarea>

                                    @error('answer')
                                        <span class="text-danger">
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
    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('answer');

        $(document).ready(function() {
            $('#faq_category_id').select2();
        });
    </script>

@endsection
