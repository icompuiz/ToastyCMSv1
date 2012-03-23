<?php
App::uses('AppController', 'Controller');
/**
 * SiteLayouts Controller
 *
 * @property SiteLayout $SiteLayout
 */
class SiteLayoutsController extends AppController {

	var $helpers = array('Multifile');

	var $uses = array('SiteLayout','MediaFile');
/**
 * index method
 *
 * @return void
 */
	private function index() {
		$this->SiteLayout->recursive = 0;
		$this->set('siteLayouts', $this->paginate());
		$this->set('title_for_page', 'Site Layouts');

	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	private function view($id = null) {
		$this->SiteLayout->id = $id;
		if (!$this->SiteLayout->exists()) {
			throw new NotFoundException(__('Invalid site layout'));
		}
		$this->set('siteLayout', $this->SiteLayout->read(null, $id));
		$this->SiteLayout->recursive = 0;
		$this->set('siteLayouts', $this->paginate());

	}

/**
 * add method
 *
 * @return void
 */
	private function add() {
		if ($this->request->is('post')) {
		
			$css = $this->request->data['SiteLayout']['uploaded_css_files'];
			$js = $this->request->data['SiteLayout']['uploaded_js_files'];
			$images = $this->request->data['SiteLayout']['uploaded_images'];
			
			
			foreach ($images as $file) {
				if ($file['error'] == 0) {
					$this->MediaFile->create();
					$data['MediaFile']['name'] = $file['name'];
					$data['MediaFile']['path'] = $file;
					$this->MediaFile->save($data);
					$end = strripos($file['name'], ".");
				}
			}
			
			foreach ($css as $file) {
				if ($file['error'] == 0) {
					$this->MediaFile->create();
					$data['MediaFile']['name'] = $file['name'];
					$data['MediaFile']['path'] = $file;
					$this->MediaFile->save($data);
					$end = strripos($file['name'], ".");
				}
			}
			foreach ($js as $file) {
				if ($file['error'] == 0) {
					$this->MediaFile->create();
					$data['MediaFile']['name'] = $file['name'];
					$data['MediaFile']['path'] = $file;
					$this->MediaFile->save($data);
					$end = strripos($file['name'], ".");
				}
			}
			
			$this->SiteLayout->create();
			if ($this->SiteLayout->save($this->request->data)) {
				$this->Session->setFlash(__('The site layout has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The site layout could not be saved. Please, try again.'));
			}
		}
		
		$this->set('css_files', 'stylesheets/tab,../js/codemirror/lib/codemirror,../js/codemirror/theme/neat');
		$this->set('js_files', 'tab,codemirror/lib/codemirror,codemirror/mode/htmlmixed/htmlmixed,codemirror/mode/javascript/javascript,codemirror/mode/php/php,codemirror/mode/xml/xml,codemirror/mode/css/css,site_layouts');
		$this->set('inline_css', '
			
			#editModeButton {
			
				cursor: default;
			
			}
			
		
		');
		$this->set('inline_js', 'site_layouts_add()');
		
		$this->SiteLayout->recursive = 0;
		$this->set('siteLayouts', $this->paginate());
		$this->set('title_for_page', 'Add New Site Layout');

	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	private function edit($id = null) {
		$this->SiteLayout->id = $id;
		if (!$this->SiteLayout->exists()) {
			throw new NotFoundException(__('Invalid site layout'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
		
			$css = $this->request->data['SiteLayout']['uploaded_css_files'];
			$js = $this->request->data['SiteLayout']['uploaded_js_files'];
			$images = $this->request->data['SiteLayout']['uploaded_images'];

			foreach ($images as $file) {
				if ($file['error'] == 0) {
					$this->MediaFile->create();
					$data['MediaFile']['name'] = $file['name'];
					$data['MediaFile']['path'] = $file;
					$this->MediaFile->save($data);
				}
			}
			
			foreach ($css as $file) {
				if ($file['error'] == 0) {
					$this->MediaFile->create();
					$data['MediaFile']['name'] = $file['name'];
					$data['MediaFile']['path'] = $file;
					$this->MediaFile->save($data);
				}
			}
			foreach ($js as $file) {
				if ($file['error'] == 0) {
					$this->MediaFile->create();
					$data['MediaFile']['name'] = $file['name'];
					$data['MediaFile']['path'] = $file;
					$this->MediaFile->save($data);
				}
			}
			
			if ($this->SiteLayout->save($this->request->data)) {
				$this->Session->setFlash(__('The site layout has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The site layout could not be saved. Please, try again.'));
			}
		} else {
			
			$this->request->data = $this->SiteLayout->read(null, $id);
			$this->request->data['SiteLayout']['layout'] = $this->SiteLayout->readlayout($this->request->data);
			$this->set('title_for_page', 'Edit Site Layout: ' . $this->request->data['SiteLayout']['title']);

		}
		
		$this->set('css_files', 'stylesheets/tab,../js/codemirror/lib/codemirror,../js/codemirror/theme/neat');
		$this->set('js_files', 'tab,codemirror/lib/codemirror,codemirror/mode/htmlmixed/htmlmixed,codemirror/mode/javascript/javascript,codemirror/mode/php/php,codemirror/mode/xml/xml,codemirror/mode/css/css,site_layouts');
		$this->set('inline_css', '
			
			#editModeButton {
			
				cursor: default;
			
			}
			
		
		');
		$this->set('inline_js', 'site_layouts_edit();');
		
		$this->SiteLayout->recursive = 0;
		$this->set('siteLayouts', $this->paginate());

	}

	
/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	private function delete($id = null) {
		if ( $id < 5 ) {
			$this->Session->setFlash(__('Cannot Delete Layout'));
			$this->redirect(array('action' => 'index'));
		}
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->SiteLayout->id = $id;
		if (!$this->SiteLayout->exists()) {
			throw new NotFoundException(__('Invalid site layout'));
		}
		if ($this->SiteLayout->delete()) {
			$this->Session->setFlash(__('Site layout deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Site layout was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	public function beforeFilter() {
		parent::beforeFilter();
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
		$this->view();
		$this->render('view');
		
	}
	public function admin_delete($id = null) {
		$this->delete($id);
	}
}
