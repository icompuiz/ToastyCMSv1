
$(function() {

	$("ul.tabs").children("li").removeClass("active");
	$("ul.tabs li:nth-child(1)").addClass("active");
	
	$(".mainTabContent").children("div").hide();
	$(".mainTabContent div:nth-child(1)").show()
	
	$("ul.tabs").children("li").click(function() {
		var rel = "." + $(this).attr("tab");
		var group = "." + $(this).attr("group");
		$(this).parent().children("li").removeClass("active");
		$(this).addClass("active");
		
		$(group).children("div").hide();
		$(group + " div"+rel).show();
	});

});

