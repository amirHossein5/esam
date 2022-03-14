@extends('admin.layouts.master')

@section('head-tag')
    <title>آرشیو اطلاعیه پیامکی</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/datatable/css/dataTables.min.css') }}">
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">اطلاع رسانی</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> آرشیو اطلاعیه پیامکی</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        آرشیو اطلاعیه پیامکی
                    </h5>
                </section>

                <section class="d-flex align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.notify.sms.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section class="table-responsive">
                    <table id="table" style="width: 100%" class="hover compact display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان اطلاعیه</th>
                                <th>متن اطلاعیه</th>
                                <th>تاریخ ارسال </th>
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

    <script>
        $(function() {
            var table = $('#table').DataTable({
                "searchDelay": 1500,
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('admin.notify.sms.archive') }}",
                "columns": [
                    {
                        "data": "id",
                        "render": function(data, type, row, meta) {
                            return meta.row + 1;
                        },
                        "searchable": false,
                    },
                    {
                        "data": "title"
                    },
                    {
                        "data": "body"
                    },
                    {
                        "data": 'published_at',
                        "render": function(data, type, row, meta) {
                            return `<section class="direction-ltr">${data.split(' ').join(' / ')}</section>`;
                        },
                    },
                    {
                        'data': "status",
                        "render": function(data, type, row, meta) {
                            var tag = `
                                <input
                                    disabled
                                    type="checkbox"`;

                            if(data) {
                                tag += ' checked ';
                            }
                            return tag + `>`;
                        },
                        'searchable': false,
                    },
                    {
                        "render": function(data, type, row, meta) {
                            var restoreRoute = "{{ route('admin.notify.sms.restore', ':id') }}"
                                .replace(':id', row.id);
                            var forceDeleteRoute = "{{ route('admin.notify.sms.forceDelete', ':id') }}"
                                .replace(':id', row.id);

                            return `
                            <section class="text-left">
                                <form action="${restoreRoute}" method="post" class="d-inline">
                                    @csrf
                                    @method('put')
                                    <button type="submit" class="btn btn-info btn-sm">
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
