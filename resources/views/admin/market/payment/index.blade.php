@extends('admin.layouts.master')

@section('head-tag')
    <title>{{ $paymentType }}</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/datatable/css/dataTables.min.css') }}">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page">{{ $paymentType }}</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        {{ $paymentType }}
                    </h5>
                </section>

                <section class="my-3 table-responsive">
                    <table id="table" style="width: 100%" class="hover compact display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>مبلغ</th>
                                <th>بانک </th>
                                <th>پرداخت کننده</th>
                                <th>وضعیت پرداخت</th>
                                <th>نوع پرداخت</th>
                                <th class="text-center max-width-16-rem"><i class="fa fa-cogs"></i> تنظیمات</th>
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
                        "data": "amount",
                        "render": function(data, type, row, meta) {
                            return row.amount_readable + ' تومان';
                        }
                    },
                    {
                        "data": "paymentable.gateway",
                        "render": function(data, type, row, meta) {
                            if (data) {
                                return strlimit(data , 0, 15);
                            }
                            return '-';
                        },
                    },
                    {
                        "data": "user.fullName",
                        "render": function(data, type, row, meta) {
                            if (data) {
                                return strlimit(data , 0, 15);
                            }
                            return '-';
                        },
                    },
                    {
                        "data": "status_readable",
                        "render": function(data, type, row, meta) {
                            return strlimit(data , 0, 15);
                        },
                    },
                    {
                        "data": "payment_type.fa_name",
                        "render": function(data, type, row, meta) {
                            return strlimit(data , 0, 15);
                        },
                    },
                    {
                        "render": function(data, type, row, meta) {
                            var returnRoute = "{{ route('admin.market.payment.changeStatus', [':id', ':status'])}}"
                                .replace(':id', row.id)
                                .replace(':status', "{{ App\Models\Market\Payment::RETURNED }}");
                            var rejectRoute = "{{ route('admin.market.payment.changeStatus', [':id', ':status'])}}"
                                .replace(':id', row.id)
                                .replace(':status', "{{ App\Models\Market\Payment::REJECTED }}");
                            var paidRoute = "{{ route('admin.market.payment.changeStatus', [':id', ':status'])}}"
                                .replace(':id', row.id)
                                .replace(':status', "{{ App\Models\Market\Payment::PAID }}");
                            var notPaidRoute = "{{ route('admin.market.payment.changeStatus', [':id', ':status'])}}"
                                .replace(':id', row.id)
                                .replace(':status', "{{ App\Models\Market\Payment::NOTPAID }}");

                            return `
                                <section class="text-left">

                                    <button
                                        class="btn btn-primary btn-sm"
                                        style="display: none;"
                                        data-role="loader"
                                        disabled
                                    >
                                        <i class="fas fa-spinner fa-spin"></i>
                                    </button>

                                    <button
                                        class="btn btn-success btn-sm"
                                        data-url=${paidRoute}
                                        onclick="changeStatusPayment(event, 'باموفقیت وضعیت تغییر داده شد. ')"
                                    >
                                        پرداخت شده
                                    </button>

                                    <button
                                        class="btn btn-danger btn-sm"
                                        data-url=${notPaidRoute}
                                        onclick="changeStatusPayment(event, 'باموفقیت وضعیت تغییر داده شد. ')"
                                    >
                                        پرداخت نشده
                                    </button>

                                    <button
                                        class="btn btn-warning btn-sm"
                                        data-url=${returnRoute}
                                        onclick="changeStatusPayment(event, 'باموفقیت وضعیت تغییر داده شد. ')"
                                    >
                                        برگشت داده شده
                                    </button>

                                    <button
                                        class="m-1 btn btn-danger btn-sm"
                                        data-url=${rejectRoute}
                                        onclick="changeStatusPayment(event, 'باموفقیت وضعیت تغییر داده شد. ')"
                                    >
                                        باطل شده
                                    </button>

                                </section>
                            `;
                        },
                        "searchable": false,
                        "orderable": false
                    }
                ],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Persian.json"
                }
            });
        });
    </script>

    <script>
        function changeStatusPayment(event, message) {
            var target = event.target;
            var url = $(target).attr("data-url");

            $(target).hide();
            $(target).siblings('[data-role=loader]').show();

            $.ajax({
                type: "get",
                url: url,
                headers: {
                    Accept: "application/json",
                },
                success: function (response) {
                    $(target).siblings('[data-role=loader]').hide();
                    $(target).show();
                    sendSuccessToastAlert(message);
                    $('#table').DataTable().draw();
                },
                error: function () {
                    $(target).show();
                    $(target).siblings('[data-role=loader]').hide();
                    sendErrorToastAlert('مشکلی پیش آمده دوباره امتحان کنید');
                    $('#table').DataTable().draw();
                },
            });
        }
    </script>

@endsection
