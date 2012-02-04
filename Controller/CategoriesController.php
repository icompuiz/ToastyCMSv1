<?php
App::uses('AppController', 'Controller');
/**
 * Categories Controller
 *
 * @property Category $Category
 */
class CategoriesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	private function old_index() {
		$this->Category->recursive = 0;
		
		$this->set('categories', $this->paginate());
	}
	
	

	
	private function index($admin=null) {
		$this->retrieveContent();

	}
/**
 * view method
 *
 * @param string $id
 * @return void
 */
	private function view($id = null) {
		if (!$id) {
			$this->redirect(array('action' => 'index'));
		}
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		$this->set('category', $this->Category->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	private function add() {
		if ($this->request->is('post')) {
			$this->Category->create();
			
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash(__('The category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.'));
			}
		}
		$this->retrieveContent();

	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	private function edit($id = null) {
		
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash(__('The category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Category->read(null, $id);
		}
		$this->retrieveContent();

	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	private function delete($id = null) {
		if ( $id < 5 ) {
			$this->Session->setFlash(__('Cannot Delete Category'));
			$this->redirect(array('action' => 'index'));
		}
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		if ($this->Category->delete()) {
			$this->Session->setFlash(__('Category deleted'));
			$this->redirect(array('action'=>'index'));
		}
		
		$this->Session->setFlash(__('Category was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->layout = 'management'; 
	}
	
	public function manager_index() {
		$this->index();
		$this->render('index');
	}
	public function manager_add() {
		$this->add();
		$this->render('add');
	}
	public function manager_edit($id = null) {
		$this->edit($id);
		$this->render('edit');
	}
	public function manager_view($id = null) {
		$this->view();
		$this->render('view');
	}
	public function manager_delete($id = null) {
		$this->delete($id);
	}
	
	public function admin_index() {
		$this->admin_retrieveContent();

		$this->render('index');
	}
	
	public function admin_add() {
		$this->add();
		$this->admin_retrieveContent();

		$this->render('add');
	}
	
	public function admin_edit($id = null) {
		$this->edit($id);
		$this->admin_retrieveContent();

		$this->render('edit');
	}
	public function admin_view($id = null) {
		$this->view();
		$this->admin_retrieveContent();
		$this->render('view');
	}
	public function admin_delete($id = null) {
		$this->delete($id);
	}
	
	private function retrieveContent() {
	
		$categories = $this->Category->find('all', array('conditions'=>array('Category.title !=' => 'administrator')));
		
		foreach ($categories as &$category) {
		
			$content =  $this->Category->Content->find('list', array('conditions' => array('Content.category_id' => $category['Category']['id']),'order' => 'Content.ordering ASC'));
			$category['Content'] = $content;
		
		}
				
		$this->set('categories', $categories);
	
	}
	
	private function admin_retrieveContent() {
	
		$categories = $this->Category->find('all', array('conditions'=>array('Category.title' => 'administrator')));
		
		foreach ($categories as &$category) {
		
			$content =  $this->Category->Content->find('list', array('conditions' => array('Content.category_id' => $category['Category']['id']),'order' => 'Content.ordering ASC'));
			$category['Content'] = $content;
		
		}
		
		$this->set('categories', $categories);
	
	}
}
