@if (session('sweetalert-danger'))
    <style>
        .swal2-title {
            font-size: 1rem;
        }
    </style>

    <script>
        Swal.fire({
            icon: 'error',
            title: "{{ session('sweetalert-danger') }}",
            confirmButtonText: 'باشه'
        })
    </script>
@endif
