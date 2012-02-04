function site_layouts_edit() {
	var layoutArea = document.getElementById("SiteLayoutLayout");
	var layoutMirror = CodeMirror.fromTextArea(layoutArea, {
	
		value: layoutArea.value,
		theme: "neat",
		lineNumbers: true,
		mode: "htmlmixed", 
		tabMode: "indent"
		
	});
	
	manual = $("label[for=\'SiteLayoutLayout\']").parent();
	upload = $("label[for=\'SiteLayoutUploadedLayout\']").parent();
	
	$("#editModeButton").html("Upload Layout");
	upload.hide();
	
	$("#toggleEditModeButton").click(function() {
		
		upload.slideUp(500);
		manual.slideUp(500);
		
		if ( upload.css("display") == "none" ) {
		
			$("#editModeButton").html("Edit Manually");
			upload.slideDown(500);
			
		} else {
		
			$("#editModeButton").html("Upload Layout");
			manual.slideDown(500);
		
		}
	
	
	});

}

function site_layouts_add() {

	var layoutArea = document.getElementById("SiteLayoutLayout");
	var layoutMirror = CodeMirror.fromTextArea(layoutArea, {
	
		value: layoutArea.value,
		theme: "neat",
		lineNumbers: true,
		mode: "htmlmixed", 
		tabMode: "indent"
		
	});
	
	
	manual = $("label[for=\'SiteLayoutLayout\']").parent();
	upload = $("label[for=\'SiteLayoutUploadedLayout\']").parent();
	
	$("#editModeButton").html("Upload Layout");
	upload.hide();
	
	$("#toggleEditModeButton").click(function() {
		
		upload.slideUp(500);
		manual.slideUp(500);
		
		if ( upload.css("display") == "none" ) {
		
			$("#editModeButton").html("Edit Manually");
			upload.slideDown(500);
			
		} else {
		
			$("#editModeButton").html("Upload Layout");
			manual.slideDown(500);
		
		}
	
	});

}