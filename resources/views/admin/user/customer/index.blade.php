@extends('admin.layouts.master')

@section('head-tag')
    <title>مشتری ها</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/datatable/css/dataTables.min.css') }}">
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> مشتری ها</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        مشتری ها
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.user.customer.create') }}" class="btn btn-info btn-sm">ایجاد مشتری </a>
                </section>

                <section class="table-responsive">
                    <table id="table" style="width: 100%" class="hover compact display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ایمیل</th>
                                <th>شماره موبایل</th>
                                <th>نام</th>
                                <th>نام خانوادگی</th>
                                <th>وضعیت</th>
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
    @include('alerts.sweetalert.confirm')
    <script src="{{ asset('admin-assets/js/changeStatus.js') }}"></script>
    <script src="{{ asset('admin-assets/datatable/js/dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/toastAlerts.js') }}"></script>

    <script>
        $(function() {
            $('#table').DataTable({
                "searchDelay": 1500,
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('admin.user.customer.index') }}",
                "columns": [
                    {
                        "data" : 'id',
                        "render": function(data, type, row, meta) {
                            return meta.row + 1;
                        },
                        "searchable": false
                    },
                    { "data": "email", "orderable": false },
                    { "data": "mobile", "orderable": false },
                    { "data": "first_name" },
                    { "data": "last_name" },
                    {
                        "data": "status",
                        "render": function(data, type, row, meta) {
                            var route = "{{ route('admin.user.customer.status', ':id') }}"
                                .replace(':id', row.id);

                            var tag = `
                                <input
                                    type="checkbox"
                                    data-url="${route}"
                                    onclick="changeStatus(event)"`;

                            if (data) {
                                tag = tag + ' checked';
                            }

                            return tag + `>`;
                        },
                        "searchable": false,
                    },
                    {
                        "searchable": false,
                        "orderable": false,
                        "render": function(data, type, row, meta) {
                            var editRoute = "{{ route('admin.user.customer.edit', ':id') }}"
                                .replace(':id', row.id);
                            var deleteRoute = "{{ route('admin.user.customer.destroy', ':id') }}"
                                .replace(':id', row.id);
                            var upgradeToAdminRoute = "{{ route('admin.user.customer.upgradeToAdmin', ':id') }}"
                                .replace(':id', row.id);

                            return  `
                            <section class="text-left">
                                <button
                                    type="submit"
                                    onclick="upgradeToAdmin(event)"
                                    data-url="${upgradeToAdminRoute}"
                                    class="btn btn-sm btn-secondary"
                                >
                                    <i class="fas fa-angle-double-up"></i>
                                    ارتقا به ادمین
                                </button>
                                <a href="${editRoute}" class="btn btn-sm btn-info">
                                    <i class="fa fa-edit"></i>
                                    ویرایش
                                </a>
                                <form action="${deleteRoute}" class="d-inline" method="post">
                                    @csrf
                                    @method('delete')

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-danger"
                                        onclick="confirm(event, 'به طور کامل پاک خواهد شد.')"
                                    >
                                        <i class="fa fa-trash"></i>
                                        حذف
                                    </button>
                                </form>
                            </section>
                            `;
                        }
                    }
                ],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Persian.json"
                }
            });
        })
    </script>

    <script>
        function upgradeToAdmin () {
            $.ajax({
                "headers": {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                "url": $(event.currentTarget).data('url'),
                "method": "put",
                "success": function () {
                    sendSuccessToastAlert('ارتقا یافت');
                    $('#table').DataTable().draw();
                },
                "error": function () {
                    sendErrorToastAlert('مشکلی پیش آمده دوباره امتحان کنید');
                    $('#table').DataTable().draw();
                },
            })
        }
    </script>
@endsection
