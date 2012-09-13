<?php
App::uses('AppController', 'Controller');

class FormsController extends AppController
{
	var $helpers = array('Multifile');
	var $uses = array('Form', 'MediaFile', 'FormSubmission');
	
	/** 
	* Index method
	*/
	public function index() {
	
		$this->redirect('/');				
	
	}
	
	private function retrieveContent() {
	
		$forms = $this->Form->find('all');
		$this->set(compact('forms'));
	
	}
	
	
	public function success($success_id) {
	
		$this->set(compact('success_id'));
	
	}
	
	
	/**
	* Private view 
	*/
	public function view($id = null) {
	
		$this->Form->id = $id;
		
		if ( $this->request->is('post') ) {
			$this->FormSubmission->create();
			// $this->FormSubmission->save($this->request->data);
			
			if ($this->FormSubmission->save($this->request->data)) {
				// it validated logic
				$fms = $this->FormSubmission->read(null, $this->FormSubmission->id);
				
				$this->Session->setFlash("Form submitted");
				$this->redirect(array('action' => 'success', $fms['FormSubmission']['unique_id']));				
			} else {
				// didn't validate logic
				$this->Session->setFlash("Form not submitted, please check required fields");
			}		
		}
		
		if (!$this->Form->exists()) {
			throw new NotFoundException(__('Invalid form'));
		}
		
		$form = $this->Form->read(null, $id);
		$fields = $form['Form']['fields'];
		$fields = Xml::toArray(Xml::build($fields));
		
		$this->request->data['FormSubmission']['form_id'] = $id;
		// $form['Form']['fields'] = $fields;
		// pr($fields); exit;
		$this->set(compact('form', 'fields') );
		$this->set('inline_js', $form['Form']['js'] . '
			forms_view();
			
			');
		$this->set('inline_css', $form['Form']['css']);
		
		$this->set('js_files', 'tiny_mce/tiny_mce,forms');
		
	
	}
	
	private function add() {
	
		// check for post
		if ( $this->request->is('post')) {
		
			$this->Form->create();
			if ( $this->Form->save($this->request->data)) {
				$this->Session->setFlash(__('The form has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The form could not be saved. Please, try again.'));

			}
			
		} 
		
		$this->set('css_files', 'stylesheets/tab,../js/codemirror/lib/codemirror,../js/codemirror/theme/neat');
		$this->set('js_files', 'tab,tiny_mce/tiny_mce,codemirror/lib/codemirror,codemirror/mode/javascript/javascript,codemirror/mode/css/css,forms');
		$this->set('inline_js', '
			forms_add();
			
			');
	
	}
	
	private function edit($id = null) {
		
		$this->Form->id = $id;
		if (!$this->Form->exists()) {
			throw new NotFoundException(__('Invalid form'));
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
		
			if ( $this->Form->save($this->request->data)) {			
				$this->Session->setFlash(__('The form has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The form could not be saved. Please, try again.'));
			}
		
		} else {
			$this->request->data = $this->Form->read(null, $id);
			$this->set('css_files', 'stylesheets/tab,../js/codemirror/lib/codemirror,../js/codemirror/theme/neat');
			$this->set('js_files', 'tab,tiny_mce/tiny_mce,codemirror/lib/codemirror,codemirror/mode/javascript/javascript,codemirror/mode/css/css,forms');
			$this->set('inline_js', '
				forms_edit();
				
			');
		}
	}
	
	private function delete($id = null) {
	
		// if (!$this->request->is('post')) {
			// throw new MethodNotAllowedException();
		// }
		
		$this->Form->id = $id;
		if (!$this->Form->exists()) {
			throw new NotFoundException(__('Invalid profile layout'));
		}
		
		if ($this->Form->delete()) {
			$this->Session->setFlash(__('Form deleted'));
			$this->redirect(array('action'=>'index'));
		} else {
			$this->Session->setFlash(__('Form was not deleted'));
			$this->redirect(array('action' => 'index'));
		}
	
	}
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index', 'view', 'success');
		$this->retrieveContent();

	}
	
	public function manager_index() {
		$this->layout = 'management';
		// $this->index();
		$this->render('index');

	}
	
	public function manager_add() {
		$this->layout = 'management';
		$this->add();
		$this->render('add');

	}
	
	public function manager_edit($id = null) {
		$this->layout = 'management';
		$this->edit($id);
		$this->render('edit');

	}
	
	public function manager_delete($id = null) {
		$this->delete($id);
	}
	
	public function manager_view($id = null) {
		$this->layout = 'management';
		$this->view($id);
		$this->render('view');

	}


}