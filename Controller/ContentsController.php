<?php
App::uses('AppController', 'Controller');
/**
 * Contents Controller
 *
 * @property Content $Content
 */
class ContentsController extends AppController {

	var $helpers = array('Multifile');

	var $uses = array('Content', 'MediaFile');
	
	private $key = 	"4f2d577c97e1f";

/**
 * index method
 *
 * @return void
 */
	private function index($force=null) {
		$this->redirect(array('controller' => 'categories','action' => 'index'));
		$this->Content->recursive = 0;
		$this->set('contents', $this->paginate());
	}
	

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	private function view($id = null) {
		$this->Content->id = $id;
		if (!$this->Content->exists()) {
			throw new NotFoundException(__('Invalid content'));
		} else {
			$content = $this->Content->read(null, $id);
			$this->redirect(array('controller'=>'content', 'action'=>'display',$content['Content']['alias']));
		}
		
	}

/**
 * add method
 *
 * @return void
 */
	private function add($id=null) {
		if ($this->request->is('post')) {
			$css = $this->request->data['Content']['uploaded_css_files'];
			$js = $this->request->data['Content']['uploaded_js_files'];
			$images = $this->request->data['Content']['uploaded_images'];
			
			
			foreach ($images as $file) {
				if ($file['error'] == 0) {
					$this->MediaFile->create();
					$data['MediaFile']['name'] = $file['name'];
					$data['MediaFile']['path'] = $file;
					$this->MediaFile->save($data);
					$end = strripos($file['name'], ".");
					$cssfiles[] = "mediafile/".substr($file['name'], 0, $end);
				}
			}
			
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
			$css = $this->request->data['Content']['css_files'];
			$js = $this->request->data['Content']['js_files'];
			
			$this->request->data['Content']['css_files'] .= $css == "" ? $cssfiles : "," . $cssfiles;
			$this->request->data['Content']['js_files']  .= $js == "" ? $jsfiles : "," . $jsfiles;
		
			$contents = $this->Content->find('list', array('conditions' => array('Content.category_id' => $this->request->data['Content']['category_id'])));
		
			$this->request->data['Content']['ordering'] = count($contents) + 1;

			$this->Content->create();
			if ($this->Content->save($this->request->data)) {
				$this->Session->setFlash(__('The content has been saved'));
				if ($id) {
					$this->redirect(array('controller' => 'categories','action' => 'index'));
				} else {
					$this->redirect(array('controller' => 'categories','action' => 'index'));
				}
			} else {
				$this->Session->setFlash(__('The content could not be saved. Please, try again.'));
			}
		} else {
			$this->set('css_files', 'stylesheets/tab,../js/codemirror/lib/codemirror,../js/codemirror/theme/neat');
			$this->set('js_files', 'tab,tiny_mce/tiny_mce,codemirror/lib/codemirror,codemirror/mode/javascript/javascript,codemirror/mode/css/css,contents');
			$this->set('inline_js', 'contents_add();');
		}
		if ($id) {
			$this->request->data['Content']['category_id'] = $id;
		} else {
			$this->request->data['Content']['category_id'] = 4;
		}
		$categories = $this->Content->Category->find('list');
		$parents = $this->Content->find('list');
		$this->set(compact('categories','parents'));
		$this->retrieveContent();

	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	private function edit($id = null) {
		
		$this->Content->id = $id;
		if (!$this->Content->exists()) {
			throw new NotFoundException(__('Invalid content'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			
			// $hasKey = $this->request->data['Content']['key'] === $this->key . $id;
			// if ( !$hasKey ) {
				// $this->Session->setFlash('Another user is editing this content, try again later');
				// $this->redirect(array('action' => 'index'));
			// }
			
			$css = $this->request->data['Content']['uploaded_css_files'];
			$js = $this->request->data['Content']['uploaded_js_files'];
			$images = $this->request->data['Content']['uploaded_images'];
			
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
			$css = $this->request->data['Content']['css_files'];
			$js = $this->request->data['Content']['js_files'];
			
			$this->request->data['Content']['css_files'] .= $css == "" ? $cssfiles : "," . $cssfiles;
			$this->request->data['Content']['js_files']  .= $js == "" ? $jsfiles : "," . $jsfiles;
			
			// handling ordering
			$old = $this->Content->read('ordering', $this->request->data['Content']['id']);
			
			if ($old['Content']['ordering'] > $this->request->data['Content']['ordering']) {
				$content = $this->Content->find('all', array('conditions' => array('Content.ordering <=' => $old['Content']['ordering'], 'Content.ordering >=' => $this->request->data['Content']['ordering'], 'Content.category_id' => $this->request->data['Content']['category_id'], 'Content.id !=' => $this->request->data['Content']['id']), 'order' => 'Content.ordering ASC'));
				if(!empty($content)) {
					foreach ($content as $item) {
						// increment by 1
						$item['Content']['ordering']++;
						$this->Content->save($item);
					}
				}
			} elseif ($old['Content']['ordering'] < $this->request->data['Content']['ordering'])  {
				$content = $this->Content->find('all', array('conditions' => array('Content.ordering >=' => $old['Content']['ordering'], 'Content.ordering <=' => $this->request->data['Content']['ordering'], 'Content.category_id' => $this->request->data['Content']['category_id'], 'Content.id !=' => $this->request->data['Content']['id']), 'order' => 'Content.ordering ASC'));
				if(!empty($content)) {
					foreach ($content as $item) {
						// decrement by 1
						$item['Content']['ordering']--;
						$this->Content->save($item); 
					}
				}
			}
		
			if ($this->Content->save($this->request->data)) {
			
				// clean up ordering so it starts from 1
				$this->refreshCategoryOrdering();
				$this->Session->setFlash(__('The content has been saved'));
				
				$this->Lock->unlock($this->request->data['Content']['key']);
				
				$this->redirect(array('controller' => 'categories','action' => 'index'));
			} else {
				$this->Session->setFlash(__('The content could not be saved. Please, try again.'));
			}
			
		} else {
			$this->request->data = $this->Content->read(null, $id);
			$this->set('css_files', 'stylesheets/tab,../js/codemirror/lib/codemirror,../js/codemirror/theme/neat');
			$this->set('js_files', 'tab,tiny_mce/tiny_mce,codemirror/lib/codemirror,codemirror/mode/javascript/javascript,codemirror/mode/css/css,contents');
			
			// $unkey = Router::url(array('action' => 'forceUnlock'),true);
			// $key = $this->key . $id;
			// if ($this->Lock->lock($key)) {
				// $this->request->data['Content']['key'] = $key;
				// $tmpkey = $key;
			// } else
				// $tmpkey = "null";
			
			$this->set('inline_js', '
			contents_edit();
			
			');
		}
		$categories = $this->Content->Category->find('list');
		$parents = $this->Content->find('list');
		$this->set(compact('categories','parents'));
		$this->retrieveContent();
		
	}
	
	private function forceUnlock() {
	
		if ( $this->request->is('post') || $this->request->is('put')) {
		
			$data = $this->request->data;
			
			if ($this->Lock->unlock($data['key']))
				echo "abc";
			else 
				echo "xyz";
		
		}
		
		
	
	}
	public function manager_forceUnlock() {
	
		$this->forceUnlock();
		exit;
	}
	
	private function refreshCategoryOrdering() {
	
		$categories = $this->Content->Category->find('all');
		foreach ($categories as $category) {
			$content = $this->Content->find('all', array('conditions' => array('Content.category_id' => $category['Category']['id']), 'order' => 'Content.ordering ASC'));
			$counter = 1;
			foreach ($content as $item) {
				$item['Content']['ordering'] = $counter;
				$this->Content->save($item);
				$counter++;
			}
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
		$this->Content->id = $id;
		if (!$this->Content->exists()) {
			throw new NotFoundException(__('Invalid content'));
		}
		
		
		if ($this->Content->delete()) {
			$this->refreshCategoryOrdering();
			$this->Session->setFlash(__('Content deleted'));
			$this->redirect(array('controller' => 'categories','action' => 'index'));

		}
		$this->Session->setFlash(__('Content was not deleted'));
		$this->redirect(array('controller' => 'categories','action' => 'index'));
	}
	function beforeFilter() {
		parent::beforeFilter();
		$this->layout = 'management';
		$this->Auth->allow('forceUnlock');
	}
	
	public function manager_index() {
		$this->index();
		$this->render('index');
	}
	public function manager_add($id=null) {
		$this->add($id);
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
	public function manager_delete($id) {
		$this->delete($id);
	}
	public function admin_add() {
		$this->add();
		$this->request->data['Content']['category_id'] = 3;

		$this->admin_retrieveContent();
		$this->render('add');
	}
	public function admin_edit($id = null) {
		$this->edit($id);
		$this->request->data['Content']['category_id'] = 3;
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
	
		$categories = $this->Content->Category->find('all', array('conditions'=>array('Category.title !=' => 'administrator')));
		
		foreach ($categories as &$category) {
		
			$content =  $this->Content->find('list', array('conditions' => array('Content.category_id' => $category['Category']['id']),'order' => 'Content.ordering ASC'));
			$category['Content'] = $content;
		
		}
		
		$this->set('categories_', $categories);
	
	}
	
	private function admin_retrieveContent() {
	
		$categories = $this->Category->find('all', array('conditions'=>array('Category.title' => 'administrator')));
		
		foreach ($categories as &$category) {
		
			$content =  $this->Category->Content->find('list', array('conditions' => array('Content.category_id' => $category['Category']['id']),'order' => 'Content.ordering ASC'));
			$category['Content'] = $content;
		
		}
		
		$this->set('categories_', $categories);
	
	}
}
