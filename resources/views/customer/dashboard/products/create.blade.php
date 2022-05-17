@extends('customer.dashboard.layouts.master')

@section('head-tag')
    <title>  ساخت محصول </title>

    <link href="{{ asset('admin-assets/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin-assets/select2/css/select2.modification.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin-assets/persian-date-picker/persian-datepicker.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <section class="p-2 pt-0 bg-white border rounded-md shadow-md md:w-9/12">
        <x-customer.dashboard.header-text class="lg:text-lg xl:text-xl">
            ساخت محصول

            <x-slot name="other">
                <section class="">
                    @if (request()->has('productCategory'))
                        <h5>
                            دسته بندی: {{ $productCategory->name }}
                        </h5>
                    @endif
                </section>
            </x-slot>
        </x-customer.dashboard.header-text>

        <section class="p-3">
            <div class="mt-2">
                <a href="{{ route('customer.dashboard.products.index') }}" class="p-2 bg-green-600 rounded text-white">بازگشت</a>
            </div>

            <div class="mt-5">
                @if (! request()->has('productCategory'))
                    <form action="{{ route('customer.dashboard.products.create') }}">
                        <div class="p-0 md:w-1/2">
                            انتخاب دسته بندی:
                            <x-select name="productCategory" dir="rtl" class="mt-1 rtl w-full">
                                @foreach ($productCategories as $category )
                                    <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                @endforeach
                            </x-select>
                        </div>

                        <button type="submit" class="text-white rounded py-2 px-2 bg-green-600 mt-2">بعدی</button>
                    </form>
                @else

                <section class="p-2">
                    <form action="{{ route('customer.dashboard.products.store') }}" id="form" method="post" enctype="multipart/form-data">
                        @csrf
                        <section class="row">

                            <section class="w-full md:w-1/2 p-1 ">
                                <div class="mb-4">
                                    <x-label for="name">نام کالا</x-label>
                                    <x-input type="text" id="name" name="name" class="w-full" />

                                    <div class="my-1 name-error errors error"></div>
                                </div>
                            </section>

                            <section class="w-full md:w-1/2 p-1 ">
                                <div class="mb-4">
                                    <x-label for="introduction">توضیح مختصر</x-label>
                                    <x-input type="text" name="introduction" id="introduction" class="w-full" />

                                    <div class="my-1 introduction-error errors error"></div>
                                </div>
                            </section>


                            <section class="w-full md:w-1/2 p-1">
                                <div class="mb-4">
                                    <x-label for="image">تصویر </x-label>
                                    <x-input type="file" id="image" name="image" class="w-full" />

                                    <div class="my-1 image-error errors error"></div>
                                </div>
                            </section>

                            <section class="w-full md:w-1/2 p-1">
                                <div class="mb-4">
                                    <div>
                                        <x-label for="marketable">قابل فروش بودن</x-label>
                                        <x-select name="marketable" class="w-full rtl" id="marketable">
                                            <option value="0" >غیرفعال</option>
                                            <option value="1" >فعال</option>
                                        </x-select>

                                    </div>
                                    <div class="my-1 marketable-error errors error"></div>
                                </div>
                            </section>

                            <section class="w-full md:w-1/2 p-1">
                                <div class="mb-4">
                                    <div>
                                        <x-label for="tags">تگ ها</x-label>
                                        <input type="hidden" id="tags" name="tags">
                                        <x-select class="" id="select2" style="width: 100%" multiple></x-select>
                                    </div>

                                    <div class="my-1 tags-error errors error"></div>
                                </div>
                            </section>

                            <section class="w-full md:w-1/2 p-1">
                                <div class="mb-4">
                                    <x-label for="">تاریخ انتشار</x-label>
                                    <x-input type="text" id="view-date-picker" class="ltr w-full" />
                                    <input type="text" class="hidden" id="main-date-picker" name="published_at">

                                    <div class="my-1 published_at-error errors error"></div>
                                </div>
                            </section>

                            <section class="w-full">
                                <div class="mb-4">
                                    <x-label for="description">توضیحات</x-label>
                                    <x-textarea name="description" id="description"  class="w-full" rows="6"></x-textarea>

                                    <div class="my-1 description-error errors error"></div>
                                </div>
                            </section>

                            <input type="hidden" name="productCategory_id" value="{{ request()->get('productCategory') }}">

                        </section>

                        @if ($productCategory->attributes()->exists())
                            <section class="py-3 my-3 border-b border-t">
                                <h6 class="text-lg">خصوصیات</h6>
                                <div class="my-3 attributeValues-error errors error"></div>

                                <x-product.show-attributes :tailwind="true" :model="$productCategory" />
                            </section>
                        @endif


                        <h6 class="pt-3 text-lg">نوع فروش</h6>

                        <section class="py-2 mb-3 row">
                            <div class="my-1 sell_type_id-error errors error"></div>

                            @foreach ($sellTypes as $sellType)
                                <section class="w-full md:w-1/2 p-1">
                                    <input
                                        type="radio"
                                        id="sellType-{{ $sellType->id }}"
                                        name="sell_type_id"
                                        class="hidden"
                                        value="{{ $sellType->id }}"
                                    />
                                    <x-label
                                        for="sellType-{{ $sellType->id }}"
                                        class="p-2 cursor-pointer bg-blue-400 border border-blue-500 rounded text-white click-btn-info toggle-section "
                                        style="width: 100%"
                                        data-id="{{ $sellType->name }}"
                                    >
                                        {{ $sellType->persian_name }}
                                    </x-label>
                                </section>
                            @endforeach

                            <section class="mt-2 mb-4 w-full" style="font-size: .875rem">
                                زمان ارسال:
                                <span>تا {{ auth()->user()->deliveryTime->time }}  کاری</span>
                                <p class="mt-1 text-green-600">جهت تغییر زمان ارسال با مراجعه به پروفایل کاربری تنظیمات زمان ارسال را تغییر دهید.</p>
                            </section>

                            <section class="w-full row" id="{{ $sellTypes[0]->name }}" style="display: none">
                                <section class="w-full ">
                                    <div class="mb-4">
                                        <input type="hidden" name="has_request_for_discount" value="0">

                                        <div class="mt-2">
                                            <x-input type="checkbox" class="!w-4 !h-4" name="has_request_for_discount" value="1" id="has_request_for_discount" />

                                            <x-label class="inline" for="has_request_for_discount">تخفیف هم میدهم</x-label>
                                        </div>

                                        <div class="my-1 has_request_for_discount-error errors  error"></div>
                                    </div>
                                </section>

                                @foreach ($selectableValues as $values)
                                    <section class="w-full ">

                                        <div class="mb-4 product-variant">
                                            <x-label for="" data-attribute-id="{{ $values[0]['selectable_attribute']['id'] }}">
                                                {{ $values[0]['selectable_attribute']['name'] }}
                                            </x-label>

                                            <select name="" id=""
                                                class="select2-class" style="width: 100%">
                                                <option value="">انتخاب</option>

                                                @foreach ($values as $value)
                                                    <option value="{{ $value['id'] }}">
                                                        {{ $value['value'] }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            <div class="my-1 error">
                                                <span class="error"></span>
                                            </div>
                                        </div>

                                    </section>
                                @endforeach

                                <section class="w-full">
                                    <div class="mb-4">
                                        <x-label for="">تعداد</x-label>
                                        <x-input type="text" id="number" name="number" class="w-full" />

                                        <div class="my-1 number-error errors error"></div>
                                    </div>
                                </section>

                                <section class="w-full">
                                    <div class="mb-4">
                                        <x-label for="price">قیمت هر عدد (تومان)</x-label>
                                        <x-input type="text" id="price" name="price"  class="w-full" />

                                        <div class="my-1 price-error errors error"></div>

                                    </div>
                                </section>

                                @if ($productCategory->selectableValues()->exists())
                                    <section class="mt-1 w-full">
                                        <h6 style="font-size: .875rem">حداقل یک قیمت باید برای کالا ثبت کنید.</h6>
                                        <x-button type="button" class="my-2 bg-green-600 add-to-product-variants">  ثبت قیمت</x-button>
                                        <div class="my-2 productVariants-error errors error "></div>
                                        <p class="mt-2 add-to-variant-error error"></p>

                                        <div class="mt-2 table-responsive">
                                            <table class="table table-hover product-variants-table" style="min-width: 31rem">
                                                <thead>
                                                    <tr>
                                                        <td>اصلی</td>
                                                        <td>قیمت</td>
                                                        <td>تعداد</td>
                                                        <td>مشخصه</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </section>
                                @endif
                            </section>

                            <section class="w-full row" id="{{ $sellTypes[1]->name }}" style="display: none">
                                <section class="w-full">
                                    <div class="mb-4">
                                        <x-label for="start_price">شروع قیمت از   (تومان)</x-label>
                                        <x-input type="text" id="start_price" name="start_price"  class="w-full" />

                                        <div class="my-1 start_price-error errors error"></div>

                                    </div>
                                </section>

                                <section class="w-full">
                                    <div class="mb-4">

                                        <x-label for="">مدت</x-label>
                                        <select name="auction_period_id" id="auction_period_id" class="w-full select2-class" style="width: 100%">
                                            <option value="">انتخاب</option>

                                            @foreach ($auction_periods as $period)
                                                <option value="{{ $period->id }}">{{ $period->fa }}</option>
                                            @endforeach
                                        </select>

                                        <div class="my-1 auction_period_id-error errors error"></div>
                                    </div>
                                </section>

                                <section class="w-full">
                                    <div class="mb-4">
                                        <x-label for="">تاریخ شروع</x-label>
                                        <x-input type="text" id="start_auction_view"  class="ltr w-full" />
                                        <input type="text" class="hidden" name="start_date" id="start_auction_main">

                                        <div class="my-1 start_date-error errors error"></div>

                                    </div>
                                </section>

                                <section class="w-full">
                                    <div class="mb-4">
                                        <x-input type="checkbox" class="!h-4 !w-4" id="urgent_price" onchange="active_input()"/>
                                        <x-label class="inline m-1" for="urgent_price">  قیمت فروش فوری (تومان)</x-label>
                                        <x-input type="text" name="urgent_price"  class="mt-1 w-full" disabled />

                                        <p class="my-1 text-green-600" style="font-size: .875rem">
                                            تا زمانی که سقف پیشنهادات مزایده به نصف این قیمت نرسیده باشد کاربران می توانند کالا را با این قیمت خریداری کنند.
                                        </p>

                                        <div class="my-1 urgent_price-error errors error"></div>
                                    </div>
                                </section>


                                <section class="w-full">
                                    <div class="mb-4">
                                        <x-input type="checkbox" class="!h-4 !w-4" id="reserved_price" onchange="active_input()"/>
                                        <x-label class="inline m-1" for="reserved_price">  قیمت  رزرو (تومان)</x-label>
                                        <x-input type="text" name="reserved_price" class="mt-1 w-full" disabled />

                                        <p class="my-1 text-green-600" style="font-size: .875rem">
                                            اگر قیمت های مزایده به این قیمت نرسد شما میتوانید محصول را ارسال نکنید.
                                        </p>

                                        <div class="my-1 reserved_price-error errors error"></div>
                                    </div>
                                </section>


                            </section>

                        </section>

                        <h6 class="pt-3 my-3 border-t text-lg">نحوه محاسبه هزینه ارسال</h6>

                        <section>

                            <div class="mb-4">
                                <x-label for="weight">وزن تقریبی مرسوله</x-label>

                                <x-select name="weight_id" id="weight" class="calculate_delivery_amount w-full rtl">
                                    <option value="">انتخاب وزن تقریبی</option>

                                    @foreach ($productWeights as $weight)
                                        <option
                                            value="{{ $weight->id }}"
                                            data-price="{{ $weight->delivery_amount }}"
                                        >
                                            {{ $weight->showable }}
                                        </option>
                                    @endforeach
                                </x-select>

                                <div class="my-1 weight_id-error errors error"></div>

                            </div>

                            <div class="flex my-2">
                                <input
                                    type="radio"
                                    id="deliveryIsFree-0"
                                    name="deliveryIsFree"
                                    class="hidden"
                                    value="0"
                                />
                                <x-label
                                    for="deliveryIsFree-0"
                                    class="cursor-pointer rounded p-2 border border-gray-600 click-btn-secondary "
                                >
                                    بعهده خریدار
                                </x-label>

                                <input
                                    type="radio"
                                    id="deliveryIsFree-1"
                                    name="deliveryIsFree"
                                    class="hidden"
                                    value="1"
                                />
                                <x-label
                                    for="deliveryIsFree-1"
                                    class="cursor-pointer rounded p-2 border border-gray-600 click-btn-secondary "
                                >
                                    ارسال رایگان
                                </x-label>

                                <div class="my-1 deliveryIsFree-error errors errors"></div>
                            </div>

                            <p class="font-bold show_delivery_amount">هزینه ارسال: <span>0</span></p>

                        </section>


                        <section class="mt-5">
                            <button class="p-2 bg-gray-600 text-white disable-on-ajax" type="submit">
                                گالری کالا - مرحله بعد
                            </button>
                        </section>
                    </form>
                </section>

                @endif
            </div>
        </section>
    </section>
@endsection


@section('scripts')
    <script src="{{ asset('admin-assets/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('admin-assets/select2/js/select2-tags-in-form.js') }}"></script>
    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('admin-assets/persian-date-picker/date-picker-options.js') }}"></script>
    <script src="{{ asset('admin-assets/persian-date-picker/persian-date.min.js') }}"></script>
    <script src="{{ asset('admin-assets/persian-date-picker/persian-datepicker.min.js') }}"></script>

    <script>
        var descriptionCKE = CKEDITOR.replace('description');
        select2TagsInForm();

        $('.select2-class').select2();
    </script>

    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
    </script>

    <script>
        $(document).ready(function(){
            $('.click-btn-secondary').click(function() {
                $(this).siblings('.click-btn-secondary').removeClass('bg-gray-600');
                $(this).siblings('.click-btn-secondary').removeClass('text-white');

                $(this).removeClass('bg-gray-600');
                $(this).removeClass('text-white');

                $(this).addClass('bg-gray-600');
                $(this).addClass('text-white');
            });

            $('.calculate_delivery_amount').change(function (){
                let target = event.currentTarget;

                if ($('#deliveryIsFree-1').prop('checked') == true) {
                    return true;
                }

                if ($(target).val()) {
                    $('.show_delivery_amount span').text($(target).find('option:selected').data('price') + ' تومان');
                } else {
                    $('.show_delivery_amount span').text('0');
                }
            });

            $('#deliveryIsFree-1').click(function() {
                $('.show_delivery_amount span').text('رایگان');
            })

            $('#deliveryIsFree-0').click(function() {
                $('.calculate_delivery_amount')[0].dispatchEvent(new Event('change'));
            })

            $('.click-btn-info').click(function() {
                $('.click-btn-info').removeClass('bg-blue-400');
                $('.click-btn-info').removeClass('text-white');
                $(this).addClass('bg-blue-400');
                $(this).addClass('text-white');
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
            $('[data-id=fix_price]')[0].click()
            $($('[data-id=fix_price]')[0]).addClass('text-white')

            $('[for=deliveryIsFree-0]')[0].click()
            $($('[for=deliveryIsFree-0]')[0]).addClass('text-white')
        })
    </script>

    <script>
        $(document).ready(function () {
            var dp = $("#view-date-picker").pDatepicker(datePickerOptions());
            var time = $('#main-date-picker').val() ? parseInt($('#main-date-picker').val()) : null;
            dp.setDate(time)

            var dp = $("#start_auction_view").pDatepicker(datePickerOptions('#start_auction_main'));
            var time = $('#start_auction_main').val() ? parseInt($('#start_auction_main').val()) : null;
            dp.setDate(time)
        });
    </script>

    <script>
        function be_reload() {
            $('body').append($('.be-reload').clone()[0]);
        }

        function active_input() {
            var target = event.currentTarget;

            if ($(target).prop('checked')) {
                $(target).siblings('input').prop('disabled', false);
            } else {
                $(target).siblings('input').prop('disabled', true);
            }
        }
    </script>

    <script class="be-reload">
        var variants = [];

        $('#form').submit(function () {
            event.preventDefault();

            $('.disable-on-ajax').prop('disabled', true);
            $('#form').append(`<textarea name="productVariants" class="hidden">${JSON.stringify(variants)}</textarea>`);
            var data = new FormData($('#form')[0]);
            data.set('description', descriptionCKE.getData())

            $.ajax({
                type: "post",
                url: "{{ route('customer.dashboard.products.store') }}",
                data: data,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    "Accept": "application/json"
                },
                success: function (response) {
                    $('.disable-on-ajax').prop('disabled', false);

                    Toast.fire({
                        icon: 'success',
                        title: response.message
                    })

                    setTimeout(() => {
                        window.location.href = "{{ route('customer.dashboard.products.gallery.index', ':id') }}"
                            .replace(':id', response.id);
                    }, 1000);
                }, error: function(xhr, status, error) {
                    $('.disable-on-ajax').prop('disabled', false);

                    if (!xhr.responseJSON.errors) {
                        Toast.fire({
                            icon: 'error',
                            title: 'مشکلی پیش آمده دوباره امتحان کنید'
                        })
                    }

                    Object.entries(xhr.responseJSON.errors).forEach((error) => {
                        $('div.errors').text('')

                        setTimeout(() => {
                            $(`.${error[0]}-error`).text(error[1][0]);
                        }, 100);
                    });
                }
            });
        });

        function deleteProductVariants(key) {
            variants.splice(key, 1)
            $('.product-variants-table tbody tr').remove()

            variants.forEach((data, index) => {
                addToTable(data, index);
            })
        }

        function activeProductVariant(key) {
            variants.forEach((data, index) => {
                data.active = false;
            })
            variants[key].active = true;
        }

        function addToTable(data, key) {
            let variantsHtml = '';

            data.items.forEach((item) => {
                variantsHtml +=`
                <div>
                    <span>${item.label}:</span>
                    <span style="font-size: 1rem">${item.value}</span>
                </div>
                `
            })

            $('.product-variants-table tbody').append(`
                <tr>
                    <td style="vertical-align: baseline">
                        <input type="radio" onchange="activeProductVariant(${key})" name="activeVariant" id="">
                    </td>
                    <td>
                        <span>${data.price} تومان</spab>
                    </td>
                    <td>
                        ${data.number}
                    </td>
                    <td class="flex justify-between">
                        <div class="flex-wrap flex" style="gap: .8rem">`
                            + variantsHtml +
                        `</div>
                        <div>
                            <x-button type="button" class="bg-red-600" onclick="deleteProductVariants(${key})">
                                حذف
                            </x-button>
                        </div>
                    </td>
                </tr>
            `)
        }

        $('.add-to-product-variants').on('click', () => {
            let data = {};

            // add price
            let price = $('#price').val();

            if (price.length == 0) {
                $('.price-error').text('قیمت را وارد کنید.')
                return false;
            } else if (parseInt(price) < 1) {
                $('.price-error').text('قیمت باید بیشتر از صفر باشد.')
                return false;
            } else {
                $('.price-error').text('')
            }

            data.price = price;

            // add number
            let number = $('#number').val();

            if (number.length == 0) {
                $('.number-error').text('تعداد را وارد کنید.')
                return false;
            } else if (parseInt(number) < 1) {
                $('.number-error').text('تعداد باید بیشتر از صفر باشد.')
                return false;
            } else {
                $('.number-error').text('')
            }

            data.number = number;

            // add selectable variants
            data.items = [];

            let sections = Object.values($('.product-variant'))
            let hasError = false;
            sections.pop(); sections.pop();

            sections.every((item) => {
                let label = $(item).find('label').text().trim()
                let attribute_id = $(item).find('label').data('attribute-id')
                let value = $(item).find('select option:selected').text().trim();
                let mainValue = $(item).find('select').val();

                if (mainValue.length == 0) {
                    $(item).find('.error').find('span').text(` ${label} را انتخاب کنید.`);
                    hasError = true;
                    return false;
                } else {
                    $(item).find('.error').find('span').text('');
                }

                data.items.push({ label: label, attribute_id: attribute_id, value: value, mainValue: mainValue });
                return true;
            });

            if (hasError) {
                return false;
            }

            variants.push(data)
            addToTable(variants[variants.length - 1], variants.length - 1);

            be_reload();
        });

    </script>

@endsection
