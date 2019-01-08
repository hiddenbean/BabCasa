/* ============================================================
 * Gallery
 * Showcase your portfolio or even use it for an online store!
 * For DEMO purposes only. Extract what you need.
 * ============================================================ */

$(function() {


     /* DETAIL VIEW
    -------------------------------------------------------------*/

    /*
        Toggle detail view using DialogFx
        http://tympanus.net/Development/DialogEffects/
    */
    $('body').on('click', '.gallery-item', function() {
        var dlg = new DialogFx($('#itemDetails').get(0));
        dlg.toggle();
    });

    /*
        Look for data-image attribute and apply those
        images as CSS background-image 
    */
    $('.item-slideshow > div').each(function() {
        var img = $(this).data('image');
        $(this).css({
            'background-image': 'url(' + img + ')',
            'background-size': 'cover'
        })
    });

    /* 
        Touch enabled slideshow for gallery item images using owlCarousel
        www.owlcarousel.owlgraphic.com
    */
    $(".item-slideshow").owlCarousel({
        items: 1,
        nav: true,
        navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
        dots: true
    });

});