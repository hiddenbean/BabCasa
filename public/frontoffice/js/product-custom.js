//range-slider
$( function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 500,
      values: [ 75, 300 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
      " - $" + $( "#slider-range" ).slider( "values", 1 ) );
  } );
  
  
  
//sidebar
$(".main-side-bar .sub-menu a").click(function () {
  $(this).parent(".sub-menu").children("ul").slideToggle("300");
  $(this).find("i.fa").toggleClass("flaticon-3-signs flaticon-4-minus");
}); 

//tooltip
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})