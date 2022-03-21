@extends('admin.layouts.master')

@section('head-tag')
    <title>بنر ها</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/datatable/css/dataTables.min.css') }}">
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="banner"> بنر ها</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        بنر ها
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <div>
                        <a href="{{ route('admin.content.banner.create') }}" class="btn btn-info btn-sm">ایجاد بنر  جدید</a>
                    </div>
                </section>

                <section class="table-responsive">
                    <table class="hover row-border display compact" id="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>آدرس بنر </th>
                                <th>بنر</th>
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

<img src="" alt="">
@section('script')

    @include('alerts.sweetalert.confirm')
    <script src="{{ asset('admin-assets/datatable/js/dataTables.min.js') }}"></script>

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
                        "data": "url",
                        "render": function(data, type, row, meta) {
                            return `<a href="${data}"><u>لینک</u></a>`;
                        },
                        'orderable': false
                    },
                    {
                        "data": "banner",
                        "render": function(data, type, row, meta) {
                            var asset = "{{ asset(':asset') }}".replace(':asset', data);

                            return `<img src="${asset}" alt="" width="150px">`;
                        },
                        'searchable': false,
                        'orderable': false
                    },
                    {
                        "render": function(data, type, row, meta) {
                            var destroyRoute = "{{ route('admin.content.banner.destroy', ':id')}}".replace(':id', row.id);
                            var editRoute = "{{ route('admin.content.banner.edit', ':id')}}".replace(':id', row.id);

                            return `
                                <section class="text-left">
                                    <a
                                        href="${editRoute}"
                                        class="btn btn-primary btn-sm"
                                    >
                                        <i class="fa fa-edit"></i>
                                        ویرایش
                                    </a>
                                    <form action="${destroyRoute}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm" type="submit" onclick="confirm(event, 'به طور کامل پاک خواهد شد.')">
                                            <i class="fa fa-trash-alt"></i>
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
