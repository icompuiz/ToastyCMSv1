<?php
App::uses('Controller', 'Controller');
App::uses('ComponentCollection', 'Controller');

class AdministrationController extends AppController {
	
	public function admin_index() {
	
		$this->render('index');

	}
	
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->layout = 'administrator';
	}
	
}