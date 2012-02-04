<?php
App::uses('AppController', 'Controller');
/**
 * Themes Controller
 *
 * @property Theme $Theme
 */
class ThemesController extends AppController {
var $layout = 'administrator';
var $helpers = array('Multifile');
var $uses = array('Theme', 'MediaFile');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Theme->recursive = 0;
		$this->set('themes', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Theme->id = $id;
		if (!$this->Theme->exists()) {
			throw new NotFoundException(__('Invalid theme'));
		}
		$this->set('theme', $this->Theme->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			
			$file = $this->request->data['Theme']['layout'];
			
			if ( $file['error'] != 4 ) {
				$data = array( 'path' => $file, 'file' => 'View/Layout/'.$this->request->data['Theme']['name'] );
				$this->MediaFile->uploadFile($data);
			
				$this->request->data['Theme']['layout_id'] = $this->MediaFile->id;
				
				$this->Theme->create();
				if ($this->Theme->save($this->request->data)) {
					$this->Session->setFlash(__('The theme has been saved'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The theme could not be saved. Please, try again.'));
				}
			} else {
				$this->Session->setFlash(__('The theme could not be saved. Please, try again.'));
			}
		} else {
			$this->set('css_files', 'stylesheets/form,stylesheets/tab,stylesheets/themes');
			$this->set('js_files', 'tab,form');
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Theme->id = $id;
		if (!$this->Theme->exists()) {
			throw new NotFoundException(__('Invalid theme'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Theme->save($this->request->data)) {
				$this->Session->setFlash(__('The theme has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The theme could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Theme->read(null, $id);
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
		$this->Theme->id = $id;
		if (!$this->Theme->exists()) {
			throw new NotFoundException(__('Invalid theme'));
		}
		if ($this->Theme->delete()) {
			$this->Session->setFlash(__('Theme deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Theme was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
