<?php
App::uses('AppModel', 'Model');
/**
 * MediaFile Model
 *
 */
class MediaFile extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
 
	public $paths = array(
		'img' => 'img',
		'css' => 'css',
		'js' => 'js'
	);
	
	public $validate = array(
		'path' => array(
			'check_upload' => array(
				'rule' => array('checkUpload'),
				'message' => 'Error uploading file',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	
	function checkUpload($data) {
		
		if ($data['path']['error'] == 0) {
			$uploaded = $this->upload($data, 'mediafiles');
			
			if (is_array($uploaded)) {
				$this->data = $uploaded;
				return true;
			}
			
			return $uploaded;
		}
		
		return false;
			
	}
	
	function getPath($type) {
	
	
		switch ($type) {
		
			case 'image/jpeg':
			case 'image/png':
			case 'image/gif':
			case 'image/pjpeg':
				$path = $this->paths['img'];
			break;
			case  'text/css':
				$path = $this->paths['css'];
			break;
			case 'application/x-javascript':
				$path = $this->paths['js'];
			break;
			default:
				$path =  '';
			break;
		
		}
		
		return $path;
	
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
		$tmp = $file;
		$file = $file['path'];
			
		if (isset($tmp['name'])) {
			$file['name'] = $tmp['name'];
		}
		
		$uploaded     = true;
		
		$replace = array(",", " ");
		$name 		= str_replace($replace, "", $file['name']);
		$name 		= str_replace(" ", "_", $name);
			
		$path = $this->getPath($file['type']);
		
		if ( $path != '' ) {
			
			$rel_url    = $base ? $path . DS . strtolower($base) : $path;
			$folder_url = WWW_ROOT . $rel_url;
		}
		else  {
			$rel_url    = $base ? strtolower($base) : '';
			$folder_url = WWW_ROOT . $rel_url;
		}

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
	
	function beforeDelete() {
	
		parent::beforeDelete();
		$this->data = $this->read("path", $this->id);
		$path = $this->data['MediaFile']['path'];
		unlink($path);

		return true;
		
	}

}
