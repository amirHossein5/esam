@extends('admin.layouts.master')

@section('head-tag')
    <title>آرشیو کالاها</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/datatable/css/dataTables.min.css') }}">
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> آرشیو کالاها</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        آرشیو کالاها
                    </h5>
                </section>

                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.market.product.index') }}" class="btn btn-info btn-sm">بازگشت </a>
                </section>

                <section class="table-responsive" style="min-height: 30rem;">
                    <table id="table" style="width: 100%" class="hover compact display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام کالا</th>
                                <th> حالت فروش</th>
                                <th> تصویر کالا</th>
                                <th>دسته </th>
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
                "ajax": "{{ route('admin.market.product.archive') }}",
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
                        "data": "auction_exists",
                        "render": function(data, type, row, meta) {
                            return data
                                ? 'مزایده'
                                : 'فروش';
                        }
                    },
                    {
                        "data": "image",
                        "render": function(data, type, row, meta) {
                            if (data) {
                                var assetRoute = "{{ asset(':asset') }}"
                                    .replace(':asset', data.index);
                            }
                            return `<img src="${assetRoute}" class="max-height-2rem">`;
                        },
                        "searchable": false,
                        "orderable": false
                    },
                    {
                        "data": "product_category.name",
                        "render": function(data, type, row, meta) {
                            return strlimit(data , 0, 15);
                        }
                    },
                    {
                        "render": function(data, type, row, meta) {
                            var restoreRoute = "{{ route('admin.market.product.restore', ':id')}}"
                                .replace(':id', row.id);
                            var forceDeleteRoute = "{{ route('admin.market.product.forceDelete', ':id')}}"
                                .replace(':id', row.id);

                            return `
                                <section class="text-left">
                                    <div class="dropdown">
                                        <a href="" class="btn btn-success btn-sm btn-block dorpdown-toggle" role="button"
                                            id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-tools"></i> عملیات
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <form action="${restoreRoute}" method="POST">
                                                @csrf @method('put')
                                                <button
                                                    type="submit"
                                                    class="text-right dropdown-item"
                                                >
                                                    <i class="fa fa-trash-restore"></i>
                                                     بازگردانی
                                                </button>
                                            </form>
                                            <form action="${forceDeleteRoute}" method="POST">
                                                @csrf @method('delete')
                                                <button
                                                    type="submit"
                                                    class="text-right dropdown-item"
                                                    onclick="confirm(event, 'به طور کامل پاک خواهد شد.')"
                                                >
                                                    <i class="fa fa-window-close"></i>
                                                     حذف
                                                </button>
                                            </form>
                                        </div>
                                    </div>
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
