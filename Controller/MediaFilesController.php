<?php
App::uses('AppController', 'Controller');
/**
 * MediaFiles Controller
 *
 * @property MediaFile $MediaFile
 */
class MediaFilesController extends AppController {

var $helpers = array('Multifile');


private function setContent() {

		$type ='MediaFile.fileType';
		$notType ='MediaFile.fileType not';
		
		$img = array('image/jpeg', 'image/png', 'image/gif');
		$js = array('application/x-javascript');
		$css = array('text/css');
	
		$images = $this->MediaFile->find('all', array('conditions'=>array($type => $img)));
		$javascripts = $this->MediaFile->find('all', array('conditions'=>array($type => $js)));
		$stylesheets = $this->MediaFile->find('all', array('conditions'=>array($type => $css)));
		$others = $this->MediaFile->find('all', array('conditions'=>array($notType => array_merge($img, $js, $css))));
		
		$mediaFiles['images'] = $images;
		$mediaFiles['javascripts'] = $javascripts;
		$mediaFiles['stylesheets'] = $stylesheets;
		$mediaFiles['others'] = $others;
		
		// pr($mediaFiles); exit;
		
		$this->set('mediaFiles', $mediaFiles);
}
/**
 * index method
 *
 * @return void
 */
	private function index() {
	
		$this->setContent();
	
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	private function view($id = null) {
		$this->MediaFile->id = $id;
		if (!$this->MediaFile->exists()) {
			throw new NotFoundException(__('Invalid media file'));
		}
		$mediaFile = $this->MediaFile->read(null, $id);
		$this->set('mediaFile', $mediaFile);
		$this->set('url', Router::url(DS ."webroot" . DS. $mediaFile['MediaFile']['path'], true));
		$this->setContent();
		
	}

/**
 * add method
 *
 * @return void
 */
	private function add() {
		if ($this->request->is('post')) {
			
			
			$files = $this->request->data['MediaFile']['path'];
			
			foreach ($files as $file) {
					
				if ($file['error'] == 0 && strlen($file['name']) > 0) {
					$this->MediaFile->create();
					$data['MediaFile']['name'] = $file['name'];
					$data['MediaFile']['path'] = $file;
					if ( $this->MediaFile->save($data) ) {
						$uploads[] = $file['name'];
					} else {
						$errors[] = $file['name'];
					}
				}
				
			}
			if ( isset($errors) && !empty($errors) ) {
				
				if (count($errors) == 1) {
					$errors = $errors[0];
				} else {
					$errors = implode(' ,', $errors);
				}
				
				$this->Session->setFlash(__($errors) . __('could not be saved. Please, try again.'));
				
			} else {
				$this->Session->setFlash(__('The files have been uploaded'));
				$this->redirect(array('action' => 'index'));
			}
			
		} else {
			$this->set('css_files', 'stylesheets/form,stylesheets/tab');
			$this->set('js_files', 'tab');
		}
		
		$this->setContent();

	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	private function edit($id = null) {
		$this->MediaFile->id = $id;
		if (!$this->MediaFile->exists()) {
			throw new NotFoundException(__('Invalid media file'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MediaFile->save($this->request->data)) {
				$this->Session->setFlash(__('The media file has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The media file could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->MediaFile->read(null, $id);
		}
		$this->setContent();

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
		$this->MediaFile->id = $id;
		if (!$this->MediaFile->exists()) {
			throw new NotFoundException(__('Invalid media file'));
		}
		if ($this->MediaFile->delete()) {
			$this->Session->setFlash(__('Media file deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Media file was not deleted'));
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
		$this->view($id);
		$this->render('view');
	}
	public function manager_delete($id = null) {
		$this->delete($id);
	}
}
