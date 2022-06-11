@extends('admin.layouts.master')

@section('head-tag')
    <title>اطلاعیه ایمیلی</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/datatable/css/dataTables.min.css') }}">
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">اطلاع رسانی</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> اطلاعیه ایمیلی</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        اطلاعیه ایمیلی
                    </h5>
                </section>

                <section class="d-flex align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.notify.email.create') }}" class="btn btn-info btn-sm">ایجاد اطلاعیه ایمیلی</a>
                    <a href="{{ route('admin.notify.email.archive') }}" class="mx-2">
                        <u>آرشیو</u>
                    </a>
                </section>

                <section class="table-responsive">
                    <table id="table" style="width: 100%" class="hover compact display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان اطلاعیه</th>
                                <th>متن اطلاعیه</th>
                                <th>تاریخ ارسال </th>
                                <th>ارسال شده</th>
                                <th>وضعیت</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <section class="container-fluid p-1">
                                        <section class="row direction-ltr">

                                            <section class="col-12 col-md-3 p-1">
                                                <button
                                                    id="searchDate"
                                                    type="button"
                                                    class="btn btn-sm btn-info"
                                                >
                                                    جستجو
                                                </button>
                                            </section>

                                            <section class="col-12 col-md-3 p-1">
                                                <select id="year" class="form-control form-control-sm">
                                                    <option value="">سال</option>
                                                    @foreach ($years as $year)
                                                        <option value="{{ $year }}">{{ $year }}</option>
                                                    @endforeach
                                                </select>
                                            </section>
                                            <section class="col-12 col-md-3 p-1">
                                                <select id="month" class="form-control form-control-sm">
                                                    <option value="">ماه</option>
                                                    @foreach ($months as $month)
                                                        <option value="{{ $month }}">{{ $month }}</option>
                                                    @endforeach
                                                </select>
                                            </section>
                                            <section class="col-12 col-md-3 p-1">
                                                <select id="day" class="form-control form-control-sm">
                                                    <option value="">روز</option>
                                                    @foreach ($days as $day)
                                                        <option value="{{ $day }}">{{ $day }}</option>
                                                    @endforeach
                                                </select>
                                            </section>

                                            <section class="col-12 p-1" id="searchDateMessage" style="display: none">
                                                <p class="text-danger">همه موارد را انتخاب کنید.</p>
                                            </section>
                                        </section>
                                    </section>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </section>

            </section>
        </section>
    </section>

@endsection

@section('script')
    @include('alerts.sweetalert.confirm')
    <script src="{{ asset('admin-assets/datatable/js/dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/changeStatus.js') }}"></script>

    <script>
        $(function() {
            var table = $('#table').DataTable({
                "searchDelay": 1500,
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('admin.notify.email.index') }}",
                "columns": [
                    {
                        "data": "id",
                        "render": function(data, type, row, meta) {
                            return meta.row + 1;
                        },
                        "searchable": false,
                    },
                    {
                        "data": "subject"
                    },
                    {
                        "data": "body",
                        "render": function(data, type, row, meta) {
                            var elementText = $($("<div></div>").html(data).text());

                            elementText = JSON.stringify($(elementText).text().trim()).replace(/\\r|\\n|\\t/g,'')

                            return JSON.parse(elementText).substr(0, 10);
                        }
                    },
                    {
                        "data": 'send_at',
                        "render": function(data, type, row, meta) {
                            return `<section class="direction-ltr">${data.split(' ').join(' / ')}</section>`;
                        },
                    },
                    {
                        "data": 'sent',
                        "render": function(data, type, row, meta) {
                            var route = "{{ route('admin.notify.email.changeSent', ':id') }}".replace(':id', row.id);

                            var tag = `
                                <input
                                    type="checkbox"
                                    onclick="changeStatus(event, 'ارسال شده')"
                                    data-url="${route}" `;
                            if(data) {
                                tag += ' checked ';
                            }
                            return tag + `>`;
                        },
                        'searchable': false,
                    },
                    {
                        'data': "status",
                        "render": function(data, type, row, meta) {
                            var route = "{{ route('admin.notify.email.changeStatus', ':id') }}".replace(':id', row.id);

                            var tag = `
                                <input
                                    type="checkbox"
                                    onclick="changeStatus(event)"
                                    data-url="${route}" `;
                            if(data) {
                                tag += ' checked ';
                            }
                            return tag + `>`;
                        },
                        'searchable': false,
                    },
                    {
                        "render": function(data, type, row, meta) {
                            var fileRoute = "{{ route('admin.notify.emailFile.index', ':id') }}"
                                .replace(':id', row.id);
                            var editRoute = "{{ route('admin.notify.email.edit', ':id') }}".replace(':id', row.id);
                            var deleteRoute = "{{ route('admin.notify.email.destroy', ':id') }}"
                                .replace(':id', row.id);

                            return `
                            <section class="text-left text-secondary">
                                <a
                                    href="${fileRoute}"
                                    class="btn btn-warning btn-sm"
                                >
                                    <i class="fa fa-file"></i> فایل ها
                                </a>

                                <a
                                    href="${editRoute}"
                                    class="btn btn-info btn-sm"
                                >
                                    <i class="fa fa-edit"></i> ویرایش
                                </a>

                                <form action="${deleteRoute}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button
                                        class="btn btn-danger btn-sm" type="submit"
                                        onclick="confirm(event)"
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

            $('#searchDate').click(function(){
                var year = $('select#year').val();
                var month = $('select#month').val();
                var day = $('select#day').val();

               if (! year ||
                    ! month ||
                    ! day
                ) {
                    $('#searchDateMessage').fadeIn();

                    setTimeout(() => {
                        $('#searchDateMessage').fadeOut();
                    }, 2000);

                    return  table.column(3)
                        .search('')
                        .draw()
               }

               table.column(3)
                    .search(`${year}-${month}-${day}`)
                    .draw()
            });

        });
    </script>
@endsection
