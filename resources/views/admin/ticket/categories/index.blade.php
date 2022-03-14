@extends('admin.layouts.master')

@section('head-tag')
    <title>دسته بندی تیکت ها</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/datatable/css/dataTables.min.css') }}">
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#"> خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#"> بخش تیکت ها</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> دسته بندی تیکت ها</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        دسته بندی تیکت ها
                    </h5>
                </section>

                <section class="pb-2 mt-4 mb-3 border-bottom">
                    <a href="{{ route('admin.ticket.categories.create') }}" class="btn btn-info btn-sm">
                        ایجاد دسته
                        بندی
                    </a>
                    <a href="{{ route('admin.ticket.categories.archive') }}" class="mx-2">
                        <u>آرشیو</u>
                    </a>
                </section>

                <section class="table-responsive">
                    <table id="table" style="width: 100%" class="hover compact display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام دسته بندی</th>
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
    <script src="{{ asset('admin-assets/js/changeStatus.js') }}"></script>
    @include('alerts.sweetalert.confirm')
    <script src="{{ asset('admin-assets/datatable/js/dataTables.min.js') }}"></script>

    <script>
        $(function() {
            $('#table').DataTable({
                "searchDelay": 1500,
                "processing": true,
                "serverSide": true,
                'ajax': "{{ route('admin.ticket.categories.index') }}",
                "columns": [{
                        "data": "id",
                        "render": function(data, type, row, meta) {
                            return meta.row + 1;
                        },
                        "searchable": false
                    },
                    {
                        "data": "name",
                    },
                    {
                        "data": "status",
                        "render": function(data, type, row, meta) {
                            var route = "{{ route('admin.ticket.categories.changeStatusstatus', ':id') }}"
                                .replace(':id', row.id);

                            var tag = `
                            <input
                                type="checkbox"
                                data-url="${route}"
                                onclick="changeStatus(event)"
                            `;

                            if (data) {
                                tag = tag + ' checked ';
                            }

                            return tag + ' >';
                        },
                        "searchable": false
                    },
                    {
                        "render": function(data, type, row, meta) {
                            var deleteRoute = "{{ route('admin.ticket.categories.destroy', ':id') }}"
                                .replace(':id', row.id);
                            var editRoute = "{{ route('admin.ticket.categories.edit', ':id') }}"
                                .replace(':id', row.id);

                            return `
                            <section class="text-left">
                                <a href="${editRoute}" class="btn btn-sm btn-info">
                                    <i class="fa fa-edit"></i>
                                    ویرایش
                                </a>
                                <form action="${deleteRoute}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" onclick="confirm(event)">
                                        <i class="fa fa-trash"></i>
                                        حذف
                                    </button>
                                </form>
                            </section>`;
                        },
                        "searchable": false,
                        "orderable": false,
                    }
                ],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Persian.json"
                }
            })
        });
    </script>
@endsection
