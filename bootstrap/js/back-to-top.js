$(function() { $(window).scroll(function() {
    if($(this).scrollTop()>300) {
        $('#Back-to-top').fadeIn();
        }
    else { $('#Back-to-top').fadeOut();}
    });
    $('#Back-to-top').click(function() {
        $('body,html')
        .animate({scrollTop:0},300)
        .animate({scrollTop:40},200)
        .animate({scrollTop:0},130)
        .animate({scrollTop:15},100)
        .animate({scrollTop:0},70);
        });
});