<script>
    function confirm(event, message = 'به آرشیو منتقل خواهد شد.', confirmButtonClass = 'btn btn-success', cancelButtonClass = 'btn btn-danger') {
        event.preventDefault();

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: confirmButtonClass + ' mr-1',
                cancelButton: cancelButtonClass
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'آیا مطمئن هستید؟',
            text: message,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'پاک شود',
            cancelButtonText: 'لغو عملیات',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $(event.target).closest('form').submit();
            }
        })
    }
</script>
