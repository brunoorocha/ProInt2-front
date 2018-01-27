$(function() {

    var offCanvasOn = false;

    offCanvasNavActivate();
    $('.mask').hide();

    $('.toggle-nav-left').on('click', function() {
        $('.nav-left').addClass('nav-left-active')
        $('.mask').show();
        offCanvasOn = true;
    });

    $('.mask').on('click', function() {
        $('.nav-left').removeClass('nav-left-active')
        $('.mask').hide();
        offCanvasOn = false;
    });

    $(window).resize(function() {
        offCanvasNavActivate();
    })

    function offCanvasNavActivate() {
        if(window.innerWidth >= 960) {
            $('.nav-left').addClass('nav-left-active')
            $('.nav-left').removeClass('position-fixed')
            $('.toggle-nav-left').parent().hide();

            offCanvasOn = false;
            $('.mask').hide();
        } else {
            if(offCanvasOn) {
                $('.mask').show();
            } else {
                $('.nav-left').removeClass('nav-left-active')
            }

            $('.toggle-nav-left').parent().show();
            $('.nav-left').addClass('position-fixed')
        }
    }
})
