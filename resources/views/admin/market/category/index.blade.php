@extends('admin.layouts.master')

@section('head-tag')
    <title>دسته بندی</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/datatable/css/dataTables.min.css') }}">
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> دسته بندی</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        دسته بندی
                    </h5>
                </section>

                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <div>
                        <a href="{{ route('admin.market.category.create') }}" class="btn btn-info btn-sm">
                            ایجاد دسته بندی
                        </a>
                        <a href="{{route('admin.market.category.archive')}}" class="mx-2">
                            <u>آرشیو</u>
                        </a>
                    </div>
                </section>

                <section class="table-responsive">
                    <table class="hover row-border display" id="table" style="width:100%">                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام دسته بندی</th>
                                <th>منوی والد</th>
                                <th>عکس</th>
                                <th >نمایش در منو</th>
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
                "ajax": "{{ route('admin.market.category.index') }}",

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
                        "data": "parent.name",
                        "render": function(data, type, row, meta) {
                            return strlimit(data ?? 'منوی اصلی', 0, 15);
                        }
                    },
                    {
                        "data": "image",
                        "render": function(data, type, row, meta) {
                            var asset = '{{ asset(":asset") }}';

                            if (! data) {
                                return ``;
                            }

                            return `<img
                                    src="${asset.replace(':asset', data.index.medium)}"
                                    alt=""
                                    width="50"
                                    height="50"
                                >`;
                        },
                        "searchable": false,
                        "orderable": false
                    },
                    {
                        "data": "show_in_menu",
                        "searchable": false,
                        "render": function(data, type, row, meta) {
                            var route = "{{ route('admin.market.category.changeShowInMenu', ':id') }}";

                            var tag = ` <input
                                        type="checkbox"
                                        onchange="changeStatus(event, 'نمایش در منو')"
                                        data-url=${route.replace(':id', row.id)}`;
                            if(row.show_in_menu) {
                                tag += ' checked ';
                            }
                            tag += ' />';

                            return tag;
                        }
                    },
                    {
                        "render": function(data, type, row, meta) {
                            var editRoute = "{{ route('admin.market.category.edit', ':id') }}";
                            var deleteRoute = "{{ route('admin.market.category.destroy', ':id') }}";

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
                                            onclick="confirm(event)"
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
