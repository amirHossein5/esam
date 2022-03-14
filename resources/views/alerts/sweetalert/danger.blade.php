@if (session('sweetalert-danger'))
    <script>
        Swal.fire({
            icon: 'error',
            title: {{ session('sweetalert-danger') }},
            confirmButtonText: 'باشه'
        })
    </script>
@endif
