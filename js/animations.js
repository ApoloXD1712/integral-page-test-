$(document).ready(function() {
    if ($('.banner').hasClass('_init')) {
        $('.banner').removeClass('_init').addClass('_active');
    }
    $('.banner._active .banner-close').click(function() {
        $('.banner').removeClass('_active').addClass('_closed');
    });
});