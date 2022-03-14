@if (session('sweetalert-info'))
    <script>
        Swal.fire({
            icon: 'info',
            title: {{ session('sweetalert-info') }},
            confirmButtonText: 'باشه'
        })
    </script>
@endif
