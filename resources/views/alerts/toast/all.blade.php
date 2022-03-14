@include('alerts.toast.danger')
@include('alerts.toast.success')

<script>
    $('.toast').toast('show').delay(5000).queue(function(){
        $(this).remove();
    });
</script>
