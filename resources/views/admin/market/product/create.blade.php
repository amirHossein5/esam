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
                                <label for="price">قیمت کالا</label>
                                <input type="text" id="price" name="price" class="form-control form-control-sm" value="{{ old('price') }}">
                                @error('price')
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
                        <section class="col-12">
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
                        <section class="col-12">
                            <div class="form-group">
                                <label for="introduction">توضیحات</label>
                                <textarea name="introduction" id="introduction"  class="form-control form-control-sm" rows="6">{{ old('introduction') }}
                                </textarea>
                                @error('introduction')
                                    <div class="my-2 text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </section>

                        <input type="hidden" name="productCategory_id" value="{{ request()->get('productCategory') }}">

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <div>
                                    <label for="brand_id">انتخاب برند</label>
                                    <select name="brand_id" id="brand_id" class="form-control form-control-sm">
                                        <option value="">برند را انتخاب کنید</option>
                                        @foreach ($brands as $brand)
                                            <option
                                                value="{{ $brand->id }}"
                                                @if(old('brand_id') == $brand->id) selected @endif
                                            >
                                                {{ $brand->persian_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('brand_id')
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

                        @foreach ($productCategory->attributes as $attribute)
                            <section class="col-12  py-3
                                @if (! App\Models\AttributeField::valueCanBeEmpty($attribute->attribute_field->name))
                                    col-md-6
                                @endif"
                            >
                                <div class="form-group">

                                    {{-- <x-admin.market.attribute.input-parser
                                        :attribute="collect($attribute)"
                                        class="form-control form-control-sm"
                                        checkboxDivClasses="my-3"
                                    >
                                        <x-slot name="label">
                                            <label for="{{ $attribute->id }}">
                                                <div class="font-bold">
                                                    {{ $attribute->name }}

                                                    @if ($attribute->unit)
                                                        ({{ $attribute->unit }})
                                                    @endif
                                                </div>
                                            </label>
                                        </x-slot>
                                    </x-admin.market.attribute.input-parser> --}}

                                </div>
                            </section>
                        @endforeach

                    </section>
                    @if ($productCategory->canChooseColor)

                        <hr>
                        @error('productColors.*')
                            <div class="my-2 text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        @error('productColorsPriceIncrease.*')
                            <div class="my-2 text-danger">
                                {{ $message }}
                            </div>
                        @enderror

                        <section class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group ">


                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <label for="productColors">
                                                رنگ محصول
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="productColors">
                                                با افزایش قیمت (تومان)
                                            </label>
                                        </div>
                                    </div>

                                    <div id="productColosPricesInputs">
                                        <div  class="row ">
                                            <div class="my-2 col-12 col-md-6">
                                                <input type="color" name="productColors[]" class="form-control form-control-sm">
                                            </div>

                                            <div class="my-2 col-12 col-md-6">
                                                <input type="text" name="productColorsPriceIncrease[]" class="form-control form-control-sm" value="0">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="my-2">
                                        <button type="button" onclick="addColorSection()" class="btn btn-sm btn-info">افزودن</button>
                                        <button type="button" onclick="removeColorSection()" class="btn btn-sm btn-danger">حذف</button>
                                    </div>

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
        CKEDITOR.replace('body');
        select2TagsInForm();
    </script>


    <script>
        $(document).ready(function () {
            var dp = $("#view-date-picker").pDatepicker(datePickerOptions());
            var time = $('#main-date-picker').val() ? parseInt($('#main-date-picker').val()) : null;
            dp.setDate(time)
        });
    </script>

    <script>
        function addColorSection() {
            var lastInputs = $('#productColosPricesInputs').children().last().clone(true)[0];

            $('#productColosPricesInputs').append(lastInputs);
        }

        function removeColorSection() {
            if ($('#productColosPricesInputs').children().length == 1) {
                return;
            }
            $('#productColosPricesInputs').children().last().remove()
        }
    </script>

    <script>
        function default_values_attributes() {
            var target = $(event.currentTarget).find('option:selected');

            if ($(target).data('value-has-attributes') != true) {
                return;
            }

            $('.valueAttribute').closest('.col-12').remove();

            var attributes = $(target).data('value-attributes')

            attributes.forEach((attribute) => {
                var attributeJson = JSON.stringify(attribute);

                var url  = "{{ route('admin.market.attribute.getInputParser') }}";

                var label = `
                    <label for="${attribute.id}">
                        <div class="font-bold">
                            ${attribute.name}
                `

                if (attribute.unit) {
                    label += `(${attribute.unit})`
                }

                label += `
                        </div>
                </label>`.replace(':attributeId', attribute.id);

                $.ajax({
                    type: "post",
                    url: url,
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },
                    data: {
                        "attribute": attributeJson,
                    },
                    success: function (response) {
                            $(target).closest('.row').append(`
                                <section class="col-12  py-3"
                                >
                                    <div class="form-group">
                                        ${(response.input).replace(':label', label)}
                                    </div>
                                </section>`)
                    },
                });
            });
        }
    </script>
@endsection
