@extends('admin.layouts.master')

@section('head-tag')
    <title>فایل های آرشیو شده ایمیل</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/datatable/css/dataTables.min.css') }}">
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">اطلاع رسانی</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page">فایل های آرشیو شده ایمیل</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        فایل های آرشیو شده ایمیل ({{ Str::limit($email->subject, 10) }})
                    </h5>
                </section>

                <section class="d-flex align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.notify.emailFile.index', $email->id) }}" class="btn btn-info btn-sm">
                       بازگشت
                    </a>
                </section>

                <section class="table-responsive">
                    <table id="table" style="width: 100%" class="hover compact display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام فایل</th>
                                <th>سایز</th>
                                <th>نوع فایل</th>
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
        $(function() {
            var table = $('#table').DataTable({
                "searchDelay": 1500,
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('admin.notify.emailFile.archive', $email->id) }}",
                "columns": [
                    {
                        "data": "id",
                        "render": function(data, type, row, meta) {
                            return meta.row + 1;
                        },
                        "searchable": false,
                    },
                    {
                        "data": "file_name"
                    },
                    {
                        "data": "file_size",
                        "searchable": false
                    },
                    {
                        "data": 'file_type'
                    },
                    {
                        'data': "status",
                        "render": function(data, type, row, meta) {
                            var route = "{{ route('admin.notify.emailFile.changeStatus', ':id') }}"
                                .replace(':id', row.id);

                            var tag = `
                                <input
                                    type="checkbox" disabled`;

                            if(data) {
                                tag += ' checked ';
                            }
                            return tag + `>`;
                        },
                        'searchable': false,
                    },
                    {
                        "render": function(data, type, row, meta) {
                            var downloadRoute = "{{ route('admin.notify.emailFile.download', ':id') }}"
                                .replace(':id', row.id);
                            var restoreRoute = "{{ route('admin.notify.emailFile.restore',':id') }}"
                                .replace(':id', row.id);
                            var forceDeleteRoute = "{{ route('admin.notify.emailFile.forceDelete', ':id') }}"
                                .replace(':id', row.id);

                            return `
                            <section class="text-left">
                                <form action="${downloadRoute}" method="post" class="d-inline">
                                    @csrf
                                    <button class="btn btn-warning text-dark btn-sm">
                                        <i class="fa fa-download"></i> دانلود فایل
                                    </button>
                                </form>

                                <form action="${restoreRoute}" method="post" class="d-inline">
                                    @csrf
                                    @method('put')
                                    <button
                                        class="btn btn-info btn-sm"  type="submit"
                                    >
                                        <i class="fa fa-trash-restore"></i> بازگردانی
                                    </button>
                                </form>

                                <form action="${forceDeleteRoute}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button
                                        class="btn btn-danger btn-sm" type="submit"
                                        onclick="confirm(event, 'به طور کامل پاک خواهد شد.')"
                                    >
                                        <i class="fa fa-trash-alt"></i>
                                        حذف
                                    </button>
                                </form>
                            </section>
                            `;
                        },
                        "orderable": false,
                        "searchable": false,
                    }
                ],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Persian.json"
                }
            });
        });
    </script>
@endsection
