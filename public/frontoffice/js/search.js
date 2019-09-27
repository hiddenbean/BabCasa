// JavaScript Document
$('#buttonsearch').click(function(){
				$('#formsearch').slideToggle( "fast",function(){
					 $( '#content' ).toggleClass( "moremargin" );
				} );
				$('#searchbox').focus()
				$('.openclosesearch').toggle();
		});