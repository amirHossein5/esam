$(function () {
    // dropdowns
    $('.dropdown').on('click', () => {
        var target = event.currentTarget;
        var dropdownZone = $(target).find('.dropdown-zone');

        if ($(dropdownZone).data('open')) {
            $(dropdownZone).fadeOut(200);
            $(dropdownZone).data('open', false)
        } else {
            $(dropdownZone).fadeIn(100);
            $(dropdownZone).data('open', true)
        }
    });

    // drop list
    $('.drop-list').on('click', () => {
        var target = event.currentTarget;
        var dropListZone = $(target).find('.drop-list-zone');

        $(target).data('open', ! $(target).data('open'))
        $(dropListZone).slideToggle(300);

        if ($(target).data('open')) {
            $(target).find('i').removeClass('icofont-caret-left');
            $(target).find('i').addClass('icofont-caret-down');
        } else {
            $(target).find('i').addClass('icofont-caret-left');
            $(target).find('i').removeClass('icofont-caret-down');
        }
    })

    // menu
    $('.open-menu').on('click', () => {
        $('.menu').show()
        $('.menu-overlay').show();
        $('body').addClass('overflow-hidden');

        $('.menu').animate({
            marginRight: '0px'
        }, 400);
    });

    $('.close-menu').on('click', () => {
        $('.menu-overlay').hide();
        $('body').removeClass('overflow-hidden');

        $('.menu').animate({
            marginRight: '-100%'
        }, 400, function () {
            $(this).hide()
        });
    });

    $('.menu-overlay').on('click', () => {
        $('.close-menu').click();
    })

    // showing children of menus

    var openedMenus = [];

    $('.show-children').on('click', () => {
        var target = event.currentTarget;

        if (!$(target).data('open')) {
            // back guider
            if (openedMenus.length == 0) {
                $('.menu-back-guider').show();
            } else {
                $('.menu-back-guider span').text(openedMenus[openedMenus.length - 1][1])
            }

            var nameOfCurrentMenu = $(target).children('span').text();
            openedMenus.push([$(target).attr('id'), nameOfCurrentMenu]);

            $('.menu-current-guider span').text(nameOfCurrentMenu);
            $(target).children('.children').show();
            $(target).data('open', true)
        }
    });

    $('.menu-back-guider').on('click', () => {
        $(`#${openedMenus[openedMenus.length - 1][0]}`).children('.children').hide()
        $(`#${openedMenus[openedMenus.length - 1][0]}`).data('open', false);

        openedMenus.pop();

        if (openedMenus.length == 0) {
            $('.menu-current-guider span').text('منوی اصلی');

            $('.menu-back-guider').hide();
            $('.menu-back-guider span').text('منوی اصلی');
        } else {
            $('.menu-current-guider span').text(openedMenus[openedMenus.length - 1][1]);
        }

        if (openedMenus.length >= 2) {
            $('.menu-back-guider span').text(openedMenus[openedMenus.length - 2][1]);
        } else {
            $('.menu-back-guider span').text('منوی اصلی');
        }
    });

    // select value inside of input
    $('input.select-inside-text').on('focus', () => {
        var target = event.currentTarget;
        $(target).select();
    })
})
