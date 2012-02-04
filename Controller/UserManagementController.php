<?php
App::uses('Controller', 'Controller');
App::uses('ComponentCollection', 'Controller');

class UserManagementController extends AppController {

	public $uses = array('Member');

	public function user_index() {
		
		$this->set('title_for_page', 'Member Account Management');
		$this->render('index');
	}
	
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->layout = 'user_management';
	
		$user = $this->Auth->user();
		$member = $this->Member->find('first', array('conditions' => array('Member.user_id' => $user['id'])));
		
		$this->set(compact('member'));
		
	}
	
}