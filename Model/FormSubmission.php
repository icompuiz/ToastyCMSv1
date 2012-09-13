<?php
App::uses('AppModel', 'Model');

class FormSubmission extends AppModel {

	

	public function beforeValidate($options) {
		$form = $this->Form->read(null, $this->data['FormSubmission']['form_id']);
		
		$fields = $this->getFields($form);
		
		foreach ( $fields as $field ) {
		
			if ( $field['required'] == 1 ) {
			
				$this->validator()->add($field['name'], 'required', array( 'rule' => 'notEmpty', 'required' => true));
				if ( $field['type'] == 'file' ) {
					$this->validator()->add($field['name'], 'required', array( 'rule' => array('isFile'), 'message' => 'file is required'));
				
				}
			
			}
			
		
		}

		return true;
	
	}
	
	public function isFile($check) {
	
		$check = array_shift($check);
		return $check['error'] == 0;
	
	}
	
	public function uploadFile($file) {
		
		$file = $this->upload($file, "forms");		
		return $file;
	
	}
	
	/** 
		Upload a file to the appropriate webroot directory 
		image types will be uploaded to the webroot/img
		css files will be uploaded to the webroot/css
		javascript files will be uploaded to the webroot/js
		If a base path is passed in the file will be 
		uploaded to the base path
		If the the based path does not exist it will be created
	 */
	
	
	function upload($file, $base=null)
	{
	
		if ( $file['error'] != 0 ) {
			return "";
		}
			
		$uploaded     = true;
		
		$replace = array(",", " ");
		$name 		= str_replace($replace, "", $file['name']);
		$name 		= str_replace(" ", "_", $name);		
		
		$rel_url    = $base ? strtolower($base) : '';
		$folder_url = WWW_ROOT . $rel_url;
		

		if (!is_dir($folder_url))
		{
			mkdir($folder_url);
		}	
	
		$full_url = $folder_url . DS .$name;
		$url      = $rel_url . DS . $name;
				
		$exists   = false;
		if ( file_exists( $full_url ) ) { 
			$exists = true;
		}
		$uploaded = move_uploaded_file( $file['tmp_name'], $full_url);
		
		if ($uploaded)
			chmod($full_url, 0775);
		
		if ($uploaded)
		{
			unset($uploaded);
			$uploaded[$this->name]['name'] = $name;
			$uploaded[$this->name]['path'] = $url;
			$uploaded[$this->name]['fileType'] = $file['type'];
			
		}
		
		return $uploaded;
		
	}
	
	
	public function beforeSave($option) {
	
		// pr($this->data['FormSubmission']['form_id']); exit;
		$form = $this->Form->read(null, $this->data['FormSubmission']['form_id']);
		$fields = $this->getFields($form);
		$uniqid = uniqid();
		foreach ($fields as $field) {
		
			if ($field['type'] == 'file') {
				
				$file = $this->data['FormSubmission'][$field['name']];
				
				
				$file['name'] = $uniqid."_" . $field['name']. "_".$file['name'];
				
				$filePath = $this->uploadFile($file);
				if ( !empty($filePath['FormSubmission']['path']) ) {
					$this->data['FormSubmission'][$field['name']] = $filePath['FormSubmission']['path'];
				}
			
			}
		
		}
		
		$data['FormSubmission']['form_id'] = $this->data['FormSubmission']['form_id'];
		unset($this->data['FormSubmission']['form_id']);
		$data['FormSubmission']['unique_id'] = $uniqid;
		$data['FormSubmission']['data'] = json_encode($this->data['FormSubmission']);
		$data['FormSubmission']['created'] = date("Y-m-d H:i:s"); // 0000-00-00 00:00:00
		$data['FormSubmission']['modified'] = date("Y-m-d H:i:s"); // 0000-00-00 00:00:00
		$this->data = $data;
		
		return true;
		
	}
	
	public function getFields($form) {
		
		$xml = Xml::toArray(Xml::build($form['Form']['fields']));
		$form_fields = array();
		if ( empty ( $xml['form']['sections'] )) { continue; }
		foreach ( $xml['form']['sections'] as $sections ) {
		
			foreach ( $sections as $section ) {
			
				if ( empty ($section['blocks']  )) { continue; }
				foreach ( $section['blocks'] as $blocks ) {
				
					foreach ( $blocks as $block ) {
					
						if ( empty ($block['fields'] )) { continue; }
						foreach ($block['fields'] as $fields) {
						
							foreach ( $fields as $field ) {
							
								if ( empty($field['@name']) || empty($field['@type']) ) { continue; }
								
								
								$tmp['name'] = $field['@name'];
								$tmp['type'] = $field['@type'];
								
								if ( !empty( $field['@required'] )) {
									$tmp['required'] = 0;
								} else {
									$tmp['required'] = 1;
								
								}
								
								$form_fields[]= $tmp;
								unset($tmp);
							}
							unset($block);
						
						}
						unset($blocks);
					}
					unset($section);
				}
				unset($sections);
			}
		
		}
		return $form_fields;
	}
	
	public $belongsTo = array(
		'Form' => array(
			'className' => 'Form',
			'foreignKey' => 'form_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}