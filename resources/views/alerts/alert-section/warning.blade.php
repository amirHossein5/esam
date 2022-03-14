@if (session('alert-section-warning'))
    <div class="alert alert-warning alert-dismissible fade show d-flex align-items-end" style="height: 3rem"
        role="alert">
        <p class="m-0">{{ session('alert-section-warning') }}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
