<?php

class TagComponent extends Component {

	
	public function parse($html, $controller) {
		$view = new View($controller);
        $htmlHelper = $view->loadHelper('Html');
	
		$idx = strpos($html, '${');
		$end_idx = strpos($html, '}', $idx);
		while ($idx && $end_idx) {
			
			// $tag = substr($html, $idx+2, ($end_idx-2) - $idx);
			$length = $end_idx - $idx + 1;
			$tag = substr($html, $idx+2, $length-3);
			$tag = $this->_chomp($tag);
			$tag = split(',',$tag);
			$attributes = array();
			$element = '';
			switch ($tag[0]) {
			
				case 'image':
				case 'img':
				
				unset($tag[0]);
				
				foreach($tag as $attr) {
				
					$tmp = split('=', $attr);
					
					if ($tmp[0] == 'src' || $tmp[0] == 'source') {
						$source = $tmp[1];
						$path = APP . WEBROOT_DIR . DS;
						
						if (  file_exists( $path . "img" . DS . $source) ) {
							$source = $source;
						
						} elseif ( file_exists( $path . "img" . DS . "mediafiles" . DS . $source) ) {
							$source = "mediafiles/$source";
						} else {
							$source = "image_not_found.png";
						}

					} else {
						$attributes[$tmp[0]] = isset($tmp[1]) ? $tmp[1] : null;
					}
				
				}
				
				if ( !isset($source) )
					$source = "image_not_found.png";
				
				$element = $htmlHelper->image($source, $attributes);
				
				
				break;
			
			}
			
			$part1 = substr($html, 0, $idx);
			$part2 = substr($html, $end_idx+1, strlen($html)-1);
			$html = $part1 . $element . $part2;
			$idx = strpos($html, '${', $end_idx);
			$end_idx = strpos($html, '}', $idx);
		}
		
		return $html;
	
	}
	
	public function parseProfileLayout($html, $fields, $values, $controller) {
		$view = new View($controller);
        $htmlHelper = $view->loadHelper('Html');
		
		
		$idx = strpos($html, '${');
		$end_idx = strpos($html, '}', $idx);
		
		while ($idx >= 0 && $end_idx) {
		
			$length = $end_idx - $idx + 1;
			$tag = substr($html, $idx+2, $length-3);
			$tag = $this->_chomp($tag);
			
			if (isset($fields[$tag])) {
			
				if(isset($values[$tag])) {
					$type = $fields[$tag];
					$value = $values[$tag];
					
					$output = $this->_output($type, $value, $htmlHelper);
					$part1 = substr($html, 0, $idx);
					$part2 = substr($html, $end_idx+1, strlen($html)-1);
					$html = $part1 . $output . $part2;
				}
					
			}
			
			$idx = strpos($html, '${');
			if (empty($idx)) {
				break;
			}
			$end_idx = strpos($html, '}', $idx);
		}	
	}
	private function _output($type, $value, $htmlHelper) {
	
		switch($type) {
			case ('string'):
				$output = $value;
				break;
			case ('text'):
				$output = $value;
				break;
			case ('image'):
				$output = $htmlHelper->image(substr($value, 4));
				break;
			case ('datetime'):
				break;
			case ('time'):
				$output = $value['day'] . " at " . $value['hour'] . ":" . $value['min'] . " " . $value['meridian'];
				break;
			default:
				$output = $value;
				break;
		}
		
		return $output;
	
	}
	private function _chomp($val) {
	
		$val = strip_tags($val);
		$val = preg_replace('/\n+/','', $val);
		$val = str_replace(' ','', $val);
		$val = str_replace('"','', $val);
		$val = str_replace("'",'', $val);
		
		return $val;
	
	}


}