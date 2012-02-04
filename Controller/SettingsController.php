<?php
App::uses('AppController', 'Controller');
/**
 * Settings Controller
 *
 */
class SettingsController extends AppController {
	public $uses = array('Variable');
	
	public function admin_index() {
	
	}
	
	public function admin_databases() {
	
		$this->setDataSources();

	}
	
	public function admin_database($source=null, $database=null) {
	
		if ( $source && $database ) {
		
			if ( strtolower($source)== 'mysql' ) {
			
				$this->redirect(array('action' => 'mysqldatabase', $database));
			
			}
			if ( strtolower($source)== 'csvsource' ) {
			
				$this->redirect(array('action' => 'csvdatabase', $database));
				
			}
		
		} else {
		
			$this->redirect(array('action' => 'index'));
		
		}
		
	}
	
	public function admin_csvdatabase($database = null) {
		
		$dbs = $this->setDataSources();
	
		if ( !$database ) {
		
			$this->Session->setFlash(__('Invalid Database Configuration', true));
			$this->redirect(array('action' => 'databases'));
		} 
		
		if ($this->request->is('post')) {
		
			
			$path = "database.php";
			
			$file = $this->readConfigFile($path);
			
			if ($file) {
			
				
				$start = strpos($file,"public $$database");
				$end   = strpos($file, ");", $start); 
				
				$length = $end - $start;
				
				$config = substr($file, $start, $length);
				
				$values = $this->request->data['CsvConfiguration'];
				$keys = array_keys($values);
				
				
				$csvpath      = $values['path'];
				$extension = $values['extension'];
				$readonly  = $values['readonly'] == 1 ? 'true' : 'false';
				
				$data = "";
				$data .= "\t\t'datasource' => 'CsvSource',\n";
				$data .= "\t\t'path' => '$csvpath',\n";
				$data .= "\t\t'extension' => '$extension',\n";
				$data .= "\t\t'readonly' => '$readonly'";
				
				$output = "public $$database = array(\n$data\n"; 
				
				$replace = substr_replace($file, $output, $start, $length);
				
				
				if ($this->writeConfigFile($path, $replace)) {					
					$this->Session->setFlash(__("Configuration saved successfully"));
					$this->redirect(array('action' => 'databases'));
				} else {
				
					$this->Session->setFlash(__("Configuration not saved"));
					$this->redirect(array('action' => 'databases'));
				}
				
			} else {
				
					$this->Session->setFlash(__("Configuration not saved, unable to open database.php"));
					$this->redirect(array('action' => 'databases'));
			}
			
		} else {
			if ( isset($dbs[$database] )) {
				if ( $dbs[$database]['datasource'] == 'CsvSource' ) {
					$this->request->data['CsvConfiguration'] = $dbs[$database];
					$this->request->data['CsvConfiguration']['readonly'] = $dbs[$database]['readonly'] == 'true' ? true : false ;
				} else {
					$this->Session->setFlash(__('Invalid Database Configuration', true));
					$this->redirect(array('action' => 'databases'));
				}
			} else {
				$this->Session->setFlash(__('Invalid Database Configuration', true));
				$this->redirect(array('action' => 'databases'));
			}
			
		}
		
		$this->setDataSources();

	
	}
	
	public function admin_mysqldatabase($database = null) {

		$dbs = $this->setDataSources();
	
		if ( !$database ) {
		
			$this->Session->setFlash(__('Invalid Database Configuration', true));
			$this->redirect(array('action' => 'databases'));
		} 
		
		if ($this->request->is('post')) {
			
			$path = "database.php";
			$file =$this->readConfigFile($path);

			if ( $file ) {
			 
				$start = strpos($file,"public $$database");
				$end   = strpos($file, ");", $start); 
				
				$length = $end - $start;
				
				$config = substr($file, $start, $length);
				
				
				$values = $this->request->data['MySqlDatabaseConfiguration'];
				$keys = array_keys($values);
				
				
				$datasource  = $values['datasource'];
				$persistent  = $values['persistent'] == 1 ? 'true' : 'false';
				$host 		 = $values['host'];
				$login 		 = $values['login'];
				$password 	 = $values['password'];
				$db 	 = $values['database'];
				$prefix 	 = $values['prefix'];
				$port 	 	 = $values['port'];
				
				$data = "";
				$data .= "\t\t'datasource' => 'Database/Mysql',\n";
				$data .= "\t\t'persistent' => $persistent,\n";
				$data .= "\t\t'host' => '$host',\n";
				$data .= "\t\t'login' => '$login',\n";
				$data .= "\t\t'password' => '$password',\n";
				$data .= "\t\t'database' => '$db',\n";
				$data .= "\t\t'prefix' => '$prefix',\n";
				$data .= "\t\t'port' => '$port'";
				
				$output = "public $$database = array(\n$data\n"; 
				
				$replace = substr_replace($file, $output, $start, $length);
								
				
				
				if ($this->writeConfigFile($path, $replace)) {
					$this->Session->setFlash(__("Configuration saved successfully"));
					$this->redirect(array('action' => 'databases'));
				} else {
				
					$this->Session->setFlash(__("Configuration not saved"));
					$this->redirect(array('action' => 'databases'));
				}
				
			} else {
				
				$this->Session->setFlash(__("Configuration not saved, Configuration not saved, unable to open database.php"));
				$this->redirect(array('action' => 'databases'));
			}
		
		} else {
			if ( isset($dbs[$database] )) {
				if ( $dbs[$database]['datasource'] == 'Database/Mysql' ) {
					$this->request->data['MySqlDatabaseConfiguration'] = $dbs[$database];
				} else {
					$this->Session->setFlash(__('Invalid Database Configuration', true));
					$this->redirect(array('action' => 'databases'));
				}
			} else {
				$this->Session->setFlash(__('Invalid Database Configuration', true));
				$this->redirect(array('action' => 'databases'));
			}
			
		}
		
	}
	
	public function admin_config() {
	
		if($this->request->is('post')) {
		
		} else {
		
			$this->request->data['Config']['file'] = $this->readConfigFile("core.php");
		
			$this->set('css_files', '../js/codemirror/lib/codemirror,../js/codemirror/theme/neat');
			$this->set('js_files', 'tab,tiny_mce/tiny_mce,codemirror/lib/codemirror,codemirror/mode/htmlmixed/htmlmixed,codemirror/mode/javascript/javascript,codemirror/mode/php/php,codemirror/mode/xml/xml,codemirror/mode/css/css');
			$this->set('inline_js', '
					
				var phpArea = document.getElementById("ConfigFile");
				var phpMirror = CodeMirror.fromTextArea(phpArea, {
				
					value: phpArea.value,
					mode: "htmlmixed",
					theme: "neat",
					lineNumbers: true,
				});
				
			');
		
		}
	
	}
	
	private function setDataSources() {
	
		$dbs = ConnectionManager::enumConnectionObjects();

	
		foreach (array_keys($dbs) as $db) {
		
			
		
			if ( $dbs[$db]['datasource'] == 'Database/Mysql' ) {
			
				$sources['Mysql'][]  = $db;
			
			} else if ( $dbs[$db]['datasource'] == 'CsvSource' ) {
			
				$sources['CsvSource'][]  = $db;
				
			}
		
		}
		$this->set('sources', $sources);
		
		return $dbs;
	}
	
	private function readConfigFile($configFile=null) {
		
		$path = APP . "Config/$configFile";
		
		return $this->readFile($path);
	}
	
	private function writeConfigFile($configFile, $data) {
	
		$path = APP . "Config/$configFile";
		return $this->writeFile($path, $data);
	
	}
	
	private function readFile($path) {
	
		App::uses('File', 'Utility');
		App::uses('Folder', 'Utility');
		
		
		$file = new File($path);
				
		if ( $file->open('r') ) {
			
			$data = $file->read();
		
		} else {
			$data = false;
		}
		$file->close();
		return $data;
	
	}
	
	private function writeFile($path, $data) {
	
		App::uses('File', 'Utility');
		App::uses('Folder', 'Utility');
		
		
		$file = new File($path);
				
		if ( $file->open('w') ) {
			
			$ret = $file->write($data);
		
		} else {
			$ret = false;
		}
		$file->close();

		return $ret;
		
	}
	
	public function admin_routes() {
	
		if($this->request->is('post')) {
		
		} else {
		
			$this->request->data['Config']['file'] = $this->readConfigFile("routes.php");
		
			$this->set('css_files', '../js/codemirror/lib/codemirror,../js/codemirror/theme/neat');
			$this->set('js_files', 'tab,tiny_mce/tiny_mce,codemirror/lib/codemirror,codemirror/mode/htmlmixed/htmlmixed,codemirror/mode/javascript/javascript,codemirror/mode/php/php,codemirror/mode/xml/xml,codemirror/mode/css/css');
			$this->set('inline_js', '
					
				var phpArea = document.getElementById("ConfigFile");
				var phpMirror = CodeMirror.fromTextArea(phpArea, {
				
					value: phpArea.value,
					mode: "htmlmixed",
					theme: "neat",
					lineNumbers: true,
				});
				
			');
		
		}
	
	}
	
	public function admin_variables() {
		
		
		$variables = $this->Variable->find('all');
		$this->set('variables', $variables );
	
	}
	
	public function admin_variable($variable=null) {
	
		if ( !$variable ) {
		
			$this->Session->setFlash(__('Invalid Variable', true));
			$this->redirect(array('action' => 'variables'));
		}
		
		if ($this->request->is('post')) {
		
			$this->Variable->create();
			
			if ($this->Variable->save($this->request->data)) {
				$this->Session->setFlash(__('Variable saved successfully', true));
				$this->redirect(array('action' => 'variables'));
			} else {
			
				$this->Session->setFlash(__('Variable not saved', true));
			
			}
		
		} else {
			$this->request->data = $this->Variable->find('first', array('conditions' => array('Variable.key' => $variable)));
		}
		
		$variables = $this->Variable->find('all');
		$this->set(compact('variables') );
	
	}
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->layout = 'administrator';
	}
	
	

	


}