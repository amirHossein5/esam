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
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد دسته بندی</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد دسته بندی
                    </h5>
                </section>

                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.market.category.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.market.category.store') }}" id="form" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <section class="row">

                            <section class="my-2 col-12 col-md-6">
                                <div class="m-1 form-group">
                                    <div>
                                        <label for="name">نام دسته</label>
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

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="parent_id">دسته والد</label>
                                    <select name="parent_id" id="parent_id" class="form-control form-control-sm">
                                        <option value="">دسته اصلی</option>
                                        @foreach ($productCategories as $productCategory)
                                            <option
                                                value="{{ $productCategory->id }}"
                                                @if ($productCategory->id == old('parent_id'))
                                                    selected
                                                @endif
                                            >
                                                {{ $productCategory->name }}
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
                                        <label for="show_in_menu">نمایش در منو</label>
                                        <select name="show_in_menu" class="form-control" id="show_in_menu">
                                            <option value="0" @if (old('show_in_menu') === '0') selected @endif>غیرفعال</option>
                                            <option value="1" @if (old('show_in_menu') === '1') selected @endif>فعال</option>
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
                                                {{ old('description') }}
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
                                            name="colorable"
                                            value="0"
                                            @if(old('colorable') == '0') checked @endif
                                        >
                                        <input
                                            type="checkbox"
                                            name="colorable"
                                            id="colorable"
                                            value="1"
                                            @if(old('colorable') == '1') checked @endif
                                        >
                                        <label class="mx-1" for="colorable"> امکان داشتن رنگ های متفاوت (برای زیر دسته این دسته نیز اعمال می شود.)</label>
                                    </div>
                                </section>

                                @foreach ($selectableMetas as $meta)
                                    <section class="col-12 col-md-6 d-flex align-items-center">
                                        <div class="form-group">
                                            <input
                                                type="checkbox"
                                                name="selectableMetas[{{ $meta->id }}]"
                                                id="{{ $meta->id }}"
                                                value="{{ $meta->id }}"
                                                @checked(in_array($meta->id, old('selectableMetas') ?? []))
                                            >
                                            <label class="mx-1" for="{{ $meta->id }}">امکان ثبت  {{ $meta->name }}  متفاوت (برای زیر دسته این دسته نیز اعمال می شود.)</label>

                                            @error("selectableMetas.". $meta->id)
                                                <div class="text-danger my-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </section>
                                @endforeach

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

    <script>
        CKEDITOR.replace('description');
    </script>

@endsection
