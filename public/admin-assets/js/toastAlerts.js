function sendSuccessToastAlert(responseMessage) {
    $('body .toast-wrapper').append(`
        <div
            class="flex-row p-2 m-0 text-white justify-content-between bg-primary align-items-center d-flex toast"
            style="gap: .5rem; width: 16rem" role="alert"
            data-delay="5000"
            aria-live="assertive"
            aria-atomic="true"
        >
            <p class="m-0">
                ${responseMessage}
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
    `);

    $('.toast').toast('show').delay(5000).queue(function () {
        $(this).remove();
    });
}

function sendErrorToastAlert(responseMessage) {
    $('body .toast-wrapper').append(`
        <div
            class="flex-row p-2 m-0 text-white justify-content-between bg-danger align-items-center d-flex toast"
            data-delay="5000"
            style="gap: .5rem; width: 16rem"
            role="alert"
            aria-live="assertive"
            aria-atomic="true"
        >
            <p class="m-0">
                ${responseMessage}
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
    `);

    $('.toast').toast('show').delay(5000).queue(function () {
        $(this).remove();
    });
}
