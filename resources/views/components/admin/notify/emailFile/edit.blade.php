@props(['fileId', 'emailId', 'fileName', 'action'])

<div class="modal fade editModal-{{ $fileId }}" tabindex="-1" role="dialog" aria-labelledby="editModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <h5 class="modal-title editModalLongTitle-{{ $fileId }}">ویرایش فایل</h5>
                <div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>

            <form class="editForm" action="{{ $action }}" method="post">
                @method('put')

                <div class="modal-body">
                    <label for="edit_file_name">
                        نام:
                    </label>
                    <input type="text" name="file_name"
                        class="form-control form-control-sm file_name_{{ $fileId }}" value="{{ $fileName }}">

                    <ul class="edit_file_name_errors">
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">ذخیره</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(document).on('draw.dt', function(e, settings) {
            $('.editForm').submit(function() {
                event.preventDefault();

                var form = $(this);
                var data = form.serialize();
                $(`.${form.attr('class')} input`).prop('disabled', true);
                $(`.${form.attr('class')} button[type=submit]`).prop('disabled', true)

                $.ajax({
                    type: "put",
                    url: form.attr('action'),
                    headers: {
                        "Accept": "application/json",
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: data,
                    success: function() {
                        mixInSuccess('با موفقیت نغییر کرد.');

                        $(`.${form.attr('class')} input`).prop('disabled', false);
                        $(`.${form.attr('class')} button[type=submit]`).prop('disabled', false)
                        $(`.${form.attr('class')} .edit_file_name_errors`).children().remove()

                        form.closest('.modal').modal('hide');
                        $('#table').DataTable().columns().search().draw();

                    },
                    error: function(xhr, status, error) {
                        $(`.${form.attr('class')} input`).prop('disabled', false);
                        $(`.${form.attr('class')} button[type=submit]`).prop('disabled', false)
                        var errors = xhr.responseJSON.errors ?? [];
                        $(`.${form.attr('class')} .edit_file_name_errors`).children().remove();

                        errors.file_name.forEach(message => {
                            var li = `<li class="text-danger"></li>`;
                            $(`.${form.attr('class')} .edit_file_name_errors`).append($(
                                li).text(message))
                        })
                    }
                })
            });
        })
    </script>
@endpush
