//add-minus-quantity-box
//var unit = 0;
//var total;
//// if user changes value in field
//$('.field').change(function() {
//  unit = this.value;
//});
//$('.add').click(function() {
//  unit++;
//  var $input = $(this).prevUntil('.sub');
//  $input.val(unit);
//  unit = unit;
//});
//$('.sub').click(function() {
//  if (unit > 0) {
//    unit--;
//    var $input = $(this).nextUntil('.add');
//    $input.val(unit);
//  }
//});

$(document).ready(function(){
		
	//quick-view-modal
	//$('.quick-modal .sub-menu .toggle-ul').hide();
//	$(".quick-modal .sub-menu .main-a").click(function () {
//	  $(this).parent(".sub-menu").children(".toggle-ul").slideToggle("300");
//	  $(this).find("i.fa").toggleClass("flaticon-3-signs flaticon-4-minus");
//	});
	
	//modal
	$("#reg-m").click(function() {
			$('#myModal').modal('hide');  
	});
	
	$("#log-m").click(function() {
			$('#myModal2').modal('hide');  
	});
	
});

//sub-menu-slidetoggle
$(document).ready(function($){
    
       
            function tabs1(){ 
                    var windowSize = jQuery(window).width(); // Could've done $(this).width()
                    if(windowSize < 768){
                        $(".navbar-nav > li.has-child").click(function(){
                            $(this).toggleClass('toggle');
                            $(this).children('.nav-mega-menu').slideToggle();
                        });
                    }
            };
                
            tabs1();
});

// ===== Scroll to Top ==== 
$(window).scroll(function() {
    if ($(this).scrollTop() >= 150) {        // If page is scrolled more than 50px
        $('#return-to-top').fadeIn(400);    // Fade in the arrow
    } else {
        $('#return-to-top').fadeOut(400);   // Else fade out the arrow
    }
});
$('#return-to-top').click(function() {      // When arrow is clicked
    $('body,html').animate({
        scrollTop : 0                       // Scroll to top of body
    }, 1500);
});