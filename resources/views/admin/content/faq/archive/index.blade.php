@extends('admin.layouts.master')

@section('head-tag')
    <title>آرشیو سوالات متداول</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/datatable/css/dataTables.min.css') }}">
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> آرشیو سوالات متداول</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        آرشیو سوالات متداول
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <div>
                        <a href="{{ route('admin.content.faq.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                    </div>
                </section>

                <section class="table-responsive">
                    <table class="row-border hover display" id="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>پرسش</th>
                                <th>خلاصه پاسخ</th>
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

    <script src="{{ asset('admin-assets/datatable/js/dataTables.min.js') }}"></script>

    <script>
        $(document).ready( function () {
            $('#table').DataTable({
                "searchDelay": 1500,
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('admin.content.faq.datatable.archive') }}",

                "columns": [
                    {
                        "data": "id",
                        "render": function(data, type, row, meta) {
                            return meta.row + 1;
                        },
                        "searchable": false
                    },
                    {
                        "data": "question",
                        "render": function(data, type, row, meta) {
                            return data.substr(0, 50);
                        }
                    },
                    {
                        "data": "answer",
                        "render": function(data, type, row, meta) {
                            return data.substr(0, 50);
                        },
                        "orderable": false
                    },
                    {
                        "data": "status",
                        "render": function(data, type, row, meta) {
                            var tag = `<input type="checkbox" `;

                            if(data) {
                                tag += 'checked';
                            }

                            return tag + ' disabled >';
                        },
                        "searchable": false
                    },
                    {
                        "render": function(data, type, row, meta) {
                            var forceDeleteRoute = "{{ route('admin.content.faq.forceDelete', ':id') }}"
                                .replace(':id', row.id);
                            var restoreRoute = "{{ route('admin.content.faq.restore', ':id') }}".replace(':id', row.id);

                            return `
                                <section class="text-left">
                                    <form
                                        action="${restoreRoute}"
                                        class="d-inline"
                                        method="post"
                                    >
                                        @csrf
                                        @method('put')
                                        <button class="btn btn-primary btn-sm">
                                            <i class="fa fa-trash-restore"></i>
                                                بازگردانی
                                        </button>
                                    </form>

                                    <form action="${forceDeleteRoute}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button
                                            class="btn btn-danger btn-sm"
                                            type="submit"
                                            onclick="confirm(event,'رکوردهای مربوط به این دسته بندی نیز پاک خواهند شد.')">
                                            <i class="fa fa-trash-alt"></i>
                                                حذف کامل
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
