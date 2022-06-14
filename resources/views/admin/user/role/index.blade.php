@extends('admin.layouts.master')

@section('head-tag')
    <title>نقش ها</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/datatable/css/dataTables.min.css') }}">
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> نقش ها</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        نقش ها
                    </h5>
                </section>

                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.user.role.create') }}" class="btn btn-info btn-sm">ایجاد نقش جدید</a>
                </section>

                <section class="table-responsive">
                    <table id="table" style="width: 100%" class="hover compact display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام نقش </th>
                                <th>دسترسی ها</th>
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
    <script src="{{ asset('admin-assets/datatable/js/dataTables.min.js') }} "></script>
    <script src="{{ asset('admin-assets/js/limit.js') }} "></script>
    @include('alerts.sweetalert.confirm')

    <script>
        $(function () {
            $('#table').DataTable({
                "searchDelay": 1500,
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('admin.user.role.index') }}",
                "columns": [
                    {
                        "data": "id",
                        "render": function(data, type, row, meta) {
                            return meta.row + 1;
                        },
                        "searchable": false
                    },
                    {
                        "data": "name",
                        "render": function(data, type, row, meta) {
                            return strlimit(data, 0, 20);
                        }
                    },
                    {
                        "data": "permissions",
                        "render": function(data, type, row, meta) {
                            var permissions = '';

                            data.every((permission, index) => {
                                index = index + 1;

                                if (index > 3) {
                                    permissions += '...';
                                    return false;
                                }

                                permissions += `${index}- ${permission.description} <br>`;

                                return true;
                            });

                            return permissions ? permissions : '-';
                        },
                        "orderable": false
                    },
                    {
                        "render": function(data, type, row, meta) {
                            var editRoute = "{{ route('admin.user.role.edit', ':id')}}"
                                .replace(':id', row.id);
                            var deleteAction = "{{ route('admin.user.role.destroy', ':id')}}}"
                                .replace(':id', row.id);

                            return `
                                <section class="text-left">
                                    <a href="${editRoute}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-edit"></i> ویرایش
                                    </a>
                                    <form class="d-inline" method="post" action="${deleteAction}">
                                        @csrf
                                        @method('delete')
                                        <button
                                            class="btn btn-danger btn-sm"
                                            type="submit"
                                            onclick="confirm(event, '   پاک خواهد شد.')"
                                        >
                                            <i class="fa fa-trash-alt"></i>
                                            حذف
                                        </button>
                                    </form>
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

@endsection
