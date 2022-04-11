@extends('admin.layouts.master')

@section('head-tag')
    <title>کپن تخفیف</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/datatable/css/dataTables.min.css') }}">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page">کپن تخفیف</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        کپن تخفیف
                    </h5>
                </section>

                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.market.discount.copan.create') }}" class="btn btn-info btn-sm">ایجاد
                        کپن تخفیف</a>
                </section>

                <section class="table-responsive">
                    <table id="table" style="width: 100%" class="hover compact display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th> قیمت</th>
                                <th>نوع قیمت</th>
                                <th>سقف تخفیف</th>
                                <th>نوع تخفیف</th>
                                <th>برای کاربر</th>
                                <th>تاریخ شروع</th>
                                <th>تاریخ پایان</th>
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
    @include('alerts.sweetalert.confirm')
    <script src="{{ asset('admin-assets/datatable/js/dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/limit.js') }}"></script>
    <script src="{{ asset('admin-assets/js/toastAlerts.js') }}"></script>
    <script src="{{ asset('admin-assets/js/changeStatus.js') }}"></script>

    <script>
        $(function () {
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
                        "data": "amount_readable",
                        "render": function(data, type, row, meta) {
                            return  data;
                        }
                    },
                    {
                        "data": "amount_type_readable",
                        "render": function(data, type, row, meta) {
                            return  data;
                        }
                    },
                    {
                        "data": "discount_ceiling_readable",
                        "render": function(data, type, row, meta) {
                            return data ? data + ' تومان' : '-';
                        }
                    },
                    {
                        "data": "type_readable",
                        "render": function(data, type, row, meta) {
                            return strlimit(data , 0, 10);
                        }
                    },
                    {
                        "data": "user.fullName",
                        "render": function(data, type, row, meta) {
                            return data ? strlimit(data , 0, 10) : '-';
                        }
                    },
                    {
                        "data": "start_date_jalali",
                        "render": function(data, type, row, meta) {
                            return `<div class="direction-ltr"><span>${data}</span></div>`;
                        }
                    },
                    {
                        "data": "end_date_jalali",
                        "render": function(data, type, row, meta) {
                            return `<div class="direction-ltr"><span>${data}</span></div>`;
                        }
                    },
                    {
                        "data": "status",
                        "render": function(data, type, row, meta) {
                            var route = "{{ route('admin.market.discount.copan.changeStatus', ':id')}}".replace(':id', row.id);
                            var tag = `<input type="checkbox" onclick="changeStatus(event)" data-url="${route}"`;

                            if(data) {
                                tag += ' checked ';
                            }

                            return tag + ' >';
                        },
                        "searchable": false,
                    },
                    {
                        "render": function(data, type, row, meta) {
                            var editRoute = "{{ route('admin.market.discount.copan.edit', ':id')}}".replace(':id', row.id);
                            var destroyRoute = "{{ route('admin.market.discount.copan.destroy', ':id') }}".replace(':id', row.id);

                            return `
                                <section class="text-left">
                                    <a href="${editRoute}"
                                        class="btn btn-primary btn-sm">
                                        <i class="fa fa-edit"></i>
                                        ویرایش
                                    </a>

                                    <form action="${destroyRoute}"
                                        method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button
                                            class="btn btn-danger btn-sm"
                                            type="submit"
                                            onclick="confirm(event, 'به طور کامل پاک خواهد شد.')">
                                            <i class="fa fa-trash-alt"></i>
                                            حذف
                                        </button>
                                    </form>
                                </section>
                            `;
                        },
                        "searchable": false,
                        "orderable": false,
                    }
                ],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Persian.json"
                }
            });
        });
    </script>

@endsection
