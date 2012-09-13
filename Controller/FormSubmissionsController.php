<?php
App::uses('AppController', 'Controller');
/**
 * FormSubmissions Controller
 *
 * @property FormSubmission $FormSubmission
 */
class FormSubmissionsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	private function index($id = null) {
		
		$this->retrieveContent($id);
		
	}
	
	private function retrieveContent($id = null) {
	
		$form = array();
		$submissions = array();
		if ( null != $id ) {
		
			$this->FormSubmission->Form->id = $id;
			if ($this->FormSubmission->Form->exists()) {
				
			$form = $this->FormSubmission->Form->read();

			$submissions = $form['FormSubmission'];
		} 
		$this->set(compact('form', 'submissions'));
			
			
		
		}
	
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	private function view($id = null) {
	
		$this->FormSubmission->id = $id;
		if (!$this->FormSubmission->exists()) {
			throw new NotFoundException(__('Invalid form submission'));
		}
		
		$formSubmission = $this->FormSubmission->read(null, $id);
		
		$fields = $formSubmission['Form']['fields'];
		$fields = Xml::toArray(Xml::build($fields));
		
		$data = json_decode($formSubmission['FormSubmission']['data'], true);
		$this->set(compact('formSubmission', 'data', 'fields'));
		
		$this->retrieveContent($formSubmission['Form']['id']);
		
	}

/**
 * add method
 *
 * @return void
 */
	private function add() {
		if ($this->request->is('post')) {
			$this->FormSubmission->create();
			if ($this->FormSubmission->save($this->request->data)) {
				$this->Session->setFlash(__('The form submission has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The form submission could not be saved. Please, try again.'));
			}
		}
		$forms = $this->FormSubmission->Form->find('list');
		$this->set(compact('forms'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	private function edit($id = null) {
		$this->FormSubmission->id = $id;
		if (!$this->FormSubmission->exists()) {
			throw new NotFoundException(__('Invalid form submission'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->FormSubmission->save($this->request->data)) {
				$this->Session->setFlash(__('The form submission has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The form submission could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->FormSubmission->read(null, $id);
		}
		$forms = $this->FormSubmission->Form->find('list');
		$this->set(compact('forms'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	private function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->FormSubmission->id = $id;
		if (!$this->FormSubmission->exists()) {
			throw new NotFoundException(__('Invalid form submission'));
		}
		if ($this->FormSubmission->delete()) {
			$this->Session->setFlash(__('Form submission deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Form submission was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function manager_index($id = null) {
	
		$this->index($id);
		$this->layout = 'management';
		$this->render('index');
	
	}
	public function manager_view($id = null) 
	{
	
		$this->view($id);
		
		$this->layout = 'management';
		
		$this->render('view');
	}
	
	public function manager_download_submission_file($name = null) {
	
		if (!empty($name)) {
			$path = WWW_ROOT . 'forms' . DS; 
			if (!empty($path)) {
				
				$ext = substr(strstr($name, "."), 1);
				$idx = strrpos($name, ".");
				
				$fileName = substr($name, 0, strlen($name) - (strlen($name) - $idx));
				
				$this->viewClass = 'Media';
				$params = array(
					'id'        => "$name",
					'name'      => $fileName,
					'download'  => true,
					'extension' => $ext,
					'path'      => $path
				);
				$this->set($params);
			}
		}
	
	}
	
	public function manager_download_submissions($id = null) {
	
		
		$this->FormSubmission->Form->id = $id;
		
		if (!$this->FormSubmission->Form->exists()) {
			throw new NotFoundException(__('Invalid form'));
		}
		
		
		
		$path = $this->FormSubmission->Form->compress(); 
		if (!empty($path)) {
			$name = preg_replace('/[^a-zA-Z0-9]/s', '_', $this->FormSubmission->Form->data['Form']['name']);
			$this->viewClass = 'Media';
			$params = array(
				'id'        => "$name.zip",
				'name'      => $name,
				'download'  => true,
				'extension' => 'zip',
				'path'      => $path
			);
			$this->set($params);
		}	
	}
}
