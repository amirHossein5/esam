<script src="{{ asset('admin-assets/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('admin-assets/css/bootstrap/popper.min.js') }}"></script>
<script src="{{ asset('admin-assets/js/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin-assets/js/grid.js') }}"></script>
<script src="{{ asset('admin-assets/sweetlaert/sweetalert2.all.min.js') }}"></script>

<script>
    $(function () {
        var topOffsetActiveSidebarSection = $('#sidebar .sidebar-part-title.text-green').position().top;

        if ($('#sidebar section.sidebar-wrapper').scrollTop() == 0) {
            $('#sidebar section.sidebar-wrapper').animate({ scrollTop: 0 }, 0, function() {
                $('#sidebar section.sidebar-wrapper').animate({ scrollTop: topOffsetActiveSidebarSection - 5 }, 300)
            })
        }
    });
</script>
