<?php
App::uses('AppController', 'Controller');
/**
 * ProfileLayouts Controller
 *
 * @property ProfileLayout $ProfileLayout
 */
class ProfileLayoutsController extends AppController {

	var $helpers = array('Multifile');

	var $uses = array('ProfileLayout', 'MediaFile');

/**
 * index method
 *
 * @return void
 */
	private function index() {
	}
	private function retrieveContent() {
		
		$layouts = $this->ProfileLayout->find('all');
		$this->set('layouts', $layouts);
	
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	private function view($id = null) {
		$this->ProfileLayout->id = $id;
		if (!$this->ProfileLayout->exists()) {
			throw new NotFoundException(__('Invalid profile layout'));
		}
		$this->set('profileLayout', $this->ProfileLayout->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	private function add() {
		if ($this->request->is('post')) {
		
			$css = $this->request->data['ProfileLayout']['uploaded_css_files'];
			$js = $this->request->data['ProfileLayout']['uploaded_js_files'];
		
			
			foreach ($css as $file) {
				if ($file['error'] == 0) {
					$this->MediaFile->create();
					$data['MediaFile']['name'] = $file['name'];
					$data['MediaFile']['path'] = $file;
					$this->MediaFile->save($data);
					$end = strripos($file['name'], ".");
					$cssfiles[] = "mediafile/".substr($file['name'], 0, $end);
				}
			}
			foreach ($js as $file) {
				if ($file['error'] == 0) {
					$this->MediaFile->create();
					$data['MediaFile']['name'] = $file['name'];
					$data['MediaFile']['path'] = $file;
					$this->MediaFile->save($data);
					$end = strripos($file['name'], ".");
					$jsfiles[] = "mediafile/".substr($file['name'], 0, $end);
				}
			}
			
			$cssfiles = isset($cssfiles) ? implode(",", $cssfiles) : "" ;
			$jsfiles = isset($jsfiles) ? implode(",", $jsfiles): "" ;
			$css = $this->request->data['ProfileLayout']['css_files'];
			$js = $this->request->data['ProfileLayout']['js_files'];
			
			$this->request->data['ProfileLayout']['css_files'] .= $css == "" ? $cssfiles : "," . $cssfiles;
			$this->request->data['ProfileLayout']['js_files']  .= $js == "" ? $jsfiles : "," . $jsfiles;
			
			$tmp = explode(",", $this->request->data['ProfileLayout']['css_files'] );
			$tmp = array_unique($tmp); 
			$tmp = implode(",",$tmp);
			$this->request->data['ProfileLayout']['css_files'] = $tmp;
			$tmp = explode(",", $this->request->data['ProfileLayout']['js_files'] );
			$tmp = array_unique($tmp); 
			$tmp = implode(",",$tmp);
			$this->request->data['ProfileLayout']['js_files'] = $tmp;
		
			$this->ProfileLayout->create();
			if ($this->ProfileLayout->save($this->request->data)) {
				$this->Session->setFlash(__('The profile layout has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The profile layout could not be saved. Please, try again.'));
			}
		}
		$this->set('css_files', 'stylesheets/tab');
		$this->set('js_files', 'tab');
		
		
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	private function edit($id = null) {
		$this->ProfileLayout->id = $id;
		if (!$this->ProfileLayout->exists()) {
			throw new NotFoundException(__('Invalid profile layout'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$css = $this->request->data['ProfileLayout']['uploaded_css_files'];
			$js = $this->request->data['ProfileLayout']['uploaded_js_files'];
		
			
			foreach ($css as $file) {
				if ($file['error'] == 0) {
					$this->MediaFile->create();
					$data['MediaFile']['name'] = $file['name'];
					$data['MediaFile']['path'] = $file;
					$this->MediaFile->save($data);
					$end = strripos($file['name'], ".");
					$cssfiles[] = "mediafile/".substr($file['name'], 0, $end);
				}
			}
			foreach ($js as $file) {
				if ($file['error'] == 0) {
					$this->MediaFile->create();
					$data['MediaFile']['name'] = $file['name'];
					$data['MediaFile']['path'] = $file;
					$this->MediaFile->save($data);
					$end = strripos($file['name'], ".");
					$jsfiles[] = "mediafile/".substr($file['name'], 0, $end);
				}
			}
			
			$cssfiles = isset($cssfiles) ? implode(",", $cssfiles) : "" ;
			$jsfiles = isset($jsfiles) ? implode(",", $jsfiles): "" ;
			$css = $this->request->data['ProfileLayout']['css_files'];
			$js = $this->request->data['ProfileLayout']['js_files'];
			
			$css = $css == "" ? $cssfiles : "," . $cssfiles;
			$js = $js == "" ? $jsfiles : "," . $jsfiles;
			
			
			$this->request->data['ProfileLayout']['css_files'] .= $css;
			$this->request->data['ProfileLayout']['js_files']  .= $js;
			
			$tmp = explode(",", $this->request->data['ProfileLayout']['css_files'] );
			$tmp = array_unique($tmp); 
			$tmp = implode(",",$tmp);
			$this->request->data['ProfileLayout']['css_files'] = $tmp;
			$tmp = explode(",", $this->request->data['ProfileLayout']['js_files'] );
			$tmp = array_unique($tmp); 
			$tmp = implode(",",$tmp);
			$this->request->data['ProfileLayout']['js_files'] = $tmp;
			
			if ($this->ProfileLayout->save($this->request->data)) {
			
				$this->Session->setFlash(__('The profile layout has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The profile layout could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ProfileLayout->read(null, $id);
			$this->set('css_files', 'stylesheets/tab');
			$this->set('js_files', 'tab');
		}
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
		$this->ProfileLayout->id = $id;
		if (!$this->ProfileLayout->exists()) {
			throw new NotFoundException(__('Invalid profile layout'));
		}
		if ($this->ProfileLayout->delete()) {
			$this->Session->setFlash(__('Profile layout deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Profile layout was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->layout = 'management';
		$this->retrieveContent();

	}
	
	public function manager_index() {
		$this->render('index');
	}
	public function manager_add() {
		$this->add();
		$this->render('add');
	}
	public function manager_edit($id=null) {
		$this->edit($id);
		$this->render('edit');

	}
	public function manager_delete($id=null) {
		$this->delete($id);
	}
}
