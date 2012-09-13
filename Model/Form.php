<?php
App::uses('AppModel', 'Model');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class Form extends AppModel {

	public $displayField = "name";
	
	public $validate = 
	array(
		'name' => 
			array(
				'notempty' =>
				array(
					'rule' => array('notempty'),
					'message' => 'This field cannot be empty'
				)
			),
		'fields' => 
			array(
				'notempty' =>
				array(
					'rule' => array('notempty'),
					'message' => 'This field cannot be empty'
				)
			)
	);
	
	public $hasMany = array(
		'FormSubmission' => array(
			'className' => 'FormSubmission',
			'foreignKey' => 'form_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
	private function getFormSubmissionTXT($submission) {
	
		
		$format = "%-30.30s | %s\r\n";
		$divider = sprintf("%'.-60s\r\n", "");;
		
		
		$content = sprintf("Form Submission ID: %s\r\r\n\n", $submission['unique_id']);
		$content .= sprintf("Submitted on: %s\r\r\n\n", $submission['created']);
		
		$content .= sprintf($format, "Field Name", "Value");
		$content .= $divider;
		
		$data = $submission['data'];
		foreach (array_keys($data) as $key) {
		
			$content .= sprintf($format, Inflector::humanize($key), $data[$key]);
			$content .= $divider;
			
		}
	
		return $content;
	}
	
	private function getFields($form) {
	
		$form_name = $form['form']['@name'];
		$form_sections = $form['form']['sections']['section'];
		$fields = array();
		
		foreach ($form_sections as $section) 
		{

			
			$section_blocks = $section['blocks']['block'];
			foreach ($section_blocks as $block) 
			{
				
				if( empty($block['@name']) ) {
					continue;
				}
			
				$block_name = $block['@name'];
				
				if ( empty($block['fields']['field'] ) ) { 
					continue;
				}
				
				$block_fields = $block['fields']['field'];
				
				foreach ( $block_fields as $field ) 
				{
				
					if( empty($field['@name']) ) {
						continue;
					}
					if( empty($field['@type']) ) {
						continue;
					}
				
					$field_type = $field['@type'];
					$field_name = $field['@name'];
					
					$fields[$field_name] = $field_type;
					
				}
				
			}
			
		}
	
		return $fields;
	}
	
	private function sanitizeFields($fields, $data) {
		
		$submission = json_decode($data['data'], true);
		$fieldValues = array();
		
		foreach (array_keys($fields) as $key) 
		{
					$type = $fields[$key];
					if ( $type != "file" ) {
					
						
						
						$value = $submission[$key];
						
						// $content .= sprintf($format, Inflector::humanize($field_name), strtoupper($value));
						// $content .= $divider;
						
						$fieldValues[$key] = $value;
						
					} else {

						if ( !is_array($submission[$key]) ) {

							$fieldValues[$key] = basename($submission[$key]);
							// $content .= sprintf($format, Inflector::humanize($field_name), basename($submission[$field_name]));
							// $content .= $divider;
						}
					
					}
				
				
				
			}
			
		
	
		return $fieldValues;
	}
	
	public function compress() {
	
		$this->read();
		$form = $this->data['Form'];
		
		$fields = $form['fields'];
		$fields = Xml::toArray(Xml::build($fields));
		
		$formSubmissions = $this->data['FormSubmission'];
		
		// create directory for form 
		// create submissions csv file
		// foreach submission
			// create directory w/ name of unique id
			// create text file with form data
			// add form data to submissions csv file
			// foreach file field 
				// copy to directory
		
		// zip directory 
		// return path to zip
		$name = preg_replace('/[^a-zA-Z0-9]/s', '_', $form['name']);
		$path = WWW_ROOT . "form_download" . DS . $name . DS;
		
		$uploads = new Folder(WWW_ROOT . "forms");
		
		$folder = new Folder();
		
		if ( $folder->create($path) ) {
		
			$dtd = $this->getFields($fields);
			$csv = implode(",", array_keys($dtd));
			
			foreach ($formSubmissions as $submission) {
				
				$tmpName =  $submission['unique_id'];
				$files = $uploads->find($tmpName . '.*');
				
				
				$tmpPath = $path  .$tmpName;
				$folder->create($tmpPath);
				
				foreach ($files as $file) {
				
					$tmpFile = new File($uploads->path . DS . $file);
					$tmpFile->copy($tmpPath . DS . $file , false);
					
					
				}
				
				
				$output = $this->sanitizeFields($dtd, $submission);
				$submission['data'] = $output;
				
				
				$values = array();
				foreach ( array_keys($dtd) as $key ) {
					if ( empty( $output[$key] ) ) {
						$output[$key] = "NULL";
					}
					$output[$key] = str_replace(" ", "_", $output[$key]);
					$output[$key] = str_replace(",", " ", $output[$key]);
					$output[$key] = str_replace("_", " ", $output[$key]);
					$values[] = $output[$key];
				}
				
				$csv .= "\r\n" . implode(",", array_values ($values));
				
				$output = $this->getFormSubmissionTXT($submission);
				
				$tmpFile = new File($tmpPath . DS .  $submission['unique_id'] . '_submission' .'.txt');
				$tmpFile->write($output);
				$tmpFile->close();
				
			}
			
			$csvPath = $path . $name . "_submissions.csv";
			
			
			$csvFile = new File($csvPath);
			$csvFile->write($csv);
			$csvFile->close();
			
			$zipPath = WWW_ROOT;
			
			
			$exist = new Folder("${zipPath}form_download");
			$file = $exist->find("$name\.zip");
			if ( !empty($file) ) {
				unlink("${zipPath}form_download/$name.zip");
			}
			
			chdir("${zipPath}form_download");
			
			exec("zip -r $name.zip $name/");

			$folder->delete($path);
			return "${zipPath}form_download" . DS;
		}
		return null;
		
	
	}

	}