<?php
App::uses('AppController', 'Controller');
/**
 * MemberGroups Controller
 *
 * @property MemberGroup $MemberGroup
 */
class MemberGroupsController extends AppController {

/**
 * index method
 *
 * @return void
 */
 
	public $helpers = array('ProfileField');
	public $uses = array('MemberGroup', 'Profile');

	private function index() {
		
		$memberGroups = $this->MemberGroup->find('all');
		
		foreach ($memberGroups as $group) {
			$gid = $this->MemberGroup->Group->read(null, $group['MemberGroup']['group_id']);
			if (empty($gid))
				$this->MemberGroup->delete($group['MemberGroup']['id']);
		}
		
		foreach ($memberGroups as &$group) {
		
			foreach($group['Member'] as &$member) {
				$user = $this->MemberGroup->Member->User->read('username', $member['user_id']);
				$member['username'] = $user['User']['username'];
				
				
			}
		}

		$this->set('memberGroups', $memberGroups);
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->MemberGroup->id = $id;
		if (!$this->MemberGroup->exists()) {
			throw new NotFoundException(__('Invalid member group'));
		}
		$group = $this->MemberGroup->read(null, $id);
		foreach($group['Member'] as &$member) {
		
			$member = $this->MemberGroup->Member->read(null, $member['id']);			

		}
		$this->set('css_files', 'stylesheets/gallery');

		$this->set('memberGroup', $group);
	}

/**
 * add method
 *
 * @return void
 */
	private function add() {
		if ($this->request->is('post')) {
				
			$this->MemberGroup->Group->create();

			if ($this->MemberGroup->Group->save($this->request->data)) {
			
				$user_id = $this->Session->read("Auth.User.id");
				
				$data['MemberGroup']['profile_layout_id'] = $this->request->data['Group']['profile_layout_id'];

				
				$data['MemberGroup']['group_id'] = $this->MemberGroup->Group->id;
				$data['MemberGroup']['user_id'] = $user_id;
				
				$this->MemberGroup->create();
				
				if ($this->MemberGroup->save($data)) {
					$this->Session->setFlash(__('The member group has been saved'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The member group could not be saved. Please, try again.'));
				}
				
			}
		} else {
			
			$profiles = $this->MemberGroup->ProfileLayout->find('list');
			$this->set(compact('profiles'));
			
		}
		$this->retrieveContentBar();
	}
 
/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	private function edit($id = null) {
		$this->MemberGroup->id = $id;
		
		if (!$this->MemberGroup->exists()) {
			throw new NotFoundException(__('Invalid member group'));
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {

			$this->request->data['MemberGroup']['profile_layout_id'] = $this->request->data['Group']['profile_layout_id'];
		
			if ($this->MemberGroup->Group->save($this->request->data)) {
				
				if ($this->MemberGroup->save($this->request->data)) {
					$this->Session->setFlash(__('The member group has been saved'));
					$this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash(__('The member group could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->MemberGroup->read(null, $id);
			$this->request->data['Group']['profile_layout_id'] = $this->request->data['MemberGroup']['profile_layout_id'];
		}
		$profiles = $this->MemberGroup->ProfileLayout->find('list');
		$this->set(compact('profiles'));
		$this->retrieveContentBar();
	}
	
	
	
	private function retrieveContentBar() {
		$memberGroups = $this->MemberGroup->find('all');
		foreach ($memberGroups as &$group) {
		
			foreach($group['Member'] as &$member) {
				$user = $this->MemberGroup->Member->User->read('username', $member['user_id']);
				$member['username'] = $user['User']['username'];
			}
		}
		$this->set('memberGroups', $memberGroups);
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	private function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->MemberGroup->id = $id;
		if (!$this->MemberGroup->exists()) {
			throw new NotFoundException(__('Invalid member group'));
		}
		
		$data = $this->MemberGroup->read('group_id', $id);
		$gid = $data['MemberGroup']['group_id'];
				
		$this->MemberGroup->Group->id = $gid;
		
		$users = $this->MemberGroup->Group->User->find('all', array('conditions' => array('User.group_id' => $gid)));
		foreach ( $users as $user ) {
			$user['User']['group_id'] = 3;
			$this->MemberGroup->Group->User->save($user);
		}
		
		if ($this->MemberGroup->Group->delete()) {
			if ($this->MemberGroup->delete()) {
				$this->Session->setFlash(__('Member group deleted'));
				$this->redirect(array('action'=>'index'));
			}
		}
		$this->Session->setFlash(__('Member group was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('view');
	}
	
	private function setFields($data) {
		$mgp = $this->MemberGroup->find('first', array('conditions' => array('Group.id' => $data['Group']['id'])));
		$fields = $this->MemberGroup->ProfileLayout->readFields($mgp['ProfileLayout']['id']);
		$this->set(compact('fields'));
	
	}

	public function admin_index() {
		$this->layout = 'administrator';

		$this->index();
		$this->render('index');
	}
	public function admin_add() {
		$this->layout = 'administrator';
		$this->add();
		$this->render('add');
	}
	
	
	
	public function admin_edit($id = null) {
		$this->layout = 'administrator';
		$this->edit($id);
		$this->render('edit');
	}
	
	public function admin_view($id = null) {
		$this->layout = 'administrator';
		$this->view($id); 
		$this->render('view');
	}
	
	
	
	public function admin_delete($id = null) {
		$this->delete($id);
	}
	
	public function user_index() {
		$this->redirect(array('controller' => 'user_management'));
	}
	
}
