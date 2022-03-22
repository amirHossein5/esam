@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد کالا</title>
    <link href="{{ asset('admin-assets/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin-assets/select2/css/select2.modification.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin-assets/persian-date-picker/persian-datepicker.min.css') }}" rel="stylesheet" />
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">کالا </a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد کالا</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                  ایجاد کالا
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.market.product.index') }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            @if (! request()->has('productCategory'))
                <form action="{{ route('admin.market.product.create') }}">
                    <div class="form-group">
                        <div class="col-12 col-md-6 p-0">
                            <select name="productCategory" class="form-control form-control-sm">
                                @foreach ($productCategories as $category )
                                    <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-sm btn-success">بعدی</button>
                </form>
            @else

            <section>
                <form action="{{ route('admin.market.product.store') }}" id="form" method="post" enctype="multipart/form-data">
                    @csrf
                    <section class="row">

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="name">نام کالا</label>
                                <input type="text" id="name" name="name" class="form-control form-control-sm" value="{{ old('name') }}">
                                @error('name')
                                    <div class="my-2 text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </section>

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="introduction">توضیح مختصر</label>
                                <input type="text" name="introduction" id="introduction"  class="form-control form-control-sm" value="{{ old('introduction') }}">

                                @error('introduction')
                                    <div class="my-2 text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </section>


                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="image">تصویر </label>
                                <input type="file" id="image" name="image" class="form-control form-control-sm" value="{{ old('image') }}">
                                @error('image')
                                    <div class="my-2 text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </section>

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <div>
                                    <label for="marketable">قابل فروش بودن</label>
                                    <select name="marketable" class="form-control" id="marketable">
                                        <option value="0" @if (old('marketable') === '0') selected @endif>غیرفعال</option>
                                        <option value="1" @if (old('marketable') === '1') selected @endif>فعال</option>
                                    </select>
                                </div>
                                @error('marketable')
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
                                <div>
                                    <label for="tags">تگ ها</label>
                                    <input type="hidden" id="tags" name="tags" value="{{ old('tags') }}">
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
                                <label for="">تاریخ انتشار</label>
                                <input type="text" id="view-date-picker" class="form-control direction-ltr form-control-sm">
                                <input type="text" class="d-none" id="main-date-picker" name="published_at"
                                value="{{ old('published_at') }}">
                            </div>
                        </section>

                        <section class="col-12">
                            <div class="form-group">
                                <label for="description">توضیحات</label>
                                <textarea name="description" id="description"  class="form-control form-control-sm" rows="6">{{ old('description') }}
                                </textarea>
                                @error('description')
                                    <div class="my-2 text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </section>

                        <input type="hidden" name="productCategory_id" value="{{ request()->get('productCategory') }}">

                    </section>

                    <section class="mb-3 mt-3  border-bottom py-3">
                        <h6>خصوصیات</h6>

                        <x-product.show-attributes :model="$productCategory"/>
                    </section>


                    <h6 class="pt-3">نوع فروش</h6>

                    <section class="row py-2 mb-3">

                        @foreach ($sellTypes as $sellType)
                            <section class="col-12 col-md-6">
                                <button
                                    type="button"
                                    style="width: 100%"
                                    class="btn btn-outline-info btn-sm click-btn-info toggle-section "
                                    data-id="{{ $sellType->name }}"
                                >
                                    {{ $sellType->persian_name }}
                                </button>
                            </section>
                        @endforeach

                        <section class="my-2 col-12" style="font-size: .875rem">
                            زمان ارسال:
                            <span>تا ۴۸ ساعت کاری</span>
                            <p class="mt-1 text-danger">جهت تغییر زمان ارسال با مراجعه به پروفایل کاربری تنظیمات زمان ارسال را تغییر دهید.</p>
                        </section>

                        <section class="col-12 col-md-6" id="{{ $sellTypes[0]->name }}" style="display: none">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="price">قیمت هر عدد</label>
                                    <input type="text" id="price" name="price" class="form-control form-control-sm" value="{{ old('price') }}">
                                    @error('price')
                                        <div class="my-2 text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </section>
                        </section>

                        <section class="col-12 col-md-6" id="{{ $sellTypes[1]->name }}" style="display: none">
                            <h1>
                                {{ $sellTypes[1]->name }}
                            </h1>
                        </section>

                    </section>

                    @if ($productCategory->colorable)
                        <section class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group ">

                                    <label for="">رنگ</label>
                                    <select name="" id="colors" class="form-control form-control-sm">
                                        <option value="">انتخاب</option>

                                        @foreach ($colors as $color)
                                            <option value="">{{ $color->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </section>
                    @endif

                        <section class="mt-5">
                            <button class="btn btn-primary btn-sm">  ثبت کالا</button>
                        </section>
                </form>
            </section>

            @endif
        </section>
    </section>
</section>

@endsection

@section('script')
    <script src="{{ asset('admin-assets/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('admin-assets/select2/js/select2-tags-in-form.js') }}"></script>
    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('admin-assets/persian-date-picker/date-picker-options.js') }}"></script>
    <script src="{{ asset('admin-assets/persian-date-picker/persian-date.min.js') }}"></script>
    <script src="{{ asset('admin-assets/persian-date-picker/persian-datepicker.min.js') }}"></script>

    <script>
        CKEDITOR.replace('description');
        select2TagsInForm();

        $('#colors').select2();
    </script>

    <script>
        $(function () {
            $('.click-btn-info').click(function() {
                $('.click-btn-info').removeClass('btn-info');
                $('.click-btn-info').removeClass('text-white');
                $(this).addClass('btn-info');
            });

            $('.toggle-section').on('click', () => {
                var target = event.currentTarget;

                Object.values($('.toggle-section')).forEach((item) => {
                    $(`#${$(item).data('id')}`).hide();
                })

                $(`#${$(target).data('id')}`).show();
            });
        })
    </script>


    <script>
        $(function(){
            $('button[data-id=fix_price]')[0].click()
            $($('button[data-id=fix_price]')[0]).addClass('text-white')
        })
    </script>

    <script>
        $(document).ready(function () {
            var dp = $("#view-date-picker").pDatepicker(datePickerOptions());
            var time = $('#main-date-picker').val() ? parseInt($('#main-date-picker').val()) : null;
            dp.setDate(time)
        });
    </script>
@endsection
