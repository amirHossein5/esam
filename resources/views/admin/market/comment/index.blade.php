@extends('admin.layouts.master')

@section('head-tag')
    <title>نظرات</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/datatable/css/dataTables.min.css') }}">
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#"> خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> نظرات</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        نظرات
                    </h5>
                </section>

                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <div>
                        <a href="" disabled class="btn btn-info btn-sm disabled">
                            ایجاد نظر
                        </a>

                    </div>
                </section>

                <section class="table-responsive">
                    <table class="hover row-border display" id="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نظر</th>
                                <th>پاسخ به</th>
                                <th>کد کاربر</th>
                                <th>نویسنده نظر</th>
                                <th>کد محصول</th>
                                <th>محصول</th>
                                <th>وضعیت کلی نظر</th>
                                <th>وضعیت نمایش</th>

                                <th class="text-center max-width-16-rem">
                                    <i class="fa fa-cogs"></i>
                                    تنظیمات
                                </th>
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
    <script src="{{ asset('admin-assets/js/changeStatusButtons.js') }}"></script>
    <script src="{{ asset('admin-assets/js/changeStatus.js') }}"></script>
    <script src="{{ asset('admin-assets/datatable/js/dataTables.min.js') }}"></script>

    <script>
        $(document).ready( function () {
            window.addEventListener('approvedChanged', function(data) {

                var dataRole = data.detail.approved
                    ? 'true'
                    : 'false';

                $('.approved-' + data.detail.id).children('[data-role]').hide();
                $('.approved-' + data.detail.id).children(`[data-role=${dataRole}]`).show();
            });

            $('#table').DataTable({
                "searchDelay": 1500,
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('admin.market.comment.index') }}",

                "columns": [
                    {
                        "data": "id",
                        "render": function(data, type, row, meta) {
                            return meta.row + 1;
                        }
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
                        "data": "parent.body",
                        "render": function(data, type, row, meta) {
                            var elementText = $($("<div></div>").html(data).text());

                            elementText = JSON.stringify($(elementText).text().trim()).replace(/\\r|\\n|\\t/g,'')

                            return JSON.parse(elementText).substr(0, 10);
                        }
                    },
                    {
                        "data": 'author_id',
                        "orderable": false,
                    },
                    {
                        "data": "author.fullName",
                        "render": function(data, type, row, meta) {
                            if (! data) {
                                return '';
                            }

                            return data.substr(0, 10);
                        }
                    },
                    {
                        "data": "commentable_id",
                        "orderable": false
                    },
                    {
                        "data": "commentable.name",
                        "render": function(data, type, row, meta) {
                            return data.substr(0, 10);
                        }
                    },
                    {
                        "data": "status",
                        "render": function(data, type, row, meta) {
                            var route = "{{ route('admin.market.comment.changeStatus', ':id') }}";
                            var tag = `
                                <input
                                    type="checkbox"
                                    onclick="changeStatus(event, 'وضعیت')"
                                    data-url="${route.replace(':id', row.id)}"`;

                            if(data) {
                                tag = tag + ` checked `
                            }

                            return tag + ` >`;
                        },
                        "searchable": false,
                    },
                    {
                        "data": "approved",
                        "render": function(data, type, row, meta) {

                            var successTag = !data ? 'style= "display: none"' : '';
                            var dangerTag = data ? 'style= "display: none"' : '';

                            return `
                                <section class="approved-${row.id}">
                                    <span
                                        class="text-success"
                                        data-role='true'
                                        ${successTag}
                                    >
                                      نمایش داده می شود.
                                    </span>
                                    <span
                                        class="text-danger"
                                        ${dangerTag}
                                        data-role="false"
                                    >
                                        نمایش داده نمی شود.
                                    </span>
                                </section>
                            `;
                        }
                    },
                    {
                        "render": function(data, type, row, meta) {
                            var showRoute = "{{ route('admin.market.comment.show', ':id') }}";
                            var changeApprovedRoute = "{{ route('admin.market.comment.approved', ':id') }}";
                            var approved = row.approved;

                            var tag = `
                            <section class="text-left">
                                <a
                                    href="${showRoute.replace(':id', row.id)}"
                                    class="btn btn-info btn-sm"
                                >
                                    <i class="fa fa-eye"></i>
                                    نمایش
                                </a>

                                <button
                                    class="btn btn-success btn-sm"
                                    type="button"
                                    data-role="true"`
                                if(!row.approved) {
                                    tag = tag + `style="display: none;"`;
                                }
                                tag = tag + `data-url="${changeApprovedRoute.replace(':id', row.id)}"
                                    onclick="changeStatusButtons(event, 'برای نمایش تایید شد', 'برای نمایش غیر فعال شد')"
                                >
                                    <i class="fa fa-check"></i>
                                    تایید شده برای نمایش
                                </button>

                                <button
                                    class="btn btn-danger btn-sm"
                                    type="submit"
                                    data-role="false"`
                                if(row.approved) {
                                    tag = tag + `style="display: none;"`;
                                }
                                tag = tag + `data-url="${changeApprovedRoute.replace(':id', row.id)}"
                                    onclick="changeStatusButtons(event, 'برای نمایش تایید شد', 'برای نمایش غیر فعال شد')"
                                >
                                    <i class="fa fa-times"></i>
                                    نمایش داده نمی شود
                                </button>

                                <button
                                    class="btn btn-primary btn-sm"
                                    style="display: none;"
                                    data-role="loader"
                                    disabled
                                >
                                    <i class="fas fa-spinner fa-spin"></i>
                                </button>
                            </section>`;
                            return tag;
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
