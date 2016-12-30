$(document).ready(function () {
    $('input[type=text]').focusout(function () {
        if ($(this).val() != '') {
            $(this).siblings('label').find('span').removeClass("input__label-content--hoshi");
            $(this).siblings('label').find('span').addClass("arriba");
        } else {
            $(this).siblings('label').find('span').removeClass("arriba");
            $(this).siblings('label').find('span').addClass("input__label-content--hoshi");

        }
    });
});
