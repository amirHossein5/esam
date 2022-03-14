@if (session('alert-section-success'))
    <div class="alert alert-success alert-dismissible fade show d-flex align-items-end" style="height: 3rem"
        role="alert">
        <p class="m-0">{{ session('alert-section-success') }} با مقدار صفحه صفحه مقدارش</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
