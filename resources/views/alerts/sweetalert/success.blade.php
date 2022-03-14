@if (session('sweetalert-success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: {{ session('sweetalert-success') }},
            confirmButtonText: 'باشه'
        })
    </script>
@endif
