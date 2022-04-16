@extends('admin.layouts.master')

@section('head-tag')
    <title>{{ $orderType }}</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/datatable/css/dataTables.min.css') }}">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> {{ $orderType }}</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        {{ $orderType }}
                    </h5>
                </section>

                <section class="table-responsive mt-4 " style="min-height: 30rem">
                    <table id="table" style="width: 100%" class="hover compact display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>کد سفارش</th>
                                <th>مبلغ سفارش</th>
                                <th>مبلغ تخفیف</th>
                                <th>مبلغ نهایی</th>
                                <th>وضعیت پرداخت</th>
                                <th>شیوه پرداخت</th>
                                <th>بانک</th>
                                <th>وضعیت ارسال</th>
                                <th>هزینه  ارسال</th>
                                <th>وضعیت سفارش</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </section>

            </section>
        </section>
    </section>
@endsection

@section('script')
    <script src="{{ asset('admin-assets/datatable/js/dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/limit.js') }}"></script>
    <script src="{{ asset('admin-assets/js/toastAlerts.js') }}"></script>

    <script>
        $(function () {
            $('#table').DataTable({
                "searchDelay": 1500,
                "processing": true,
                "serverSide": true,
                "ajax": "{{ url()->current() }}",
                "columns": [
                    {
                        "data": "id",
                        "render": function(data, type, row, meta) {
                            return meta.row + 1;
                        },
                        "searchable": false
                    },
                    {
                        "data": "id",
                    },
                    {
                        "data": "order_final_amount",
                        "render": function(data, type, row, meta) {
                            return  row.order_final_amount_readable;
                        }
                    },
                    {
                        "data": "order_discount_amount",
                        "render": function(data, type, row, meta) {
                            return  row.order_discount_amount_readable;
                        }
                    },
                    {
                        "data": "order_final_amount",
                        "render": function(data, type, row, meta) {
                            return  data - row.order_discount_amount;
                        }
                    },
                    {
                        "data": "payment.status_readable",
                        "render": function(data, type, row, meta) {
                            return strlimit(data , 0, 10);
                        }
                    },
                    {
                        "data": "payment.payment_type.fa_name",
                        "render": function(data, type, row, meta) {
                            return strlimit(data , 0, 10);
                        }
                    },
                    {
                        "data": "payment.paymentable.gateway",
                        "render": function(data, type, row, meta) {
                            return data ? strlimit(data , 0, 10) : '-';
                        }
                    },
                    {
                        "data": "delivery_status_readable",
                        "render": function(data, type, row, meta) {
                            return strlimit(data , 0, 10);
                        }
                    },
                    {
                        "data": "delivery_amount",
                        "render": function(data, type, row, meta) {
                            return strlimit(data , 0, 10);
                        }
                    },
                    {
                        "data": "order_status_readable",
                        "render": function(data, type, row, meta) {
                            return strlimit(data , 0, 10);
                        }
                    },
                    {
                        "render": function(data, type, row, meta) {
                            var showRoute = "{{ route('admin.market.order.show', ':id')}}"
                                .replace(':id', row.id);

                            var notSentRoute = "{{ route('admin.market.order.orderNotSent', ':id')}}"
                                .replace(':id', row.id);
                            var sentRoute = "{{ route('admin.market.order.orderSent', ':id')}}"
                                .replace(':id', row.id);
                            var receivedRoute = "{{ route('admin.market.order.orderReceived', ':id')}}"
                                .replace(':id', row.id);
                            var isSendingRoute = "{{ route('admin.market.order.orderIsSending', ':id')}}"
                                .replace(':id', row.id);

                            var waitingForAcceptRoute = "{{ route('admin.market.order.waitingForAccept', ':id')}}"
                                .replace(':id', row.id);
                            var acceptedRoute = "{{ route('admin.market.order.accepted', ':id')}}"
                                .replace(':id', row.id);
                            var notAcceptedRoute = "{{ route('admin.market.order.notAccepted', ':id')}}"
                                .replace(':id', row.id);

                            // payment status
                            var paymentStatusRoute =
                                "{{ route('admin.market.order.payment.changeStatus', [':order', ':status'])}}"
                                .replace(':order', row.id)

                            return `
                                <section class="text-left">
                                    <div class="dropdown">
                                        <a href="" class="btn btn-success btn-sm btn-block dorpdown-toggle" role="button"
                                            id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-tools"></i> عملیات
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a href="${showRoute}" class="dropdown-item text-right">
                                                <i class="fa fa-list-ul"></i>
                                                مشاهده فاکتور
                                            </a>
                                            <a href="${sentRoute}" class="dropdown-item text-right">
                                                <i class="fa fa-list-ul"></i>
                                                ارسال شده
                                            </a>
                                            <a href="${notSentRoute}" class="dropdown-item text-right">
                                                <i class="fa fa-list-ul"></i>
                                                ارسال نشده
                                            </a>
                                            <a href="${receivedRoute}" class="dropdown-item text-right">
                                                <i class="fa fa-list-ul"></i>
                                                دریافت شده
                                            </a>
                                            <a href="${isSendingRoute}" class="dropdown-item text-right">
                                                <i class="fa fa-list-ul"></i>
                                                درحال ارسال
                                            </a>

                                            <a href="${notAcceptedRoute}" class="dropdown-item text-right">
                                                <i class="fa fa-list-ul"></i>
                                                تایید نشده
                                            </a>
                                            <a href="${acceptedRoute}" class="dropdown-item text-right">
                                                <i class="fa fa-list-ul"></i>
                                                تایید شده
                                            </a>
                                            <a href="${waitingForAcceptRoute}" class="dropdown-item text-right">
                                                <i class="fa fa-list-ul"></i>
                                                منتظر تایید
                                            </a>

                                            <a
                                                href="${paymentStatusRoute.replace(':status', 1)}"
                                                class="dropdown-item text-right"
                                            >
                                                <i class="fa fa-list-ul"></i>
                                                پرداخت شده
                                            </a>
                                            <a
                                                href="${paymentStatusRoute.replace(':status', 0)}"
                                                class="dropdown-item text-right"
                                            >
                                                <i class="fa fa-list-ul"></i>
                                                پرداخت نشده
                                            </a>
                                            <a
                                                href="${paymentStatusRoute.replace(':status', 3)}"
                                                class="dropdown-item text-right"
                                            >
                                                <i class="fa fa-list-ul"></i>
                                                برگشت داده شده
                                            </a>
                                            <a
                                                href="${paymentStatusRoute.replace(':status', 2)}"
                                                class="dropdown-item text-right"
                                            >
                                                <i class="fa fa-list-ul"></i>
                                                 باطل شده
                                            </a>
                                        </div>
                                    </div>
                                </section>
                            `;
                        },
                        "searchable": false,
                        "orderable": false,
                    }
                ],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Persian.json"
                }
            });
        });
    </script>

@endsection
