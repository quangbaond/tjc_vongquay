$(document).ready(function() {

    $('#onTop').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 1000);
    });
    $('#social').click(function() {
        $('.socials').toggleClass('height_auto');
        $('#zalo').toggleClass('hidden');
        $('#messenger').toggleClass('hidden');
        $('#close_social').toggleClass('hidden');
    });
    $('#close_social').click(function() {
        $('.socials').toggleClass('height_auto');
        $('#zalo').toggleClass('hidden');
        $('#messenger').toggleClass('hidden');
        $('#close_social').toggleClass('hidden');
    });
});
