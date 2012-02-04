$('.feed').each(function(index) {

	children = $(this).find('.feed-element');
	size = children.size();
	if (size > 3) {
	
		elements  = $(this).find('.elements');
		id = elements.attr('id');
		elements.jCarouselLite({
			vertical: true,
			visible: 3,
			auto: 3000,
			speed: 2000,
			hoverPause: true,
			scroll: 1,
			btnNext: ".next_" + id,
			btnPrev: ".prev_" + id,
			
		});
		
		
		$(this).hover(function() {
			feed_nav  = $(this).find('.feed_nav');
			feed_nav.css("display", "block");
			$(this).find('.elements').css("top", "-24px");
		}, function() {
			feed_nav  = $(this).find('.feed_nav');
			feed_nav.css("display", "none");
			$(this).find('.elements').animate({top: "+=24"}, 2);
		
		});
		
	}

});

