<?php
App::uses('AppModel', 'Model');
/**
 * SiteLayout Model
 *
 */
class SiteLayout extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'path' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'layout' => array(
			'writelayout' => array(
				'rule' => array('writelayout'),
				'message' => 'Check for valid syntax',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	
	public function readlayout($site_layout) {
		if ( isset($site_layout['SiteLayout']['title']) ) {
			$layout = $site_layout['SiteLayout']['title'];
			$path = APP."View/Layouts/$layout.ctp";
			$path = preg_replace(array('/\s+/'), '_', $path);
			App::uses('Folder', 'Utility');
			App::uses('File', 'Utility');	
			
			$file = new File($path);
			$file->open('r');
			return $file->read();
		} else {
			return false;
		}
	
	
	}
	
	public function writelayout($check) {
		$site_layout = $this->data;
		
		if ( isset($site_layout['SiteLayout']['title']) && $site_layout['SiteLayout']['uploaded_layout'][0]['error'] == 4 ) {
			App::uses('Folder', 'Utility');
			App::uses('File', 'Utility');
			
			$layout = $site_layout['SiteLayout']['title'];
			
			$tmp_path = TMP . "tmp_layout.ctp";
			
			$file = new File($tmp_path);
			
			$file->open('w');
			if( $file->write($site_layout['SiteLayout']['layout']) ) {
				$return = `php -l $tmp_path 2>&1`;
				$error = preg_match( '/Error/', $return);

				if ($error) {
				
					$return = preg_split('/\n/', $return);
					$return = preg_replace('%in ((/\w+)+).ctp %', 'in layout ', $return);
					$this->invalidate('layout', $return[0]);
					
				} else {
					$path = APP."View/Layouts/$layout.ctp";
					$path = preg_replace(array('/\s+/'), '_', $path);
				
					$file->copy($path);
					$file->delete();
				
				}

				$file->close();
				return !$error;
			} else {
				return false;
			}
		}
		
		if ( $site_layout['SiteLayout']['uploaded_layout'][0]['error'] == 0 ) {
		
			$file = $site_layout['SiteLayout']['uploaded_layout'][0];
			
			$layout = $site_layout['SiteLayout']['title'];
			$path = APP."View/Layouts/$layout.ctp";
			$path = preg_replace(array('/\s+/'), '_', $path);
			if (move_uploaded_file( $file['tmp_name'], $path)) {
			
				$return = `php -l $path 2>&1`;
				$error = preg_match( '/Error/', $return);

				if ($error) {
				
					$return = preg_split('/\n/', $return);
					$return = preg_replace('%in ((/\w+)+).ctp %', 'in uploaded layout file ', $return);
					$this->invalidate('uploaded_layout', $return[0]);
					
				}

				return !$error;
			
			} else {
				return false;
			}
		
		}
		
		return false;
	
	}
	
	public function beforeDelete() {
	
		$this->read('title', $this->id);
		$layout = $this->data['SiteLayout']['title'];
		$path = APP."View/Layouts/$layout.ctp";
		$path = preg_replace(array('/\s+/'), '_', $path);
		App::uses('Folder', 'Utility');
		App::uses('File', 'Utility');	
		
		$file = new File($path);
		return $file->delete();
	
	}
	
	
	
}
