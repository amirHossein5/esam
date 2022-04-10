@extends('admin.layouts.master')

@section('head-tag')
    <title>{{ $supportMod }}</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/datatable/css/dataTables.min.css') }}">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">پشتیبانی ها</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page">{{ $supportMod }}</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        {{ $supportMod }}
                    </h5>
                </section>

                <section class="my-3 table-responsive">
                    <table id="table" style="width: 100%" class="hover compact display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان </th>
                                <th>نام محصول</th>
                                <th>وضعیت</th>
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
                            return strlimit(data , 0, 15);
                        },
                    },
                    {
                        "data": "status_readable",
                        "render": function(data, type, row, meta) {
                            return strlimit(data , 0, 15);
                        },
                    },
                    {
                        "render": function(data, type, row, meta) {
                            var changeStatusRoute = "{{ route('admin.support.changeStatus', ':id')}}"
                                .replace(':id', row.id);
                            var showRoute = "{{ route('admin.support.show', ':id') }}"
                                .replace(':id', row.id)
                            var buttonText = row.status == "{{ App\Models\Support::OPEN }}"
                                ? 'بستن'
                                : 'باز کردن';
                            var buttonClass = row.status == "{{ App\Models\Support::OPEN }}"
                                ? 'danger'
                                : 'warning';


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
                                        class="btn btn-${buttonClass} btn-sm"
                                        data-url=${changeStatusRoute}
                                        onclick="changeStatus(event, 'باموفقیت وضعیت تغییر داده شد. ')"
                                    >
                                        ${buttonText}
                                    </button>

                                    <a
                                        href="${showRoute}"
                                        class="btn btn-success btn-sm"
                                    >
                                        پاسخ
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
