$(window).on('load', e => {
    $('.preloader').fadeOut();
})

$('#side-bar-expender').on('click', e => {
    e.preventDefault();
    if ($('#side-bar-expender').hasClass('active') && $(window).width() <= 992) {
        $('#side-bar-expender').css('transform', 'rotate(-180deg)')
        $('.nav-side').css('transform', 'translateX(0%)');
    } else {
        $('#side-bar-expender').css('transform', 'rotate(0deg)')
        $('.nav-side').css('transform', 'translateX(-100%)');
    }
})