<?php
App::uses('AppController', 'Controller');
/**
 * Fields Controller
 *
 * @property Field $Field
 */
class FieldsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Field->recursive = 0;
		$this->set('fields', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Field->id = $id;
		if (!$this->Field->exists()) {
			throw new NotFoundException(__('Invalid field'));
		}
		$this->set('field', $this->Field->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Field->create();
			if ($this->Field->save($this->request->data)) {
				$this->Session->setFlash(__('The field has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The field could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Field->id = $id;
		if (!$this->Field->exists()) {
			throw new NotFoundException(__('Invalid field'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Field->save($this->request->data)) {
				$this->Session->setFlash(__('The field has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The field could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Field->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Field->id = $id;
		if (!$this->Field->exists()) {
			throw new NotFoundException(__('Invalid field'));
		}
		if ($this->Field->delete()) {
			$this->Session->setFlash(__('Field deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Field was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
