@extends('admin.layouts.master')

@section('head-tag')
    <title>ویژگی های قابل انتخاب </title>
    <link rel="stylesheet" href="{{ asset('admin-assets/datatable/css/dataTables.min.css') }}">
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویژگی های قابل انتخاب </li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویژگی های قابل انتخاب
                    </h5>
                </section>

                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <div>
                        <a href="{{ route('admin.market.selectableMetas.create') }}" class="btn btn-info btn-sm">
                            ایجاد ویژگی  قابل انتخاب
                        </a>
                    </div>
                </section>

                <section class="table-responsive">
                    <table class="hover compact row-border display" id="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام     </th>
                                <th> مقادیر</th>
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

    @include('alerts.sweetalert.confirm')
    <script src="{{ asset('admin-assets/js/changeStatus.js') }}"></script>
    <script src="{{ asset('admin-assets/datatable/js/dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/limit.js') }}"></script>

    <script>
        $(document).ready( function () {
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
                        "data": "name",
                        "render": function(data, type, row, meta) {
                            return strlimit(data, 0, 15);
                        }
                    },
                    {
                        "data": "values",
                        "render": function(data, type, row, meta) {
                            values = '';

                            data.forEach((value, index) => {
                                console.log(value);
                                if (index > 2) {
                                    values += '...';
                                    return;
                                }

                                values += `- ${value.value} <br>`;
                            });

                            return values;
                        }
                    },
                    {
                        "render": function(data, type, row, meta) {
                            var editRoute = "{{ route('admin.market.selectableMetas.edit', ':id') }}";
                            var deleteRoute = "{{ route('admin.market.selectableMetas.destroy', ':id') }}";

                            return `
                                <section class="text-left">
                                    <a href="${editRoute.replace(':id', row.id)}"
                                        class="btn btn-primary btn-sm">
                                        <i class="fa fa-edit"></i> ویرایش
                                    </a>

                                    <form action="${deleteRoute.replace(':id', row.id)}"
                                        class="d-inline" method="post">
                                        @csrf
                                        @method('delete')
                                        <button
                                            class="btn btn-danger btn-sm"
                                            type="submit"
                                            onclick="confirm(event, 'به طور کامل پاک خواهد شد.')"
                                        >
                                            <i class="fa fa-trash-alt"></i>
                                            حذف
                                        </button>
                                    </form>
                                </section>`;
                        },
                        "orderable": false,
                    }
                ],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Persian.json"
                }
            });
        } );
    </script>
@endsection
