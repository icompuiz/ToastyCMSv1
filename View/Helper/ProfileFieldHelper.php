<?php

class ProfileFieldHelper extends AppHelper 
{
	public $helpers = array('Form', 'Html', 'Multifile');
	
	public function viewParse($field) {
		
		switch ($field['type']) 
		{
			case ('string'):
				$output = $field['value'];
				break;
			case ('text'):
				$output = $field['value'];
				break;
			case ('image'):
				$output = $this->Html->image(substr($field['value'], 4));
				break;
			case ('time'):
				$output = $field['value']['day'] . " at " . $field['value']['hour'] . ":" . $field['value']['min'] . " " . $field['value']['meridian'];
				break;
			case ('datetime'):
				$output = $field['value'];
			case ('link'):
				
				$http = strpos($field['value'], 'http://');
				$https = strpos($field['value'], 'https://');
				
				
				if ( strlen($http) == 0 && strlen($https) == 0 ) 
					$field['value'] = "http://" .$field['value'];
				
				$output = $field['value'];
				break;
			default:
				$output = $field['value'];
				break;
		}
	
		return $output;
	
	}

	public function parse($fields, $formname) {
	
		$index = 0;
		$output = '';
		foreach (array_keys($fields) as $key) {
			$action = $fields[$key];
			
			switch ($action ) 
			{
				case ('string'):
					$output .= $this->Form->label($key, Inflector::humanize($key));
					$output .= $this->Form->text($key);
					break;
				case ('text'):
					$output .= $this->Form->label($key, Inflector::humanize($key));
					$output .= $this->Form->textarea($key);
					break;
				case ('image'):
					$output .= $this->Form->label($key, Inflector::humanize($key));
					$output .= $this->image($key, $formname);
					$output .= $this->Form->hidden("old_$key");
					break;
				case ('time'):
					$output .= $this->Form->label($key, Inflector::humanize($key));
					$days  = array('Sunday'=>'Sunday','Monday'=>'Monday','Tuesday'=>'Tuesday','Wednesday'=>'Wednesday','Thursday'=>'Thursday','Friday'=>'Friday','Saturday'=>'Saturday');
					$output .= $this->Form->select($key . '.day', $days);
					$output .= "&nbsp;at&nbsp;";
					$output .= $this->Form->dateTime($key, null, '12', array('empty' => false));
					break;
				case ('datetime'):
					$output .= $this->Form->label($key, Inflector::humanize($key));
					$output .= $this->Form->dateTime($key, 'DMY', '12', array('empty' => false));
					break;
				default:
					$output .= $this->Form->input($key);
				
					break;
			}
			$index++;
		}
		
		return $output;
		
	}
	
	public function image($elementname, $formname) {
	
		return $this->Multifile->makeFileArea($elementname,$formname,1, 'jpg, jpeg, png,gif');
	
	}
	
	

}