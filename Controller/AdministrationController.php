<?php
App::uses('Controller', 'Controller');
App::uses('ComponentCollection', 'Controller');

class AdministrationController extends AppController {
	
	public function admin_index() {
	
		$this->render('index');

	}
	
	public function admin_member_groups() {
	
		$this->render('member_groups');
	}
	
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->layout = 'administrator';
	}
	
}