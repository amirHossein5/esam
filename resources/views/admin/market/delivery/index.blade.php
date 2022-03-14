@extends('admin.layouts.master')

@section('head-tag')
    <title>روش های ارسال</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/datatable/css/dataTables.min.css') }}">
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> روش های ارسال </li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        روش های ارسال
                    </h5>
                </section>

                <section class="pb-2 mt-4 mb-3 d-flex align-items-center border-bottom">
                    <a href="{{ route('admin.market.delivery.create') }}" class="btn btn-info btn-sm">ایجاد روش     ارسال جدید
                    </a>

                    <a href="{{ route('admin.market.delivery.archive') }}" class="mx-2">
                        <u>آرشیو</u>
                    </a>
                </section>

                <section class="table-responsive">
                    <table id="table" style="width: 100%" class="hover compact display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام روش ارسال</th>
                                <th>هزینه ارسال</th>
                                <th>زمان ارسال</th>
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
    @include('alerts.sweetalert.confirm')
    <script src="{{ asset('admin-assets/js/limit.js') }}"></script>

    <script>
        $(function () {
            $('#table').DataTable({
                "searchDelay": 1500,
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('admin.market.delivery.index') }}",
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
                            return strlimit(data , 0, 15);
                        },
                    },
                    {
                        "data": "amount",
                        "render": function(data, type, row, meta) {
                            return data + ' تومان';
                        }
                    },
                    {
                        "data": "delivery_send_time",
                        "render": function(data, type, row, meta) {
                            return strlimit(data , 0, 15);
                        },
                    },
                    {
                        "render": function(data, type, row, meta) {
                            var editRoute = "{{ route('admin.market.delivery.edit', ':id')}}"
                                .replace(':id', row.id);
                            var deleteRoute = "{{ route('admin.market.delivery.destroy', ':id')}}"
                                .replace(':id', row.id);

                            return `
                                <section class="text-left">

                                    <a href="${editRoute}" class="btn btn-sm btn-info">
                                        <i class="fa fa-edit"></i>
                                        ویرایش
                                    </a>

                                    <form class="d-inline" action="${deleteRoute}" method="post">
                                        @csrf
                                        @method('delete')

                                        <button
                                            class="btn btn-danger btn-sm"
                                            type="submit"
                                            onclick="confirm(event)"
                                        >
                                            <i class="fa fa-trash"></i>
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
