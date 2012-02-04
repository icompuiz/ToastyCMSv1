function contents_edit() {
	$("#ContentTitle").keydown().keyup(function() {
				
		var title = $("#ContentTitle").attr("value");
		title = title.toLowerCase();
		title = title.replace(/\s+/g,"_");
		 $("#ContentAlias").val(title);

	});

	tinyMCE.init(
	{
		mode    : "textareas",
		theme   : "advanced",
		editor_selector : "mceEditor",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
		
	});

	var jsArea = document.getElementById("ContentJs");
	var jsMirror = CodeMirror.fromTextArea(jsArea, {

		value: jsArea.value,
		mode: "javascript",
		theme: "neat",
		lineNumbers: true,
	});
	var cssArea = document.getElementById("ContentCss");

	var cssMirror = CodeMirror.fromTextArea(cssArea, {

		value: cssArea.value,
		mode: "css",
		theme: "neat",
		lineNumbers: true,

	});
}
function contents_add() {
	$("#ContentTitle").keydown().keyup(function() {
				
		var title = $("#ContentTitle").attr("value");
		title = title.toLowerCase();
		title = title.replace(/\s+/g,"_");
		 $("#ContentAlias").val(title);

	});

	tinyMCE.init(
	{
		mode    : "textareas",
		theme   : "advanced",
		editor_selector : "mceEditor",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
		
	});


		
	var jsArea = document.getElementById("ContentJs");
	var jsMirror = CodeMirror.fromTextArea(jsArea, {

		value: jsArea.value,
		mode: "javascript",
		theme: "neat",
		lineNumbers: true,
	});
	var cssArea = document.getElementById("ContentCss");

	var cssMirror = CodeMirror.fromTextArea(cssArea, {

		value: cssArea.value,
		mode: "css",
		theme: "neat",
		lineNumbers: true,

	});

}