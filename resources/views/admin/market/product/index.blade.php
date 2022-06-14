@extends('admin.layouts.master')

@section('head-tag')
    <title>کالاها</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/datatable/css/dataTables.min.css') }}">
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> کالاها</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        کالاها
                    </h5>
                </section>

                <section class="pb-2 mt-4 mb-3 d-flex align-items-center border-bottom">
                    <a href="{{ route('admin.market.product.create') }}" class="btn btn-info btn-sm">ایجاد کالای جدید </a>

                    @can('archiveViewAny', \App\Models\Market\Product::class)
                        <a href="{{ route('admin.market.product.archive') }}" class="mx-2">
                            <u>آرشیو</u>
                        </a>
                    @endcan

                </section>

                <section class="table-responsive" style="min-height: 30rem;">
                    <table id="table" style="width: 100%" class="hover compact display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام کالا</th>
                                <th> حالت فروش</th>
                                <th> قابل فروش</th>
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
                "ajax": "{{ route('admin.market.product.index') }}",
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
                        "data": "marketable",
                        "render": function(data, type, row, meta) {
                            return row.marketable_readable;
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
                            var galleryRoute = "{{ route('admin.market.product.gallery.index', ':id')}}"
                                .replace(':id', row.id);
                            var showRoute = "{{ route('customer.product.item', [':id', ':slug']) }}"
                                .replace(':id', row.id)
                                .replace(':slug', row.slug);
                            var editRoute = "{{ route('admin.market.product.edit', ':id') }}"
                                .replace(':id', row.id);
                            var destroyRoute = "{{ route('admin.market.product.destroy', ':id')}}"
                                .replace(':id', row.id);
                            var changeMarketableRoute = "{{ route('admin.market.product.changeMarketable', ':id')}}"
                                .replace(':id', row.id);

                            return `
                                <section class="text-left">
                                    <div class="dropdown">
                                        <a href="" class="btn btn-success btn-sm btn-block dorpdown-toggle" role="button"
                                            id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-tools"></i> عملیات
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a href="${galleryRoute}" class="text-right dropdown-item"><i class="fa fa-images"></i>
                                                گالری
                                            </a>

                                            @can('changeMarketable', \App\Models\Market\Product::class)
                                                <a href="${changeMarketableRoute}" class="text-right dropdown-item">
                                                    <i class="fa fa-list-ul"></i>
                                                    تغییر امکان فروش
                                                </a>
                                            @endcan

                                            <a href="${showRoute}" class="text-right dropdown-item">
                                                <i class="fa fa-list-ul"></i>
                                                مشاهده
                                            </a>

                                            @can('update', \App\Models\Market\Product::class)
                                                <a href="${editRoute}" class="text-right dropdown-item">
                                                    <i class="fa fa-edit"></i>
                                                    ویرایش
                                                </a>
                                            @endcan

                                            @can('delete', \App\Models\Market\Product::class)
                                                <form action="${destroyRoute}" method="POST">
                                                    @csrf @method('delete')
                                                    <button
                                                        type="submit"
                                                        class="text-right dropdown-item"
                                                        onclick="confirm(event)"
                                                    >
                                                        <i class="fa fa-window-close"></i>
                                                        حذف
                                                    </button>
                                                </form>
                                            @endcan
                                            
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
