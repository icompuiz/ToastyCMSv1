var _key;
var _url;
var _changed;

function setConfirmUnload(on) {
    
	if ( on )
		_changed = true;
     window.onbeforeunload = (on) ? unloadMessage : null;

}

function unloadMessage() {
	
    return 'You have entered new data on this page.  If you navigate away from this page without first saving your data, the changes will be lost.';
	 

}


function setUnload(form) { 
     
    $(':input', form).bind("change", function() { setConfirmUnload(true) }); // Prevent accidental navigation away
	 $(window).unload(function() {
		unkey();
	});
	 
}



function unkey() {
	$.ajax({
	  type: 'POST',
	  url: _url,
	  data: "key=" + _key,
	});
}

function tmp(data) {
	document.write(data);
}

function setUnkey(key, url) { 
	
    _key = key;
    _url = url;
	
}