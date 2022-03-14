@extends('admin.layouts.master')

@section('head-tag')
    <title>تیکت</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/datatable/css/dataTables.min.css') }}">
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#"> خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#"> بخش تیکت ها</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> تیکت ها</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        تیکت ها
                    </h5>
                </section>

                <section class="table-responsive">
                    <table id="table" style="width: 100%" class="hover compact display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نویسنده تیکت</th>
                                <th>عنوان تیکت</th>
                                <th>دسته تیکت</th>
                                <th>اولویت تیکت</th>
                                <th>ارجاع شده از</th>
                                <th>تیکت مرجع</th>
                                <th>وضعیت تیکت</th>
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
    <script src="{{ asset('admin-assets/js/toastAlerts.js') }}"></script>

    <script>
        $(function() {
            $('#table').DataTable({
                "searchDelay": 1500,
                "processing": true,
                "serverSide": true,
                "ajax": "{{ request()->uri }}",
                "columns": [{
                        'data': 'id',
                        "render": function(data, type, row, meta) {
                            return meta.row + 1;
                        },
                        "searchable": false,
                    },
                    {
                        'data': 'user.fullName',
                        "render": function(data, type, row, meta) {
                            if (!data) {
                                data = row.user_full_name;
                            }

                            return strlimit(data, 0, 10);
                        }
                    },
                    {
                        "data": "subject",
                        "render": function(data, type, row, meta) {
                            return strlimit(data, 0, 10);
                        }
                    },
                    {
                        "data": "category.name",
                        "render": function(data, type, row, meta) {
                            return strlimit(data, 0, 10);
                        }
                    },
                    {
                        "data": "priority.name",
                        "render": function(data, type, row, meta) {
                            return strlimit(data, 0, 10);
                        }
                    },
                    {
                        "data": "answered_admin.fullName",
                        "render": function(data, type, row, meta) {
                            if (!data) {
                                data = row.reference_full_name;
                            }

                            return strlimit(data, 0, 10);
                        }
                    },
                    {
                        "data": "parent.subject",
                        "render": function(data, type, row, meta) {
                            return data ? strlimit(data, 0, 10) : '-';
                        }
                    },
                    {
                        "data": "status",
                        "render": function(data, type, row, meta) {
                            var route = "{{ route('admin.ticket.changeStatus', ':id') }}"
                                .replace(':id', row.id);
                            var tag = '';

                            if (data) {
                                tag += `
                                <button
                                    class="btn btn-sm btn-danger"
                                    onclick="changeStatus()"
                                    data-url="${route}"
                                >
                                    <i class="fa fa-times"></i>
                                    بسته شده
                                </button>
                                `
                            } else {
                                tag += `
                                <button
                                    class="btn btn-sm btn-success"
                                    onclick="changeStatus()"
                                    data-url="${route}"
                                >
                                    <i class="fa fa-check"></i>
                                    باز
                                </button>
                                `
                            }

                            return tag;
                        },
                        "searchable": false
                    },
                    {
                        "render": function(data, type, row, meta) {
                            var route = "{{ route('admin.ticket.show', ':id') }}"
                                .replace(':id', row.id);

                            return `
                            <section class="text-left">
                                <a href="${route}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-eye"></i>
                                    مشاهده
                                </a>
                            </section>`;
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
    <script>
        function changeStatus() {
            $(event.currentTarget).prop('disabled', true);

            $.ajax({
                "headers": {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                "url": event.currentTarget.dataset.url,
                "method": "PUT",
                "success": function() {
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
