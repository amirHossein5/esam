@extends('admin.layouts.master')

@section('head-tag')
    <title>ادمین ها</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/datatable/css/dataTables.min.css') }}">
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ادمین ها</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ادمین ها
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.user.admin-user.create') }}" class="btn btn-info btn-sm">ایجاد ادمین </a>
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
                                <th>نقش</th>
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
    <script src="{{ asset('admin-assets/js/limit.js') }}"></script>
    <script src="{{ asset('admin-assets/js/changeStatus.js') }}"></script>
    <script src="{{ asset('admin-assets/datatable/js/dataTables.min.js') }}"></script>

    <script>
        $(function() {
            $('#table').DataTable({
                "searchDelay": 1500,
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('admin.user.admin-user.index') }}",
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
                        "data": "role.name",
                        "render": function(data, type, row, meta) {
                            return strlimit(data ?? '-', 0, 20)
                        }
                    },
                    {
                        "data": "status",
                        "render": function(data, type, row, meta) {
                            var route = "{{ route('admin.user.admin-user.status', ':id') }}"
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
                            var permissionsRoute = "{{ route('admin.user.admin-user.permissions', ':id') }}"
                                .replace(':id', row.id);
                            var editRoute = "{{ route('admin.user.admin-user.edit', ':id') }}"
                                .replace(':id', row.id);
                            var deleteRoute = "{{ route('admin.user.admin-user.destroy', ':id') }}"
                                .replace(':id', row.id);

                            return  `
                            <section class="text-left">
                                <a href="${permissionsRoute}" class="btn btn-sm btn-warning">
                                    <i class="fa fa-lock"></i>
                                    دسترسی ها
                                </a>
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
@endsection
