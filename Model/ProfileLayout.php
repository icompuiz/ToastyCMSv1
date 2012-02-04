<?php
App::uses('AppModel', 'Model');
/**
 * ProfileLayout Model
 *
 */
class ProfileLayout extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
 
	public $path = 'View/ProfileLayouts/Layouts';
	public $displayField = 'name';

 
	public $validate = array(
		'name' => array(
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
	
	private function getPath($id=null) {
	
		$layout  = $this->read(null, $id);
		$name = $layout['ProfileLayout']['name'];
		$path = APP. $this->path . DS . $name;
		 
		return $path;
	}
	
	public function readFields($id=null) {
		
		if ( !empty( $id ) ) {
			$path = $this->getPath($id) . DS . 'config.xml';
						
			$xml = Xml::toArray(Xml::build($path));
			
			
			foreach (array_keys($xml['layout']['fields']) as $field) {
				$fields[$field] = $xml['layout']['fields'][$field]['@type'];
			}
			return $fields;
		}
		return null;
	
	}
	
	public function readLayout($id=null) {
		if ( !empty( $id ) ) {
			$path = $this->getPath($id) . DS . 'layout.html';
			
			App::uses('File', 'Utility');
			
			$file = new File($path);
			$layout = $file->read();
			
			
			return $layout;
		}
		return null;
	}
	
}
