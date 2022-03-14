@if (session('sweetalert-warning'))
    <script>
        Swal.fire({
            icon: 'warning',
            title: {{ session('sweetalert-warning') }},
            confirmButtonText: 'باشه'
        })
    </script>
@endif
