<?php
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class LockComponent extends Component {

	public $path;
	
	private $controller;
	
	private $lockFormat = "%s:%s:%s";
	
	/*
	 *	Lock the specified key
	 */
	
	public function lock($key) {
		if ($this->isLocked($key))
			return false;
			
		$file = new File($this->path);
		
		if ( $file->exists() ) {
			$file->open('a');
		} else {
			$file->create();
			$file->open('w');
		}
		
		
		$controller = $this->controller->name;
		$action = $this->controller->action;
		$lock = sprintf($this->lockFormat, $controller, $action, $key);
		
		$file->write($lock . "\n");
		$file->close();
		
		return true;
	}
	
	/*
	 * Unlock the specified key
	 */
	
	public function unlock($key) {
		$file = new File($this->path);

	
		$controller = $this->controller->name;
		$action = $this->controller->action;
		$lock = sprintf($this->lockFormat, $controller, $action, $key);
	
		if ( $file->exists() ) {
			$file->open('w');
			$data = $file->read();
			$data = array_diff(array_unique(explode("\n", $data)), array("", " "));
			
			$idx = array_search($lock, $data);
			
			if ($idx) {
				unset($data[$idx]);
				$data = implode("\n", $data);
				$file->write($data);
				$file->close();
			} 
			return true;			
			
		} else {
			return true;
		}
	
	}
	
	/*
	 * Check if the specified key is locked
	 */
	
	public function isLocked($key) {
	
		$file = new File($this->path);
	
		$controller = $this->controller->name;
		$action = $this->controller->action;
		$lock = sprintf($this->lockFormat, $controller, $action, $key);
	
		if ( $file->exists() ) {
			$file->open('r');
			$data = $file->read();
			$data = array_diff(array_unique(explode("\n", $data)), array("", " "));
			$idx = array_search($lock, $data);
			$file->close();
			


			if (is_int($idx)) {
				$true = $lock == $data[$idx]; 
				return $true;
			} 
		}
		return false;
	}
	
	/*
	 * Generate a key
	 */
	
	public function generate_key($seed="lock_") {
		return uniqid($seed);
	}
	
	public function initialize($controller) {
		parent::initialize($controller);
		$this->controller = $controller;
		
		$path = APP . 'lock.lk';
		$this->path = $path;
		
		
	}

}