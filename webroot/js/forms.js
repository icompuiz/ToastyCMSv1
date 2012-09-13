function forms_edit() {
	$("#FormTitle").keydown().keyup(function() {
				
		var title = $("#FormTitle").attr("value");
		title = title.toLowerCase();
		title = title.replace(/\s+/g,"_");
		 $("#FormAlias").val(title);

	});

	tinyMCE.init(
	{
		mode    : "textareas",
		theme   : "advanced",
		editor_selector : "mceEditor",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
		
	});
	
	var fieldsArea = document.getElementById("FormFields");
	var fieldsMirror = CodeMirror.fromTextArea(fieldsArea, {

		value: fieldsArea.value,
		mode: "xml",
		theme: "neat",
		lineNumbers: true,
	});

	var jsArea = document.getElementById("FormJs");
	var jsMirror = CodeMirror.fromTextArea(jsArea, {

		value: jsArea.value,
		mode: "javascript",
		theme: "neat",
		lineNumbers: true,
	});
	var cssArea = document.getElementById("FormCss");

	var cssMirror = CodeMirror.fromTextArea(cssArea, {

		value: cssArea.value,
		mode: "css",
		theme: "neat",
		lineNumbers: true,

	});
}
function forms_add() {
	$("#FormTitle").keydown().keyup(function() {
				
		var title = $("#FormTitle").attr("value");
		title = title.toLowerCase();
		title = title.replace(/\s+/g,"_");
		 $("#FormAlias").val(title);

	});

	tinyMCE.init(
	{
		mode    : "textareas",
		theme   : "advanced",
		editor_selector : "mceEditor",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
		
	});
	
	var fieldsArea = document.getElementById("FormFields");
	var fieldsMirror = CodeMirror.fromTextArea(fieldsArea, {

		value: fieldsArea.value,
		mode: "xml",
		theme: "neat",
		lineNumbers: true,
	});


		
	var jsArea = document.getElementById("FormJs");
	var jsMirror = CodeMirror.fromTextArea(jsArea, {

		value: jsArea.value,
		mode: "javascript",
		theme: "neat",
		lineNumbers: true,
	});
	var cssArea = document.getElementById("FormCss");

	var cssMirror = CodeMirror.fromTextArea(cssArea, {

		value: cssArea.value,
		mode: "css",
		theme: "neat",
		lineNumbers: true,

	});

}

function forms_view() {

	tinyMCE.init(
	{
		mode    : "textareas",
		theme   : "advanced",
		editor_selector : "mceEditor",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
		
	});

}