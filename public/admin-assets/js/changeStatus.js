function changeStatus(event, caseName = 'وضعیت', showErrorMessage = false) {
    var target = event.target;
    $(target).prop('disabled', true)
    var wasChecked = !$(target).prop('checked');
    var url = $(target).attr('data-url');
    var event = new CustomEvent("changeStatusResponseReceived");

    $.ajax({
        type: 'get',
        url: url,
        headers: {
            "Accept": "application/json"
        },
        success: function (result) {
            $(target).prop('disabled', false)
            $(target).prop('checked', result.checked);

            var resultText = result.checked ? 'فعال' : 'غیر فعال';
            var resultText = `${caseName} با موفقیت ${resultText} شد`;

            sendSuccessToastAlert(resultText);

            document.dispatchEvent(event);
        },
        error: function (xhr, status, error) {
            $(target).prop('disabled', false)
            $(target).prop('checked', wasChecked);

            if (showErrorMessage) {
                sendErrorToastAlert(xhr.responseJSON.message ?? 'مشکلی پیش آمده دوباره امتحان کنید');
            } else {
                sendErrorToastAlert('مشکلی پیش آمده دوباره امتحان کنید');
            }

            document.dispatchEvent(event);
        }
    });

}

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
