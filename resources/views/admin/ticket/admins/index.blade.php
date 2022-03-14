@extends('admin.layouts.master')

@section('head-tag')
    <title>ادمین های تیکت ها</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/datatable/css/dataTables.min.css') }}">
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#"> خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#"> بخش تیکت ها</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ادمین های تیکت ها</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ادمین های تیکت ها
                    </h5>
                </section>

                <section class="pb-2 mt-4 mb-3 border-bottom">
                </section>

                <section class="table-responsive">
                    <table id="table" style="width: 100%" class="hover compact display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ایمیل</th>
                                <th>نام</th>
                                <th>مجاز</th>
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
    <script src="{{ asset('admin-assets/js/toastAlerts.js') }}"></script>
    <script src="{{ asset('admin-assets/datatable/js/dataTables.min.js') }}"></script>

    <script>
        $(function() {
            $('#table').DataTable({
                "searchDelay": 1500,
                "processing": true,
                "serverSide": true,
                'ajax': "{{ route('admin.ticket.admins.index') }}",
                "columns": [{
                        "data": "id",
                        "render": function(data, type, row, meta) {
                            return meta.row + 1;
                        },
                        "searchable": false
                    },
                    {
                        "data": "email",
                    },
                    {
                        "data": "fullName",
                    },
                    {
                        "data": "allowed",
                        "render": function(data, type, row, meta) {
                            var route = "{{ route('admin.ticket.admins.allow', ':id') }}"
                                .replace(':id', row.id);

                            var tag = `<section class="text-left">`;

                            if (!data) {
                                tag += `
                                    <button
                                        class="btn btn-sm btn-outline-danger"
                                        data-url="${route}"
                                        onclick="allow()"
                                    >
                                        غیرمجاز
                                    </button>`;
                            } else {
                                tag += `
                                    <button
                                        class="btn btn-sm btn-outline-success"
                                        data-url="${route}"
                                        onclick="allow()"
                                    >
                                        مجاز
                                    </button>`
                            }

                            return tag + `</section>`;
                        },
                        "searchable": false
                    },
                ],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Persian.json"
                }
            })
        });
    </script>

    <script>
        function allow() {
            $(event.currentTarget).prop('disabled', true);
            $.ajax({
                "headers": {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                "url": $(event.currentTarget).data('url'),
                "method": "put",
                "success": function () {
                    $('#table').DataTable().draw();
                },
                "error": function() {
                    sendErrorToastAlert('مشکلی پیش آمده دوباره امتحان کنید');
                    $('#table').DataTable().draw();
                }
            });
        }
    </script>
@endsection
