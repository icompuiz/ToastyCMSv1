<?php
App::uses('Controller', 'Controller');
App::uses('ComponentCollection', 'Controller');

class ManagementController extends AppController {

	public function manager_index() {
		$this->render('index');
		
	}
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->layout = 'management';
	}
	
}