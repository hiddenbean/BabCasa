'use strict';

// Cache
var body = $('body');
var tranding = $('#tranding');
var Bathroom = $('#Bathroom');
var blog = $('#blog');
var Deals = $('#Todays-Deals');
var best = $('#best');
var newsletter = $('#newsletter');
var featureproduct = $('#featureproduct');
var topproduct = $('#topproduct');
var popularproduct = $('#popularproduct');
var productdetail = $('#productdetail');


// Slide in/out with fade animation function
jQuery.fn.slideFadeToggle  = function(speed, easing, callback) {
    return this.animate({opacity: 'toggle', height: 'toggle'}, speed, easing, callback);
};
//
jQuery.fn.slideFadeIn  = function(speed, easing, callback) {
    return this.animate({opacity: 'show', height: 'show'}, speed, easing, callback);
};
jQuery.fn.slideFadeOut  = function(speed, easing, callback) {
    return this.animate({opacity: 'hide', height: 'hide'}, speed, easing, callback);
};

jQuery(document).ready(function () {  
    
    // Sliders
    // ---------------------------------------------------------------------------------------
    if ($().owlCarousel) {
       
        
        // tranding carousel
        if (tranding.length) {
            tranding.owlCarousel({
                autoplay: false,
                loop: true,
                margin:20,
                dots: false,
                nav: true,
                navText: [
                    "<i class='fa fa-angle-left'></i>",
                    "<i class='fa fa-angle-right'></i>"
                ],
                responsive: {
                    0: {items: 1},
                    479: {items: 1},
                    768: {items: 2},
                    991: {items: 2},
                    1024: {items: 2},
                    1280: {items: 3}
                }
            });
        }
		
		// best carousel
        if (best.length) {
            best.owlCarousel({
                autoplay: false,
                loop: true,
                margin:20,
                dots: false,
                nav: true,
                navText: [
                    "<i class='fa fa-angle-left'></i>",
                    "<i class='fa fa-angle-right'></i>"
                ],
                responsive: {
                    0: {items: 1},
                    479: {items: 2},
                    768: {items: 3},
                    991: {items: 3},
                    1024: {items: 3},
                    1280: {items: 3}
                }
            });
        }
		
		// Bathroom carousel
        if (Bathroom.length) {
            Bathroom.owlCarousel({
                autoplay: false,
                loop: true,
                margin:20,
                dots: false,
                nav: true,
                navText: [
                    "<i class='fa fa-angle-left'></i>",
                    "<i class='fa fa-angle-right'></i>"
                ],
                responsive: {
                    0: {items: 1},
                    479: {items: 1},
                    768: {items: 3},
                    991: {items: 3},
                    1024: {items: 3},
                    1280: {items: 3}
                }
            });
        }
		
		// Blog carousel
        if (blog.length) {
            blog.owlCarousel({
                autoplay: true,
                loop: true,
                margin:10,
                dots: false,
                nav: true,
                navText: [
                    "<i class='fa fa-angle-left'></i>",
                    "<i class='fa fa-angle-right'></i>"
                ],
                responsive: {
                    0: {items: 1},
                    479: {items: 2},
                    768: {items: 2},
                    991: {items: 2},
                    1024: {items: 3},
                    1280: {items: 3}
                }
            });
        }
		
		
		// newsletter
        if (newsletter.length) {
            newsletter.owlCarousel({
                autoplay: true,
                loop: true,
                margin:20,
                dots: false,
                nav: true,
                navText: [
                    "<i class='fa fa-angle-left'></i>",
                    "<i class='fa fa-angle-right'></i>"
                ],
                responsive: {
                    0: {items: 1},
                    479: {items: 2},
                    768: {items: 1},
                    900: {items: 2},
                    1024: {items: 2},
                    1280: {items: 2}
                }
            });
        }
		
		// Todays-Deals carousel
        if (Deals.length) {
            Deals.owlCarousel({
                autoplay: false,
                loop: true,
                margin:0,
                dots: false,
                nav: true,
                navText: [
                    "<i class='fa fa-angle-left'></i>",
                    "<i class='fa fa-angle-right'></i>"
                ],
                responsive: {
                    0: {items: 1},
                    479: {items: 2},
                    768: {items: 3},
                    991: {items: 4},
                    1024: {items: 4},
                    1280: {items: 4}
                }
            });
        }
        
      
    }
	
	// topproduct carousel
        if (topproduct.length) {
            topproduct.owlCarousel({
                autoplay: false,
                loop: true,
                margin:10,
                dots: false,
                nav: true,
                navText: [
                    "<i class='fa fa-angle-left'></i>",
                    "<i class='fa fa-angle-right'></i>"
                ],
                responsive: {
                    0: {items: 1},
                    479: {items: 1},
                    768: {items: 2},
                    991: {items: 1},
                    1024: {items: 1},
                    1280: {items: 1}
                }
            });
        }
		
		// featureproduct carousel
        if (featureproduct.length) {
            featureproduct.owlCarousel({
                autoplay: false,
                loop: true,
                margin:10,
                dots: false,
                nav: true,
                navText: [
                    "<i class='fa fa-angle-left'></i>",
                    "<i class='fa fa-angle-right'></i>"
                ],
                responsive: {
                    0: {items: 1},
                    479: {items: 1},
                    768: {items: 2},
                    991: {items: 1},
                    1024: {items: 1},
                    1280: {items: 1}
                }
            });
        }
		
		// popularproduct carousel
        if (popularproduct.length) {
            popularproduct.owlCarousel({
                autoplay: false,
                loop: true,
                margin:10,
                dots: false,
                nav: true,
                navText: [
                    "<i class='fa fa-angle-left'></i>",
                    "<i class='fa fa-angle-right'></i>"
                ],
                responsive: {
                    0: {items: 1},
                    479: {items: 1},
                    768: {items: 2},
                    991: {items: 1},
                    1024: {items: 1},
                    1280: {items: 1}
                }
            });
        }  
		
		// productdetail carousel
        if (productdetail.length) {
            productdetail.owlCarousel({
                autoplay: false,
                loop: true,
                margin:20,
                dots: false,
                nav: true,
                navText: [
                    "<i class='fa fa-angle-left'></i>",
                    "<i class='fa fa-angle-right'></i>"
                ],
                responsive: {
                    0: {items: 1},
                    479: {items: 2},
                    768: {items: 3},
                    991: {items: 3},
                    1024: {items: 4},
                    1280: {items: 4}
                }
            });
        }  
    
});


