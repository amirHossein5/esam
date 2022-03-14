function datePickerOldSetter(dp) {
    var time = null;
    var mainDatePickerValue = $("#main-date-picker").attr("value");

    if (mainDatePickerValue) {
        if (mainDatePickerValue.split("-").length !== 1) {
            time = Date.parse(mainDatePickerValue);
        } else {
            time = parseInt(mainDatePickerValue);
        }
    }

    dp.setDate(time);
}
