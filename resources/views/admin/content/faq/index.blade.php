@extends('admin.layouts.master')

@section('head-tag')
    <title>سوالات متداول</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/datatable/css/dataTables.min.css') }}">
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> سوالات متداول</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        سوالات متداول
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <div>
                        <a href="{{ route('admin.content.faq.create') }}" class="btn btn-info btn-sm">ایجاد سوال جدید</a>
                        <a href="{{ route('admin.content.faq.archive') }}" class="mx-2"><u>آرشیو</u></a>
                    </div>
                </section>

                <section class="table-responsive">
                    <table class="hover display row-border" id="table" style="width: 100%">
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

                                    {{-- <td>{{ substr($faq->answer, 0, 30) }}</td>
                                    <td>
                                        <input
                                            type="checkbox"
                                            @if ($faq->status) checked @endif
                                            onclick="changeStatus(event)"
                                            data-url="{{ route('admin.content.faq.changeStatus', $faq->id) }}"
                                        >
                                    </td> --}}
                                    {{-- <td class="width-16-rem text-left">
                                        <a
                                            href="{{ route('admin.content.faq.edit', $faq->id) }}"
                                            class="btn btn-primary btn-sm"
                                        >
                                            <i class="fa fa-edit"></i> ویرایش
                                        </a>
                                        <form action="{{ route('admin.content.faq.destroy', $faq->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button
                                                class="btn btn-danger btn-sm"
                                                type="submit"
                                                onclick="confirm(event)">
                                                <i class="fa fa-trash-alt"></i>
                                                حذف
                                            </button>
                                        </form>
                                    </td> --}}
                                </tr>
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

    <script>
        $(document).ready( function () {
            $('#table').DataTable({
                "searchDelay": 1500,
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('admin.content.faq.datatable.index') }}",

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
                            var route = "{{ route('admin.content.faq.changeStatus', ':id') }}";

                            if(data) {
                                tag += 'checked';
                            }

                            tag += ` onclick="changeStatus(event)" data-url="${route.replace(':id', row.id)}" `;

                            return tag + ' >';
                        },
                        "searchable": false
                    },
                    {
                        "render": function(data, type, row, meta) {
                            var destroyRoute = "{{ route('admin.content.faq.destroy', ':id') }}".replace(':id', row.id);
                            var editRoute = "{{ route('admin.content.faq.edit', ':id') }}".replace(':id', row.id);

                            return `
                                <section class="text-left">
                                    <a
                                        href="${editRoute}"
                                        class="btn btn-primary btn-sm"
                                    >
                                        <i class="fa fa-edit"></i> ویرایش
                                    </a>

                                    <form action="${destroyRoute}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button
                                            class="btn btn-danger btn-sm"
                                            type="submit"
                                            onclick="confirm(event)">
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
