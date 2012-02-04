<?php
App::uses('AppController', 'Controller');
/**
 * Groups Controller
 *
 * @property Group $Group
 */
class GroupsController extends AppController {


/**
 * index method
 *
 * @return void 
 */
	private function index() {
		
		$this->redirect(array('controller' => 'users', 'action'=>'index'));
		
	
		$this->Group->recursive = 0;
		$this->set('groups', $this->paginate());
		$groups = $this->Group->find('all');
		$this->set('groups_', $groups);
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	private function view($id = null) {
		$this->Group->id = $id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Invalid group'));
		}
		$this->set('group', $this->Group->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	private function add() {
		if ($this->request->is('post')) {
			$this->Group->create();
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash(__('The group has been saved'));
				$this->redirect(array('controller'=>'users','action' => 'index'));
			} else {
				$this->Session->setFlash(__('The group could not be saved. Please, try again.'));
			}
		}
		$groups = $this->Group->find('all');
		$this->set('groups_', $groups);
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	private function edit($id = null) {
		$this->Group->id = $id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Invalid group'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash(__('The group has been saved'));
				$this->redirect(array('controller'=>'users','action' => 'index'));
			} else {
				$this->Session->setFlash(__('The group could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Group->read(null, $id);
		}
		$groups = $this->Group->find('all');
		$this->set('groups_', $groups);
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null, $force = null) {
			
		if ( $id < 4 && $force != 'true') {
			$this->Session->setFlash(__('Cannot Delete Base Group'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Group->id = $id;
		
		
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Invalid group'));
		}
		
		$users = $this->Group->User->find('all', array('conditions' => array('User.group_id' => $id)));
		
		foreach ( $users as $user ) {
			$user['User']['group_id'] = 3;
			$this->Group->User->save($user);
		}
		
		if ($this->Group->delete()) {
			$this->Session->setFlash(__('Group deleted'));
			$this->redirect(array('controller'=>'users','action' => 'index'));

		}
		$this->Session->setFlash(__('Group was not deleted'));
		$this->redirect(array('controller'=>'users','action' => 'index'));

	}
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->layout = 'administrator';

	}
	
	public function admin_index() {
		$this->index();
		$this->render('index');
	}
	public function admin_add() {
		$this->add();
		$this->render('add');
	}
	public function admin_edit($id=null) {
		$this->edit($id);
		$this->render('edit');
	}
	public function admin_view($id=null) {
		$this->view($id);
		$this->render('view');
	}
	public function admin_delete($id=null) {
		$this->delete($id);
	}
}
