function datePickerOptions(altField = "#main-date-picker") {
    return {
        inline: false,
        format: "YYYY/MM/DD  H:m:s",
        viewMode: "day",
        initialValue: false,
        minDate: null,
        maxDate: null,
        autoClose: false,
        position: "auto",
        altFormat: "U",
        altField: altField,
        onlyTimePicker: false,
        onlySelectOnDate: false,
        calendarType: "persian",
        inputDelay: 800,
        observer: true,
        calendar: {
            persian: {
                locale: "fa",
                showHint: true,
                leapYearMode: "algorithmic",
            },
            gregorian: {
                locale: "en",
                showHint: false,
            },
        },
        navigator: {
            enabled: true,
            scroll: {
                enabled: true,
            },
            text: {
                btnNextText: "<",
                btnPrevText: ">",
            },
        },
        toolbox: {
            enabled: true,
            calendarSwitch: {
                enabled: true,
                format: "MMMM",
            },
            todayButton: {
                enabled: true,
                text: {
                    fa: "امروز",
                    en: "Today",
                },
            },
            submitButton: {
                enabled: true,
                text: {
                    fa: "تایید",
                    en: "Submit",
                },
            },
            text: {
                btnToday: "امروز",
            },
        },
        timePicker: {
            enabled: true,
            step: 1,
            hour: {
                enabled: true,
                step: null,
            },
            minute: {
                enabled: true,
                step: null,
            },
            second: {
                enabled: true,
                step: null,
            },
            meridian: {
                enabled: false,
            },
        },
        dayPicker: {
            enabled: true,
            titleFormat: "YYYY MMMM",
        },
        monthPicker: {
            enabled: true,
            titleFormat: "YYYY",
        },
        yearPicker: {
            enabled: true,
            titleFormat: "YYYY",
        },
        responsive: true,
    };
}
