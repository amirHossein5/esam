@if (session('alert-section-info'))
    <div class="alert alert-info alert-dismissible fade show d-flex align-items-end" style="height: 3rem" role="alert">
        <p class="m-0">{{ session('alert-section-info') }} با مقدار صفحه صفحه مقدارش</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
