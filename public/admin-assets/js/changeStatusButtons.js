function changeStatusButtons(event, trueMessage, falseMessage) {
    var target = event.target;
    var url = $(target).attr("data-url");
    var id = url.split('/')[url.split('/').length - 1];

    if ($(target).attr("data-role") === 'true') {
        var trueButton = $(target);
        var falseButton = $(target).siblings("[data-role=false]").eq(0);
    } else {
        var trueButton = $(target).siblings("[data-role=true]").eq(0);
        var falseButton = $(target);
    }

    $(falseButton).hide();
    $(trueButton).hide();
    $(trueButton).siblings('[data-role=loader]').show();

    $.ajax({
        type: "get",
        url: url,
        headers: {
            Accept: "application/json",
        },
        success: function (response) {
            $(trueButton).siblings('[data-role=loader]').hide();

            if (response.approved) {
                $(trueButton).show();
                var message = trueMessage;
            } else {
                $(falseButton).show();
                var message = falseMessage;
            }

            var event = new CustomEvent('approvedChanged', {
                "detail": { "approved": response.approved, "id": id }
            });
            window.dispatchEvent(event);

            sendSuccessToastAlert(message);
        },
        error: function () {
            $(target).show();
            $(trueButton).siblings('[data-role=loader]').hide();
            sendErrorToastAlert('مشکلی پیش آمده دوباره امتحان کنید');
        },
    });
}
