$(function() {
	img = $('#hide_top_bar').children('img:first-child');
	orgtop = img.offset().top;

	$('#hide_top_bar').click(function() {
		
		height = $('#hide_top_bar').height();
		
		
		if ( img.offset().top < 0 ) {
			// img.offset({top: orgtop});
			img.animate({"top": "+=40"}, "slow");
			showbar();
		} else  {
			// img.offset({top: -height});
			img.animate({"top": "-=40"}, "slow");
			hidebar();
		
		}
		
	});

	function hidebar() {
	
		$('#top_bar').slideUp(500);
	
	}
	
	function showbar() {
	
		$('#top_bar').slideDown(500);
	
	}
});