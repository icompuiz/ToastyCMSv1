<?php
App::uses('Controller', 'Controller');
App::uses('ComponentCollection', 'Controller');

class ManagementController extends AppController {

	public function manager_index() {
		$this->render('index');
		
	}
	public function manager_member_groups() {
	
		$this->render('member_groups');
	}
	
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->layout = 'management';
	}
	
}