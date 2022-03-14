@if (session('toast-success'))
    <div
        class="flex-row p-2 m-0 text-white justify-content-between bg-primary align-items-center d-flex toast"
        data-delay="5000"
        style="gap: .5rem; width: 16rem"
        role="alert"
        aria-live="assertive"
        aria-atomic="true"
    >
        <p class="m-0">
            {{ session('toast-success') }}
        </p>
        <button
            type="button"
            class="mb-1 ml-2 close btn-close-white me-2"
            data-dismiss="toast"
            aria-label="Close"
        >
            <span aria-hidden="true" class="text-white">&times;</span>
        </button>
    </div>
@endif
