var cookieSettings = $('.js-cookie-settings');
var popupCookie = $('.js-popup-cookie');
var popupCookieWrapper = $('.js-popup-cookie__wrapper');

//TODO - comment out if ()
//if (document.cookie.indexOf('cookie_notice') !== -1) {
    popupCookieWrapper.addClass('state_hidden');
//}

if (popupCookieWrapper.hasClass('state_hidden')) {
    $('body').removeClass('state_fixed');
} else {
    $('body').addClass('state_fixed');
}

// $('.js-popup-cookie__settings-button').on('click',function(){
//     cookieSettings.removeClass('state_hidden');
//     popupCookie.addClass('state_hidden');
// });
// $('.js-cookie-settings .js-cookie-settings__close__footer').on('click', function (e) {
//     popupCookie.addClass('state_hidden');
//     popupCookieWrapper.addClass('state_hidden');
//     popupFooterClose.removeClass('js-cookie-settings__close__footer');
// });


$('.js-cookie-settings__close').on('click', function (e) {
    $(this).closest('.js-popup').addClass('state_hidden');
    // cookieSettings.addClass('state_hidden');

    if ($(this).hasClass('js-cookie-settings__close__footer')) {
        popupCookieWrapper.addClass('state_hidden');
        popupCookie.addClass('state_hidden');
        popupFooterClose.removeClass('js-cookie-settings__close__footer');
        popupFooterCloseAboutCookies.addClass('js-cookie-settings__close__footer');
    } else if ($(this).closest('.js-popup').hasClass('js-cookie-settings') || $(this).closest('.js-popup').hasClass('js-popup-cookie__about-privacy') || $(this).closest('.js-popup').hasClass('js-about-cookie')) {
        popupCookie.removeClass('state_hidden');
    } else {
        cookieSettings.removeClass('state_hidden');
        // popupAboutCookie.removeClass('state_hidden');
    }
});

// $('.js-cookie-input').on('change',function(e){
//     if ($(e.currentTarget).prop('checked')) {
//         console.log(e.currentTarget);
//     }
// });

$('.js-popup-cookie__submit').on('click', function (e) {
    cookieSettings.find('.js-cookie-input').attr('checked', true);
});

$('#formCookie').on('submit', function (e) {
    e.preventDefault();
    $('body').removeClass('state_fixed');

    $.ajax({
        url: $('#formCookie').attr('action'),
        type: "POST",
        data: $('#formCookie').serialize(),
        dataType: 'html'
    }).done(function (data) {
        window.location.reload();

        if (data.success === true) {
            $('.popup-cookie__wrapper').addClass('state_hidden');
            // document.cookie = data.cookie;
        }
    });
    // $('.popup-cookie__wrapper').addClass('state_hidden'); //удалить по завершении задачи
    return false;
});
var popupOpenLink = $('.js-popup-open');
var popupAboutPrivacy = $('.js-popup-cookie__about-privacy');
var popupAboutCookie = $('.js-about-cookie');
var popupFooterClose = $('.js-cookie-settings .js-cookie-settings__close');
var popupFooterCloseAboutCookies = $('.js-about-cookie .js-cookie-settings__close');
popupOpenLink.on('click', function (e) {
    e.preventDefault();
    var popupOpenLinkAttr = $(this).attr('data-target');
    if (popupOpenLinkAttr.length) {
        switch (popupOpenLinkAttr) {
            case ('about-privacy'):
                popupAboutPrivacy.removeClass('state_hidden');
                popupCookie.addClass('state_hidden');
                break;
            case ('about-cookie'):
                cookieSettings.addClass('state_hidden');
                popupAboutCookie.removeClass('state_hidden');
                popupCookie.addClass('state_hidden');
                break;
            case ('manage-cookies'):
                if (document.cookie.indexOf("ga-disable-UA-33179576-1") === 0) {
                    console.log('tcnm');
                }
                cookieSettings.removeClass('state_hidden');
                popupCookie.addClass('state_hidden');
                break;
            case ('manage-cookies__footer'):
                chechCookies();
                cookieSettings.removeClass('state_hidden');
                popupCookieWrapper.removeClass('state_hidden');
                popupCookie.addClass('state_hidden');
                popupFooterClose.addClass('js-cookie-settings__close__footer');
                popupFooterCloseAboutCookies.addClass('js-cookie-settings__close__footer');
                break;
        }
    }
});
function chechCookies() {
    var allCookies = document.cookie.split(';');
    $(allCookies).each(function (i, val) {
        var currentCookie= val.split('=')[0];
        console.log(currentCookie);
        var currentCheckbox = cookieSettings.find('input[name=' + currentCookie + ']');
        if (currentCheckbox) {
            currentCheckbox.prop('checked', true);
        }
    })
}
var cookieLink = $('.js-about-cookie').find('.about-cookie__item');
var cookieInfo = $('.js-about-cookie').find('.js-about-cookie__info-wrapper');
var cookieWrapper = $('.js-about-cookie__item-wrapper');

cookieLink.on('click', function (e) {
    var currentState = $(this).hasClass('state_dropdown-active');

    cookieInfo.each(function(i, el) {
        if ($(el).css('display') === 'block') {
            $(el).closest(cookieWrapper).find('.about-cookie__item').removeClass('state_dropdown-active');
            $(el).slideUp();
        }
    });

    if (!currentState) {
        $(this).closest('.about-cookie__item-wrapper').find('.js-about-cookie__info-wrapper').slideToggle();
        $(this).toggleClass('state_dropdown-active');
    }
});


