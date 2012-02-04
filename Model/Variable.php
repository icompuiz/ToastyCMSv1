<?php
App::uses('AppModel', 'Model');
/**
 */
class Variable extends AppModel {

	public $useTable = false;
	public $useDbConfig = 'variables';
	
	public $_schema = array(
		'key' => array(
			'type' => 'string',
			'length' => 255
		),
		'value' => array(
			'type' => 'string',
			'length' => 255
		),
		'comment' => array(
			'type' => 'string',
			'length' => 255
		)
	);
	
	public $validate = array(
		'key' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'value' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	
	public function save($data=null) {
	
		if ($data) {
			$this->data = $data;
			
			if ($this->validates()) {
			
				App::uses('Folder', 'Utility');
				App::uses('File', 'Utility');
				
				$path = $this->getDataSource()->config['path'] . '/variables.csv';
				
				$file = new File($path);
				
				if ( $file->open('r') ) {
				
					$data = $file->read();
					
					$file->close();
					
					$data = preg_split('/\n/', $data);
					$columns = array_shift($data);
					
					
					foreach ($data as $line) {
					
						$tmp = explode(",", $line);
						$csv['key'] = $tmp[0];
						$csv['value'] = $tmp[1];
						$csv['comment'] = $tmp[2];
						$variables[] = $csv;
											
					}
					foreach ($variables as &$variable) {
					
						if ($variable['key'] == $this->data['Variable']['key'] ) {
						
							$variable['value'] = $this->data['Variable']['value'];
							$variable['comment'] = $this->data['Variable']['comment'];
						
						}
					}
					unset($variable);
					$output = $columns;
					
					
					for ( $i = 0; $i < count($variables); $i++ ) {
						$variable = $variables[$i];
						$output .= "\n" . $variable['key'] . "," . $variable['value'] . "," . $variable['comment'];
					}					
					
					if ($file->open("w")) {
						$file->write($output);
					} else {
						return false;
					}
				}	else {
						return false;
					}	
				
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	
	
	}
}