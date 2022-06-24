function select2TagsInForm(select2InputId = '#select2', mainInputId = '#tags', formId = '#form', as = 'تگ') {
    var data = $(mainInputId).val() ? $(mainInputId).val().split(',') : null;

    $(select2InputId).select2({
        tags: true,
        data: data,
        tokenSeparators: [','],
        placeholder: as + ' های مورد نظر را وارد کنید'
    });

    $(`${select2InputId} option`).attr('selected', true).trigger('change');

    $(formId).submit(function (e) {
        $(mainInputId).val($(select2InputId).val());
    })
}
