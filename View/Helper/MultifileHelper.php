<?php
App::uses('FormHelper', 'View/Helper');

class MultifileHelper extends AppHelper {
	public $helpers = array('Form', 'Html');

	function makeFileArea($elementName, $formName, $maxFiles=3, $valid='*') {
	
			$line = implode("','", split(',',$valid));
			$line = "['$line']";
			$line = str_replace(" ", "", $line);
			
			if ($valid == '*')
				$line = "['*']";
	
			$elementId = ucfirst($formName).ucfirst($elementName);
	
			$filefield = $this->Form->file($elementName, array('class'=>'multiFileAddButton'));
			$filearea = "<div class='fileArea'><ul id='${elementName}_list' class='multiFileAddList'></ul></div>";
			$css = $this->Html->css('stylesheets/multifile');
			$camelized = Inflector::camelize($elementId);
			$script = $this->Html->script('multifile')."<script> var valid = $line; var multi_selector_$elementName = new MultiSelector( document.getElementById( '${elementName}_list' ), $maxFiles, '".ucfirst($formName)."', '$elementName', valid ); multi_selector_$elementName.addElement( document.getElementById( '$camelized' ) );</script>";
			
			$multifileHeader = "<!-- MultiFile -->";
			
			return $multifileHeader.$css."<div class='multifilearea'><div class='MultiFile'>".$filefield.$filearea."</div></div>".$script;
	}
	
	
}

?>
