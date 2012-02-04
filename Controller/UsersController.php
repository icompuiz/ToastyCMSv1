<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

	public $helpers = array('Actions', 'ContentBar');

/**
 * index method
 *
 * @return void
 */
	private function index() {
		//$this->User->recursive = 0;
		$groups = $this->User->Group->find('all');
		$this->set('groups_', $groups);
		$this->set('title_for_page', 'Users');
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	private function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$user = $this->User->read(null, $id);
		$this->set('title_for_page', 'Users : ' . $user['User']['full_name']);
		$this->set('user', $user);

	}

/**
 * add method
 *
 * @return void
 */
	private function add($id=null) {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$flash = __('The user has been saved');
				$this->log($flash, "informational", "UsersController", "user");
				$this->Session->setFlash($flash);
				$this->redirect(array('action' => 'index'));
			} else {
				$flash = __('The user could not be saved. Please, try again.');
				$this->log($flash, "error", "UsersController", "user");
				$this->Session->setFlash($flash);
			}
		}
		
		
		if ($id) {
			$this->request->data['User']['group_id'] = $id;
		} else {
			$this->request->data['User']['group_id'] = 3;
		}
		
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
		
		$groups = $this->User->Group->find('all');
		$this->set('groups_', $groups);
		
		$this->set('title_for_page', 'Add New User');

	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	private function edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$flash = __('The user has been saved');
				$this->log($flash, "informational", "UsersController", "user");
				$this->Session->setFlash($flash);
				$this->redirect(array('action' => 'index'));
			} else {
				$flash = __('The user could not be saved. Please, try again.');
				$this->log($flash, "error", "UsersController", "user");
				$this->Session->setFlash($flash);
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
			unset($this->request->data['User']['password']);
			$this->set('title_for_page', 'Edit User : ' . $this->request->data['User']['full_name']);

		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
		$groups = $this->User->Group->find('all');
		$this->set('groups_', $groups);
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	private function delete($id = null) {
	
		if ( $id == 1 ) {
			$this->Session->setFlash(__('Cannot Delete Root User'));
			$this->redirect(array('action' => 'index'));
		}
	
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$flash = __('User deleted');
			$this->log($flash, "informational", "UsersController", "user");
			$this->Session->setFlash($flash);
			$this->redirect(array('action'=>'index'));
		}
		$flash = __('User was not deleted');
		$this->log($flash, "error", "UsersController", "user");
		$this->Session->setFlash($flash);
		$this->redirect(array('action' => 'index'));
	}
	
	public function login() {
			
		$username = $this->Session->read("Auth.User");
		
		if ( $username ) {
			
			if ( isset($this->request->params['admin']) ) {
				$this->redirect(array('controller' => 'administration'));
			}
			elseif ( isset($this->request->params['manager']) ) {
				$this->redirect(array('controller' => 'management'));
			}
			
			$this->Session->setFlash("You're aready logged in.");
			$this->redirect('/');
		}
		
		if ($this->request->is('post')) {
			
			if ($this->Auth->login()) {
				
				$username = $this->Session->read("Auth.User");
			
				if ($username['group_id'] == 1) {
					$this->Auth->loginRedirect = array('admin' => true, 'controller' => 'administration', 'action' => 'index');
				
					if ( isset($this->request->params['admin']) ) {
						$this->redirect(array('controller' => 'administration'));
					}
					elseif ( isset($this->request->params['manager']) ) {
						$this->redirect(array('controller' => 'management'));
					}	
					
				}
				
				$username = $username['username'];
				$flash = $username;
				$this->log($flash, "user_login", "UsersController", "user");
			
				$this->redirect($this->Auth->loginRedirect);
			} else {
				$username = $this->request->data['User']['username'];
				$flash = $username;
				$this->log($flash, "user_login", "UsersController", "user");
				$this->Session->setFlash('Your username or password was incorrect.');
			}
			
		}
	}
	
	public function logout() {
	
		$username = $this->Session->read("Auth.User");
		
		if ( !$username ) {
				$this->redirect('/');
		}
	
		$this->Session->setFlash('Good-Bye');
		$username = $this->Session->read("Auth.User.username");
		$flash = $username;
		$this->log($flash, "user_logout", "UsersController", "user");
		$this->redirect($this->Auth->logout());
	}
	public function user_login() {
		$this->login();
		$this->render('login');
	}
	public function manager_login() {
		$this->login();
		$this->render('login');
	}
	public function admin_login() {
		$this->login();
		$this->render('login');
	}
	public function manager_logout() {
		$this->logout();
	}
	public function user_logout() {
		$this->logout();
	}
	public function admin_logout() {
		$this->logout();
	}
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->layout = 'administrator';
		$this->Auth->allow('login','logout');

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
