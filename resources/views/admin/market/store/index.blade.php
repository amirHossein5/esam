@extends('admin.layouts.master')

@section('head-tag')
    <title>انبار</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/datatable/css/dataTables.min.css') }}">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> انبار</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        انبار
                    </h5>
                </section>

                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="" class="btn btn-info btn-sm disabled">ایجاد انبار جدید</a>
                </section>

                <section class="table-responsive">
                    <table id="table" style="width: 100%" class="hover compact display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام کالا</th>
                                <th>تصویر کالا</th>
                                <th>موجودی</th>
                                <th>فروخته شده</th>
                                <th>رزرو شده</th>
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

    <script>
        $(function () {
            $('#table').DataTable({
                "searchDelay": 1500,
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('admin.market.store.index') }}",
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
                        "data": "image",
                        "render": function(data, type, row, meta) {
                            if (data) {
                                var assetRoute = "{{ asset(':asset') }}"
                                    .replace(':asset', data.index.medium);
                            }
                            return `<img src="${assetRoute}" class="max-height-2rem">`;
                        },
                        "searchable": false,
                        "orderable": false
                    },
                    {
                        "data": "marketable_number"
                    },
                    {
                        "data": "sold_number"
                    },
                    {
                        "data": "frozen_number"
                    },
                    {
                        "render": function(data, type, row, meta) {
                            var addToStoreRoute = "{{ route('admin.market.store.addToStore', ':id') }}"
                                .replace(':id', row.id);
                            var editRoute = "{{ route('admin.market.store.edit', ':id') }}"
                                .replace(':id', row.id);

                            return `
                                <section class="text-left">
                                        <a href="${addToStoreRoute}" class="btn btn-sm btn-info  text-right">
                                            <i class="fa fa-angle-double-up"></i>
                                            اضافه کردن به موجودی
                                        </a>
                                        <a href="${editRoute}" class="btn btn-sm btn-warning text-right">
                                            <i class="fa fa-edit"></i>
                                            ویرایش موجودی
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

@endsection
