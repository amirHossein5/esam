@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش کالا</title>
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
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش کالا</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                  ویرایش کالا
                </h5>
            </section>

            <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                <a href="{{ route('admin.market.product.index') }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section>
                <form action="{{ route('admin.market.product.update', $product->id) }}" id="form" method="post" enctype="multipart/form-data">
                    @csrf @method('put')
                    <section class="row">

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="name">نام کالا</label>
                                <input type="text" id="name" name="name" value="{{ $product->name }}" class="form-control form-control-sm">

                                <div class="my-1 name-error errors font-weight-bold text-danger"></div>
                            </div>
                        </section>

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="introduction">توضیح مختصر</label>
                                <input type="text" name="introduction" value="{{ $product->introduction }}" id="introduction"  class="form-control form-control-sm">

                                <div class="my-1 introduction-error errors font-weight-bold text-danger"></div>
                            </div>
                        </section>


                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="image">تصویر </label>
                                <input type="file" id="image" name="image" class="form-control form-control-sm">

                                <div class="my-1">
                                    <img src="{{ asset($product->image['index']['medium']) }}" width="50" height="50" alt="">
                                </div>

                                <div class="my-1 image-error errors font-weight-bold text-danger"></div>
                            </div>
                        </section>

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <div>
                                    <label for="marketable">قابل فروش بودن</label>
                                    <select name="marketable" class="form-control" id="marketable">
                                        <option value="0" @selected($product->marketable == '0')>غیرفعال</option>
                                        <option value="1" @selected($product->marketable == '1')>فعال</option>
                                    </select>

                                </div>
                                <div class="my-1 marketable-error errors font-weight-bold text-danger"></div>
                            </div>
                        </section>

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <div>
                                    <label for="tags">تگ ها</label>
                                    <input type="hidden" id="tags" name="tags" value="{{ $product->tags }}">
                                    <select class="form-control" id="select2" style="width: 100%" multiple></select>

                                </div>

                                <div class="my-1 tags-error errors font-weight-bold text-danger"></div>
                            </div>
                        </section>

                       <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="">تاریخ انتشار</label>
                                <input type="text" id="view-date-picker" class="form-control direction-ltr form-control-sm">
                                <input type="text" class="d-none" value="{{ $product->published_at }}" id="main-date-picker" name="published_at">

                                <div class="my-1 published_at-error errors font-weight-bold text-danger"></div>
                            </div>
                        </section>

                        <section class="col-12">
                            <div class="form-group">
                                <label for="description">توضیحات</label>
                                <textarea name="description" id="description"  class="form-control form-control-sm" rows="6">{{ $product->description }}</textarea>

                                <div class="my-1 description-error errors font-weight-bold text-danger"></div>
                            </div>
                        </section>

                    </section>

                    @if ($productCategory->attributes()->exists())
                        <section class="py-3 my-3 border-bottom border-top">
                            <h6>خصوصیات</h6>
                            <div class="my-3 attributeValues-error font-weight-bold errors text-danger"></div>

                            <x-product.show-attributes
                                :model="$productCategory"
                                :attributeValues="$product->attributeValues->pluck('value_id')->toArray()"
                            />
                        </section>
                    @endif


                    <h6 class="pt-3">نوع فروش</h6>

                    <section class="py-2 mb-3 row">
                        <div class="my-1 sell_type_id-error errors text-danger"></div>

                        @foreach ($sellTypes as $sellType)
                            <section class="col-12 col-md-6">
                                <input
                                    type="radio"
                                    id="sellType-{{ $sellType->id }}"
                                    name="sell_type_id"
                                    class="d-none"
                                    value="{{ $sellType->id }}"
                                    @checked($sellType->id == $product->sell_type_id)
                                />
                                <label
                                    for="sellType-{{ $sellType->id }}"
                                    class="btn btn-outline-info btn-sm click-btn-info toggle-section "
                                    style="width: 100%"
                                    data-id="{{ $sellType->name }}"
                                >
                                    {{ $sellType->persian_name }}
                                </label>
                            </section>
                        @endforeach

                        <section class="mt-2 mb-4 col-12" style="font-size: .875rem">
                            زمان ارسال:
                            <span>تا {{ '48' }} ساعت کاری</span>
                            <p class="mt-1 text-success">جهت تغییر زمان ارسال با مراجعه به پروفایل کاربری تنظیمات زمان ارسال را تغییر دهید.</p>
                        </section>

                        <section class="col-12 row" id="{{ $sellTypes[0]->name }}" style="display: none">
                            <section class="col-12 ">
                                <div class="form-group">
                                    <input type="hidden" name="has_request_for_discount" value="0">

                                    <input type="checkbox" name="has_request_for_discount" value="1" id="has_request_for_discount" @checked($product->has_request_for_discount)>

                                    <label for="has_request_for_discount">تخفیف هم میدهم</label>

                                    <div class="my-1 has_request_for_discount-error errors  font-weight-bold text-danger"></div>
                                </div>
                            </section>

                            @foreach ($selectableValues as $values)
                                <section class="col-12 ">

                                    <div class="form-group product-variant">
                                        <label for="" data-attribute-id="{{ $values[0]['selectable_attribute']['id'] }}">
                                            {{ $values[0]['selectable_attribute']['name'] }}
                                        </label>

                                        <select name="" id=""
                                            class="form-control form-control-sm select2-class" style="width: 100%">
                                            <option value="">انتخاب</option>

                                            @foreach ($values as $value)
                                                <option value="{{ $value['id'] }}">
                                                    {{ $value['value'] }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <div class="my-1 error">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>

                                </section>
                            @endforeach

                            @if (!$productCategory->selectableValues()->exists() and !$product->auction()->exists())
                                <section class="col-12">
                                    <div class="form-group">
                                        <label for="">تعداد</label>

                                        <input
                                            type="text"
                                            id="number"
                                            name="number"
                                            class="form-control form-control-sm"
                                            value="{{ $product->variants->first()->marketable_number }}"
                                        >

                                        <div class="my-1 number-error errors font-weight-bold text-danger"></div>
                                    </div>
                                </section>

                                <section class="col-12">
                                    <div class="form-group">
                                        <label for="price">قیمت هر عدد (تومان)</label>

                                        <input
                                            type="text"
                                            id="price"
                                            name="price"
                                            class="form-control form-control-sm"
                                            value="{{ $product->variants->first()->price_readable }}"
                                        >

                                        <div class="my-1 price-error errors font-weight-bold text-danger"></div>

                                    </div>
                                </section>
                            @else
                                <section class="col-12">
                                        <div class="form-group">
                                            <label for="">تعداد</label>
                                            <input type="text" id="number" name="number" class="form-control form-control-sm">

                                            <div class="my-1 number-error errors font-weight-bold text-danger"></div>
                                        </div>
                                    </section>

                                    <section class="col-12">
                                        <div class="form-group">
                                            <label for="price">قیمت هر عدد (تومان)</label>
                                            <input type="text" id="price" name="price"  class="form-control form-control-sm">

                                            <div class="my-1 price-error errors font-weight-bold text-danger"></div>

                                        </div>
                                    </section>
                            @endif

                            @if ($productCategory->selectableValues()->exists())
                                <section class="mt-1 col-12">
                                    <h6 style="font-size: .875rem">حداقل یک قیمت باید برای کالا ثبت کنید.</h6>
                                    <button type="button" class="btn btn-success btn-sm add-to-product-variants">  ثبت قیمت</button>
                                    <div class="my-2 productVariants-error errors font-weight-bold text-danger "></div>
                                    <p class="mt-2 add-to-variant-error text-danger"></p>

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

                        <section class="col-12 row" id="{{ $sellTypes[1]->name }}" style="display: none">
                            <section class="col-12">
                                <div class="form-group">
                                    <label for="start_price">شروع قیمت از   (تومان)</label>
                                    <input type="text" id="start_price" name="start_price" value="{{ $product->auction?->start_price_readable }}"  class="form-control form-control-sm">

                                    <div class="my-1 start_price-error errors font-weight-bold text-danger"></div>

                                </div>
                            </section>

                            <section class="col-12">
                                <div class="form-group">

                                    <label for="">مدت</label>
                                    <select name="auction_period_id" id="auction_period_id"  class="form-control form-control-sm select2-class" style="width: 100%">
                                        <option value="">انتخاب</option>

                                        @foreach ($auction_periods as $period)
                                            <option
                                                value="{{ $period->id }}"
                                                @selected($period->id ==$product->auction?->period_id)
                                            >
                                                {{ $period->fa }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <div class="my-1 auction_period_id-error errors font-weight-bold text-danger"></div>
                                </div>
                            </section>

                            <section class="col-12">
                                <div class="form-group">
                                    <label for="">تاریخ شروع</label>
                                    <input type="text" id="start_auction_view"  class="form-control direction-ltr form-control-sm">
                                    <input type="text" class="d-none" name="start_date" id="start_auction_main"
                                    value="{{ $product->auction?->start_date }}">

                                    <div class="my-1 start_date-error errors font-weight-bold text-danger"></div>

                                </div>
                            </section>

                            <section class="col-12">
                                <div class="form-group">
                                    <input type="checkbox" id="urgent_price" onchange="active_input()"
                                    @checked($product->auction?->urgent_price)>
                                    <label for="urgent_price">  قیمت فروش فوری (تومان)</label>

                                    <input type="text" name="urgent_price"  class="form-control form-control-sm"
                                    @disabled(!$product->auction?->urgent_price) value="{{ $product->auction?->urgent_price_readable }}">

                                    <p class="my-1 text-success" style="font-size: .875rem">
                                        تا زمانی که سقف پیشنهادات مزایده به نصف این قیمت نرسیده باشد کاربران می توانند کالا را با این قیمت خریداری کنند.
                                    </p>

                                    <div class="my-1 urgent_price-error errors font-weight-bold text-danger"></div>
                                </div>
                            </section>


                            <section class="col-12">
                                <div class="form-group">
                                    <input type="checkbox" id="reserved_price" onchange="active_input()"
                                    @checked($product->auction?->reserved_price)>
                                    <label for="reserved_price">  قیمت  رزرو (تومان)</label>

                                    <input type="text" name="reserved_price"  class="form-control form-control-sm"
                                    @disabled(!$product->auction?->reserved_price) value="{{ $product->auction?->reserved_price_readable }}">

                                    <p class="my-1 text-success" style="font-size: .875rem">
                                        اگر قیمت های مزایده به این قیمت نرسد شما میتوانید محصول را ارسال نکنید.
                                    </p>

                                    <div class="my-1 reserved_price-error errors font-weight-bold text-danger"></div>
                                </div>
                            </section>


                        </section>

                    </section>


                        <section class="mt-5">
                            <button class="btn btn-primary btn-sm disable-on-ajax" type="submit">
                                گالری کالا - مرحله بعد
                            </button>
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
        $(function () {
            $('.click-btn-info').click(function() {
                $('.click-btn-info').removeClass('btn-info');
                $('.click-btn-info').removeClass('text-white');
                $(this).addClass('btn-info');
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
            $('[data-id="{{ $product->sellType->name }}"]')[0].click()
            $($('[data-id="{{ $product->sellType->name }}"]')[0]).addClass('text-white')
        })
    </script>

    <script>
        $(document).ready(function () {
            var dp = $("#view-date-picker").pDatepicker(datePickerOptions());
            var time = null;
            var mainDatePickerValue = $("#main-date-picker").attr("value");

            if (mainDatePickerValue) {
                if (mainDatePickerValue.split("-").length !== 1) {
                    time = Date.parse(mainDatePickerValue);
                } else {
                    time = parseInt(mainDatePickerValue);
                }
            }

            dp.setDate(time);

            var dp = $("#start_auction_view").pDatepicker(datePickerOptions('#start_auction_main'));
            var time = null;
            var mainDatePickerValue = $("#start_auction_main").attr("value");

            if (mainDatePickerValue) {
                if (mainDatePickerValue.split("-").length !== 1) {
                    time = Date.parse(mainDatePickerValue);
                } else {
                    time = parseInt(mainDatePickerValue);
                }
            }

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
        var variants = JSON.parse('{!! $jsProductVariants !!}');

        $('#form').submit(function () {
            event.preventDefault();

            $('.disable-on-ajax').prop('disabled', true);
            $('#form').append(`<textarea name="productVariants" class="d-none">${JSON.stringify(variants)}</textarea>`);
            var data = new FormData($('#form')[0]);
            data.set('description', descriptionCKE.getData())

            $.ajax({
                type: "post",
                url: "{{ route('admin.market.product.update', $product->id) }}",
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
                        window.location.href = "{{ route('admin.market.product.gallery.index', ':id') }}"
                            .replace(':id', response.id);
                    }, 1000);
                }, error: function(xhr, status, error) {
                    Object.entries(xhr.responseJSON.errors).forEach((error) => {
                        $('div.errors').text('')

                        setTimeout(() => {
                            $('.disable-on-ajax').prop('disabled', false);
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

            let isChecked = data.active
                ? 'checked'
                : '';

            $('.product-variants-table tbody').append(`
                <tr>
                    <td style="vertical-align: baseline">
                        <input type="radio" onchange="activeProductVariant(${key})" ${isChecked} name="activeVariant" id="">
                    </td>
                    <td>
                        <span>${data.price} تومان</spab>
                    </td>
                    <td>
                        ${data.number}
                    </td>
                    <td class="d-flex justify-content-between">
                        <div class="flex-wrap d-flex" style="gap: .8rem">`
                            + variantsHtml +
                        `</div>
                        <div>
                            <button type="button" class="btn btn-danger btn-sm" onclick="deleteProductVariants(${key})">
                                حذف
                            </button>
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

    <script>
        variants.forEach((data, index) => {
            addToTable(data, index);
        })
    </script>

@endsection
