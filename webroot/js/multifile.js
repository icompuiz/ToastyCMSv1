// Multiple file selector by Stickman -- http://www.the-stickman.com 
// with thanks to: [for Safari fixes] Luis Torrefranca -- http://www.law.pitt.edu and Shawn Parker & John Pennypacker -- http://www.fuzzycoconut.com [for duplicate name bug] 'neal'
function MultiSelector(list_target, max, form, group, valid ){this.list_target = list_target;this.count = 0;this.id = 0;if( max ){this.max = max;} else {this.max = -1;};this.addElement = function( element ){if( element.tagName == 'INPUT' && element.type == 'file' ){ element.name = 'data['+form+'][' +group+ '][' + this.id++ + ']';element.multi_selector = this;element.onchange = function(){ if (validates(this.value, valid)) { var new_element = document.createElement( 'input' );new_element.type = 'file';this.parentNode.insertBefore( new_element, this );this.multi_selector.addElement( new_element );this.multi_selector.addListRow( this );this.style.position = 'absolute';this.style.left = '-100000px';this.style.top = '-10000px';} else { this.value = "";}};if( this.max != -1 && this.count >= this.max ){element.disabled = true;};this.count++;this.current_element = element;} else {alert( 'Error: not a file input element' );};};this.addListRow = function( element ){ var new_row = document.createElement( 'li' );var new_row_button = document.createElement( 'input' );new_row_button.type = 'button';/* new_row_button.value = 'Delete' */; new_row_button.className = 'delete_button';new_row.element = element;new_row_button.onclick= function(){this.parentNode.element.parentNode.removeChild( this.parentNode.element );this.parentNode.parentNode.removeChild( this.parentNode );this.parentNode.element.multi_selector.count--;this.parentNode.element.multi_selector.current_element.disabled = false;return false;};new_row.innerHTML = getBaseFile(element.value);new_row.appendChild( new_row_button );this.list_target.appendChild( new_row );} ;};
function getBaseFile( file ) {	parts = file.split("\\"); return parts[parts.length -1]; }
function validates(string, valid) {

	if ( valid[0] == '*' )
		return true;

	var parts = string.split(".");
	ext = parts.pop();
	
	//var valid = ['js', 'css', 'png', 'jpg', 'jpeg', 'gif'];
	
	for(var i = 0; i < valid.length; i++) {
		if(valid[i] == ext) {
			return true;
		}
	}
	return false;

}