$(function() {

	size = $("#content_box").height();
	$(this).css("overflow-y", "hidden");
	
	if ( size == 500 ) {
			$("#content_box").hover(function() {
			
				$(this).css("overflow-y", "scroll");
			}, function() {
				$(this).css("overflow-y", "hidden");
			
			});
	}

}); 
