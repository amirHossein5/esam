<script>
    function confirm(event, message = 'به آرشیو منتقل خواهد شد.') {
        event.preventDefault();

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success mr-1',
                cancelButton: 'btn btn-danger'
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
