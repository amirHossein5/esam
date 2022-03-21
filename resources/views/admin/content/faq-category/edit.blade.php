@extends('admin.layouts.master')

@section('head-tag')
    <title>ساخت دسته بندی سوالات متداول</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">سوالات متداول</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش دسته بندی سوالات متداول</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویرایش دسته بندی سوالات متداول
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.content.faqCategory.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.content.faqCategory.update', $faqCategory->id) }}" method="post" id="form">
                        @csrf @method('put')
                        <section class="row">

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="name">نام</label>
                                    <input type="text" id="name" name="name"
                                        value="{{ old('name', $faqCategory->name) }}"
                                        class="form-control form-control-sm">

                                    @error('name')
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
                                            <option value="0"
                                                @selected(old('status', $faqCategory->status) == App\Models\Content\FAQCategory::DISABLE)
                                            >
                                                غیرفعال
                                            </option>
                                            <option value="1"
                                                @selected(
                                                old('status', $faqCategory->status) == App\Models\Content\FAQCategory::ENABLE)
                                            >
                                                فعال
                                            </option>
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
                                <button class="btn btn-primary btn-sm">ثبت</button>
                            </section>
                        </section>
                    </form>
                </section>

            </section>
        </section>
    </section>
@endsection
