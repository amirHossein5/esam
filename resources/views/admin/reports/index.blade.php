@extends('admin.layouts.master')

@section('head-tag')
    <title>{{ $reportMod }}</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/datatable/css/dataTables.min.css') }}">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">پشتیبانی ها</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page">{{ $reportMod }}</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        {{ $reportMod }}
                    </h5>
                </section>

                <section class="my-3 table-responsive">
                    <table id="table" style="width: 100%" class="hover compact display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان </th>
                                <th>نام محصول</th>
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
                        "data": "title",
                        "render": function(data, type, row, meta) {
                            return strlimit(data , 0, 15);
                        }
                    },
                    {
                        "data": "product.name",
                        "render": function(data, type, row, meta) {
                            return strlimit(data , 0, 20);
                        },
                    },
                    {
                        "render": function(data, type, row, meta) {
                            var toggleDisableProductRoute = "{{ route('admin.reports.toggleDisableProduct', ':id')}}"
                                .replace(':id', row.id);
                            var showRoute = "{{ route('admin.reports.show', ':id') }}"
                                .replace(':id', row.id)
                            var showProductRoute = "{{ route('customer.product.item', [':id', ':slug']) }}"
                                .replace(':id', row.product.id)
                                .replace(':slug', row.product.slug)
                            var buttonText = row.product.disabled_for_report == "{{ App\Models\Market\Product::DISABLE_FOR_REPORT }}"
                                ? 'باز کردن'
                                : 'بستن';
                            var buttonClass = row.product.disabled_for_report == "{{ App\Models\Market\Product::DISABLE_FOR_REPORT }}"
                                ? 'warning'
                                : 'danger';


                            return `
                                <section class="text-left">

                                    @can('toggleProduct', \App\Models\Report::class)
                                        <form action="${toggleDisableProductRoute}" method="post" class="d-inline">
                                            @csrf @method('put')

                                            <button
                                                class="btn btn-${buttonClass} btn-sm"
                                            >
                                                ${buttonText}
                                            </button>
                                        </form>
                                    @endcan

                                    <a
                                        href="${showRoute}"
                                        class="btn btn-success btn-sm"
                                    >
                                        مشاهده گزارش
                                    </a>

                                    <a
                                        href="${showProductRoute}"
                                        class="btn btn-secondary btn-sm"
                                    >
                                        مشاهده محصول
                                    </a>

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
        function changeStatus(event, message) {
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
