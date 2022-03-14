@extends('admin.layouts.master')

@section('head-tag')
    <title>فایل های ایمیل</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/datatable/css/dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/filepond/css/filepond.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/filepond/css/filepond.modification.css') }}">
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">اطلاع رسانی</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page">فایل های ایمیل</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                         فایل های ایمیل ({{ Str::limit($email->subject, 10) }})
                    </h5>
                </section>

                <section class="pb-2 mt-4 mb-3 d-flex align-items-center border-bottom">
                    <section>
                        <button data-toggle="modal" data-target="#uploadFile" class="btn btn-info btn-sm">
                            آپلود فایل
                        </button>
                        <div class="modal fade" id="uploadFile" tabindex="-1" role="dialog" aria-labelledby="uploadFileLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form id="form" action="{{ route('admin.notify.emailFile.store', $email->id) }}" method="post" enctype="multipart/form-data">

                                        <div class="modal-header d-flex justify-content-between">
                                        <h5 class="modal-title" id="uploadFileLongTitle">آپلود فایل</h5>
                                        <div>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        </div>
                                        <div class="modal-body">
                                           <div class="form-group">
                                               <label for="file_name">
                                                   نام فایل
                                               </label>
                                               <input type="text" name="file_name" id="file_name" class="form-control form-control-sm">
                                                <ul class="mt-2 file_name_errors errors">
                                                </ul>

                                           </div>
                                           <div class="form-group">
                                               <input type="file"name="emailFile" id="file">
                                               <ul class="file_errors errors">
                                               </ul>

                                           </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">آپلود</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
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
    <script src="{{ asset('admin-assets/filepond/js/filepond-plugin-file-validate-size.js') }}"></script>
    <script src="{{ asset('admin-assets/filepond/js/filepond.min.js') }}"></script>
    <script src="{{ asset('admin-assets/datatable/js/dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/changeStatus.js') }}"></script>

    <script>
        function mixInSuccess(message = 'با موفقیت آپلود شد.') {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: message
            })
        }
    </script>

    <script>
        $(function() {
            FilePond.registerPlugin(FilePondPluginFileValidateSize);
            const inputElement = document.querySelector('input[id="file"]');
            const pond = FilePond.create(inputElement)
            FilePond.setOptions({
                maxFileSize: '20MB',
                server: {
                    url: "{{ route('admin.notify.emailFile.uploadFile') }}",
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                }
            })
            import("{{ asset('admin-assets/filepond/locale/fa_ir.js') }}")
                .then((locale) => FilePond.setOptions(locale.default))


            document.addEventListener('FilePond:error', (e) => {
                $('#file').siblings('.text-danger').remove();

                $('#form').find('.file_errors').children().remove()
                $('#form').find('.file_errors').append(`
                    <li class="text-danger">فایل با پسوند های pdf,jpg,jpeg,zip,rar مجاز می باشد. و حداکثر ۲۰ مگابایت</li>
                `);
            });

            document.addEventListener('FilePond:updatefiles', (e) => {
                $('#form').find('.file_errors').children().remove()
                $('#file').siblings('.text-danger').remove();
            });

            var table = $('#table').DataTable({
                "searchDelay": 1500,
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('admin.notify.emailFile.index', $email->id) }}",
                "columns": [
                    {
                        "data": "id",
                        "render": function(data, type, row, meta) {
                            return meta.row + 1;
                        },
                        "searchable": false,
                    },
                    {
                        "data": "file_name",
                        "render": function(data, type, row, meta) {
                            if (data.length > 10) {
                                return data.substr(0, 10) + '...';
                            }
                            return data;
                        }
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
                            var downloadRoute = "{{ route('admin.notify.emailFile.download', ':id') }}"
                                .replace(':id', row.id);
                            var deleteRoute = "{{ route('admin.notify.emailFile.destroy', ':id') }}"
                                .replace(':id', row.id);
                            var editRoute = `{{ route('admin.notify.emailFile.update', [
                                'email' => ':emailId',
                                'file' => ':fileId'
                            ]) }}`.replace(':emailId', "{{ $email->id }}")
                            .replace(':fileId', row.id)

                            return `
                            <section class="text-left">
                                <form action="${downloadRoute}" method="post" class="d-inline">
                                    @csrf
                                    <button class="btn btn-warning text-dark btn-sm">
                                        <i class="fa fa-download"></i> دانلود فایل
                                    </button>
                                </form>

                                <button
                                    type="button"
                                    data-toggle="modal" data-target=".editModal-${row.id}"
                                    class="open-edit-modal btn btn-info btn-sm"
                                >
                                    <i class="fa fa-edit"></i> ویرایش
                                </button>

                                <x-admin.notify.emailFile.edit
                                    :emailId="$email->id"
                                    fileId="${row.id}"
                                    fileName="${row.file_name}"
                                    action="${editRoute}"
                                />

                                <form action="${deleteRoute}" method="post" class="d-inline">
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

            function resetDatatable() {
                $('#table').DataTable().column().draw()
            }


            $('#form').submit(function (e) {
                e.preventDefault();

                var form = $(this);
                var data = form.serialize();
                $('#form input').prop('disabled', true)
                $('#form button[type=submit]').prop('disabled', true)

                $.ajax({
                    type: 'post',
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    url: form.attr('action'),
                    data: data,
                    success: function() {
                        mixInSuccess();

                        form.find('.errors').children().remove();

                        $('#uploadFile').modal('hide');
                        $('#form input').prop('disabled', false)
                        $('#form button[type=submit]').prop('disabled', false)

                        $('#form input[type!="file"]').each((i, el) => {
                            $(el).val(null);
                        })
                        pond.removeFiles();

                        resetDatatable();
                    },
                    error: function (xhr, status, error) {
                        var file_name_errors = xhr.responseJSON.errors.file_name ?? [];
                        var file_errors = xhr.responseJSON.errors.file ?? [];
                        form.find('.errors').children().remove();

                        file_name_errors.forEach(error => {
                            li = `<li class="text-danger "></li>`
                            form.find('.file_name_errors').append($(li).text(error));
                        })

                        file_errors.forEach(error => {
                            li = `<li class="text-danger "></li>`
                            form.find('.file_errors').append($(li).text(error));
                        })

                        $('#form input').prop('disabled', false)
                        $('#form button[type=submit]').prop('disabled', false)
                    }
                });
            });
        });
    </script>
@endsection
