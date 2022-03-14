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
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد فرم کالا</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد فرم کالا
                    </h5>
                </section>

                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.market.attribute.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.market.attribute.store') }}" method="post" id="form">
                        @csrf
                        <section class="row">
                            <section class="col-12 ">
                                <div class="form-group">
                                    <label for="attributable_id">دسته بندی</label>
                                    <select name="attributable_id" id="attributable_id" class="form-control form-control-sm">
                                        <option value="">دسته بندی را انتخاب کنید</option>
                                        @foreach ($productCategories as $productCategory)
                                            <option
                                                value="{{ $productCategory->id }}"
                                                @if(old('attributable_id') == $productCategory->id) selected @endif
                                            >
                                                {{ $productCategory->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('attributable_id')

                                        <div class="my-2 text-danger">
                                            {{ $message }}
                                        </div>

                                    @enderror
                                </div>
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="name">نام فرم</label>
                                    <input type="text" placeholder="رم" class="form-control form-control-sm" name="name" value="{{ old('name') }}" id="name">

                                    @error('name')

                                        <div class="my-2 text-danger">
                                            {{ $message }}
                                        </div>

                                    @enderror
                                </div>
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="field_type">نوع</label>

                                    <select name="field_type" id="field_type" onchange="field_type_is()" class="form-control form-control-sm">
                                        <option
                                            value=""
                                        >
                                            نوع
                                        </option>
                                        @foreach ($field_types as $type)
                                            <option
                                                value="{{ $type->id }}"
                                                data-type="{{ $type->name }}"
                                                @if(old('field_type') == (string) $type->id) selected @endif
                                            >
                                                {{ __($type->name) }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('field_type')

                                        <div class="my-2 text-danger">
                                            {{ $message }}
                                        </div>

                                    @enderror
                                </div>
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="unit">واحد</label>
                                    <input type="text" placeholder="گیگ" class="form-control form-control-sm" name="unit" value="{{ old('unit') }}"id="unit">

                                    @error('unit')

                                        <div class="my-2 text-danger">
                                            {{ $message }}
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

    <script>
        $(function () {
            field_type_is($('select[name=field_type]'));
        })
    </script>

    <script>
        function field_type_is (target = null) {
            if (! target) {
                target = event.currentTarget;
            }

            var field_type = $(target).find('option:selected').data('type');

            switch (field_type) {
                case 'numeric':
                    var fields = numeric_fields();
                    break;
                case 'string':
                    var fields = string_fields();
                    break;
                case 'select_box':
                    var fields = select_box_fields();
                    break;
                // case 'select_box_multiple':
                //     var fields = select_box_multiple_fields();
                //     break;
            }

            $(target).closest('.col-12.col-md-6').siblings('.added_template').remove();

            $(target).closest('.col-12.col-md-6').after(fields);

            $('body').append(
                $('<script>').html("select2TagsInForm('#select2', '#value', '#form', 'گزینه')")
            )
        }
    </script>

    <script>
        function numeric_fields() {
            return template('کمترین عدد (اگر خالی باشد محدودیتی درنظر گرفته نمیشود)', 'validations[min]', 'number')
                + " \n"
                + template('بیشترین عدد (اگر خالی باشد محدودیتی درنظر گرفته نمیشود)', 'validations[max]', 'number')
        }

        function string_fields() {
            return template('کمترین تعداد حرف (اگر خالی باشد محدودیتی درنظر گرفته نمیشود)', 'validations[min]', 'number')
                + " \n"
                + template('بیشترین تعداد حرف (اگر خالی باشد محدودیتی درنظر گرفته نمیشود)', 'validations[max]', 'number')

        }

        function select_box_fields() {
            return template('گزینه ها', 'value', 'tags', 'col-12')
        }

        function select_box_multiple_fields() {
            return template('گزینه ها', 'value', 'tags', 'col-12') ;
        }
    </script>

    <script>
        function template(label, name, type = 'text', colClasses = 'col-md-6 col-12') {
            var input = `<input type="${type}" name="${name}" id="${name}" class="form-control form-control-sm " value="{{ old('name') }}" />`;

            if (type == 'tags') {
                return templateTags(label, name, type, colClasses);
            }

            return `
                <section class="${colClasses} added_template">
                    <div class="form-group">
                        <label for="${name}">${label}</label>

                        ${input}

                        @error('${name}')

                            <div class="my-2 text-danger">
                                {{ $message }}
                            </div>

                        @enderror
                    </div>
                </section>
            `;
        }
    </script>

    <script>
        function templateTags(label, name, type = 'text', colClasses = 'col-md-6 col-12') {
            return `
                <section class="${colClasses} added_template">
                    <div class="form-group">
                        <label for="${name}">${label}</label>

                        <input type="hidden" id="${name}" name="${name}" value="{{ old('${name}') }}">
                        <select id="select2" class="form-control" multiple></select>

                        @error('${name}')

                            <div class="my-2 text-danger">
                                {{ $message }}
                            </div>

                        @enderror
                    </div>
                </section>

                {{--<section class="${colClasses} added_template">
                    <div class="form-group">
                        <input type="checkbox" id="valueIsOptional" name="valueIsOptional">
                        <label for="valueIsOptional">توسط فروشنده پر شود</label>
                    </div>
                </section> --}}
            `;
        }
    </script>
@endsection

