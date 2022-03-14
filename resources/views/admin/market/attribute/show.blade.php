@extends('admin.layouts.master')

@section('head-tag')
    <title>فرم کالا</title>
    <link href="{{ asset('admin-assets/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin-assets/select2/css/select2.modification.css') }}" rel="stylesheet" />
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">فرم کالا</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page">  فرم کالا</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        فرم کالای ({{ $category->name }})
                    </h5>
                </section>

                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.market.attribute.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                    <a href="{{ route('admin.market.attribute.value.create', $category->id) }}" class="btn btn-info btn-sm">ایجاد فرم برای مقادیر</a>

                </section>

                <form action="#">
                    <section class="row">
                        @foreach ($category->attributes as $attribute)
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
                                            <label for="{{ $attribute->id }}" class="d-flex justify-content-between">
                                                <div class="font-bold">
                                                    {{ $attribute->name }}

                                                    @if ($attribute->unit)
                                                        ({{ $attribute->unit }})
                                                    @endif
                                                </div>
                                                <div>
                                                    <form action=""></form>

                                                    <form action="{{ route('admin.market.attribute.destroy', $attribute->id) }}" method="post" class="d-inline">
                                                        @csrf @method('delete')
                                                        <button
                                                        id="test"
                                                            class="btn btn-danger btn-sm"
                                                            onclick="confirm(event, 'به طور کامل پاک خواهد شد.')"
                                                        >
                                                            حذف
                                                        </button>
                                                    </form>
                                                </div>
                                            </label>
                                        </x-slot>
                                    </x-admin.market.attribute.input-parser> --}}

                                </div>
                            </section>
                        @endforeach
                    </section>
                    @if ($category->canChooseColor)
                        <hr>
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
                                        <button onclick="addColorSection()" class="btn btn-sm btn-info">افزودن</button>
                                        <button onclick="removeColorSection()" class="btn btn-sm btn-danger">حذف</button>
                                    </div>

                                </div>
                            </div>
                        </section>
                    @endif
                    <hr>
                    <section>
                        <button type="submit" class='btn btn-sm btn-info'>ثبت</button>
                    </section>

                </form>
            </section>
        </section>
    </section>

@endsection

@section('script')
    @include('alerts.sweetalert.confirm')

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
                    <label for="${attribute.id}" class="d-flex justify-content-between">
                        <div class="font-bold">
                            ${attribute.name}
                `

                if (attribute.unit) {
                    label += `(${attribute.unit})`
                }

                label += `
                        </div>
                        <div>
                            <form action=""></form>

                            <form action="{{ route('admin.market.attribute.destroy', ':attributeId') }}" method="post" class="d-inline">
                                @csrf @method('delete')
                                <button
                                id="test"
                                    class="btn btn-danger btn-sm"
                                    onclick="confirm(event, 'به طور کامل پاک خواهد شد.')"
                                >
                                    حذف
                                </button>
                            </form>
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
                                <section class="py-3 col-12"
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
