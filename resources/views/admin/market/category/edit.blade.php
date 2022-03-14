@extends('admin.layouts.master')

@section('head-tag')
    <title>دسته بندی</title>
    <link href="{{ asset('admin-assets/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin-assets/select2/css/select2.modification.css') }}" rel="stylesheet" />
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">دسته بندی</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش دسته بندی</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویرایش دسته بندی
                    </h5>
                </section>

                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.market.category.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.market.category.update', $productCategory->id) }}" id="form" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <section class="row">

                            <section class="my-2 col-12 col-md-6">
                                <div class="m-1 form-group">
                                    <div>
                                        <label for="name">نام دسته</label>
                                        <input type="text" id="name" class="form-control form-control-sm" name="name"
                                            value="{{ old('name', $productCategory->name) }}">
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

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="parent_id">دسته والد</label>
                                    <select name="parent_id" id="parent_id" class="form-control form-control-sm">
                                        <option value="">دسته اصلی</option>
                                        @foreach ($productCategories as $category)
                                            <option
                                                value="{{ $category->id }}"
                                                @if ($category->id == old('parent_id', $productCategory->parent_id))
                                                    selected
                                                @endif
                                            >
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>


                                    @error('parent_id')
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
                                        <input type="hidden" id="tags" name="tags" value="{{ old('tags', $productCategory->tags) }}">
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

                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <div>
                                        <label for="show_in_menu">نمایش در منو</label>
                                        <select name="show_in_menu" class="form-control" id="show_in_menu">
                                            <option
                                                value="0"
                                                @if (old('show_in_menu', $productCategory->show_in_menu) == '0')selected
                                                @endif
                                            >
                                                غیرفعال
                                            </option>
                                            <option
                                                value="1"
                                                @if (old('show_in_menu', $productCategory->show_in_menu) == '1') selected
                                                @endif
                                            >
                                                فعال
                                            </option>
                                        </select>
                                    </div>
                                    @error('show_in_menu')
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
                                            <label for="image">تصویر</label>
                                            <input type="file" id="image" class="form-control form-control-sm" name="image">
                                        </div>
                                        @if($productCategory->image)
                                            <div>
                                                <img src="{{ $productCategory->image['index']['medium'] }}" alt="">
                                            </div>
                                        @endif
                                        @error('image')
                                            <div class="mt-1">
                                                <span class="text-danger font-weight-bold">
                                                    {{ $message }}
                                                </span>
                                            </div>
                                        @enderror
                                    </div>
                                </section>

                                <section class="my-2 col-12">
                                    <div class="form-group">
                                        <div>
                                            <label for="description">توضیحات</label>
                                            <textarea
                                                name="description"
                                                id="description"
                                                class="form-control form-control-sm"
                                                rows="6"
                                            >
                                                {{ old('description', $productCategory->description) }}
                                            </textarea>
                                        </div>
                                        @error('description')
                                            <div class="mt-1">
                                                <span class="text-danger font-weight-bold">
                                                    {{ $message }}
                                                </span>
                                            </div>
                                        @enderror
                                    </div>
                                </section>


                                <section class="col-12 col-md-6 d-flex align-items-center">
                                    <div class="form-group">
                                        <input
                                            type="hidden"
                                            name="canChooseColor"
                                            value="0"
                                            @if(old('canChooseColor', $productCategory->canChooseColor) == '0')         checked
                                            @endif
                                        >
                                        <input
                                            type="checkbox"
                                            name="canChooseColor"
                                            id="canChooseColor"
                                            value="1"
                                            @if(old('canChooseColor', $productCategory->canChooseColor) == '1')         checked
                                            @endif
                                        >
                                        <label class="mx-1" for="canChooseColor">امکان انتخاب رنگ برای محصول</label>
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

    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('admin-assets/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('admin-assets/select2/js/select2-tags-in-form.js') }}"></script>

    <script>
        CKEDITOR.replace('description');
        select2TagsInForm();
    </script>

@endsection
