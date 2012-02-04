<?php
App::uses('AppController', 'Controller');
/**
 * Galleries Controller
 *
 * @property Gallery $Gallery
 */
class GalleriesController extends AppController {
	var $helpers = array('Multifile');
	var $uses = array('Gallery', 'MediaFile');
	var $components = array('Strings', 'FacebookGallery', 'VimeoGallery');


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->retrieveContent();
		
		$this->set('css_files', 'stylesheets/gallery,stylesheets/loading');
		$this->set('js_files', 'spin,loading');
		$this->set('inline_js', '
		
			$(".gal").each(function(index) {
			
				$(this).click(function() {
				
					$("#loading").css("z-index", 100);
					$("#loading").css("opacity", 0.6);
				
				});
			
			});					
		');
	}
	
	private function retrieveContent() {
		$this->Gallery->recursive = 0;
		$this->set('galleries', $this->paginate());
	}
/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Gallery->id = $id;
		if (!$this->Gallery->exists()) {
			throw new NotFoundException(__('Invalid gallery'));
		}
		
		$gal = $this->Gallery->read(null, $id);
		$gallery = "view_" . strtolower($gal['Gallery']['source']);
			
		if (!method_exists($this, $gallery)) {
			$this->Session->setFlash( ucfirst($gallery) . " " . __('is not supported', true));
			$this->redirect(array('action' => 'index'));
		} else {
			$func = $gallery;
			$this->$func($gal);
		}
	}

/**
 * add method
 *
 * @return void
 */
	private function add($gallery = null) {
		
		if ($this->request->is('post')) {
			
			$picture['path'] = array_shift($this->request->data['Gallery']['picture']);
			$picture_exists = $picture['path']['error'] == 0;
			
			if ( $picture_exists ) {
			
				// get extension
				$name = $picture['path']['name'];
				$ext = $this->Strings->getExt($name); 
							
				$picture['name'] = $this->request->data['Gallery']['name'].$ext;
				$picture = $this->MediaFile->upload($picture, 'galleries');
				
				$this->request->data['Gallery']['picture'] = $picture['MediaFile']['path']; 
				
				unset($name);
				unset($picture);
			} 
			
			$variables = $this->request->data['Gallery']['variables'];
			$data = json_encode($variables);
			$this->request->data['Gallery']['variables'] = $data;
			
			$this->Gallery->create();
			if ($this->Gallery->save($this->request->data)) {
				$this->Session->setFlash(__('The gallery has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The gallery could not be saved. Please, try again.'));
			}
		}
		
		if ( $gallery == null ) { 
			
			$this->Session->setFlash( __('Invalid Gallery', true));
			$this->redirect(array('action' => 'index'));
		
		} else {
			$method = "add_" . $gallery;
			
			if (!method_exists($this,$method)) {
				$this->Session->setFlash( ucfirst($gallery) . " " . __('is not supported', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$func = $method;
				$this->$func();
			}
		}
		
	}
	
	

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	private function edit($id = null) {
		$this->Gallery->id = $id;
		if (!$this->Gallery->exists()) {
			throw new NotFoundException(__('Invalid gallery'));
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
			$picture['path'] = array_shift($this->request->data['Gallery']['picture']);
			$picture_exists = $picture['path']['error'] == 0;
			
			if ( $picture_exists ) {
			
				// get extension
				$name = $picture['path']['name'];
				$ext = $this->Strings->getExt($name); 
							
				$picture['name'] = $this->request->data['Gallery']['name'].$ext;
				$picture = $this->MediaFile->upload($picture, 'galleries');
				
				$this->request->data['Gallery']['picture'] = $picture['MediaFile']['path']; 
				
				unset($name);
				unset($picture);
			} else {
				if ( $this->request->data['Gallery']['old_picture'] )
					$this->request->data['Gallery']['picture'] = $this->request->data['Gallery']['old_picture'];
			}
			
			$variables = $this->request->data['Gallery']['variables'];
			$data = json_encode($variables);
			$this->request->data['Gallery']['variables'] = $data;
			
			
			if ($this->Gallery->save($this->request->data)) {
				$this->Session->setFlash(__('The gallery has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The gallery could not be saved. Please, try again.'));
			}
		} else {
				
			$gallery = $this->Gallery->read(null, $id);
			$gallery['Gallery']['variables'] = json_decode($gallery['Gallery']['variables'], true);
			$gallery['Gallery']['old_picture'] = $gallery['Gallery']['picture'];

			$this->request->data = $gallery;
			$gallery = "edit_" . strtolower($gallery['Gallery']['source']);
			
			if (!method_exists($this, $gallery)) {
				$this->Session->setFlash( $gallery . " " . __('is not supported', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$func = $gallery;
				$this->$func();
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
		$this->Gallery->id = $id;
		if (!$this->Gallery->exists()) {
			throw new NotFoundException(__('Invalid gallery'));
		}
		if ($this->Gallery->delete()) {
			$this->Session->setFlash(__('Gallery deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Gallery was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->set('css_files', 'stylesheets/galleries');
		$this->Auth->allow('index', 'view', 'facebook');
		$this->retrieveContent();

	}
	
	/**
	 * Admin Functions
	 */
	public function manager_index() {
		$this->layout = 'management';
		$this->Gallery->recursive = 0;
		$this->set('galleries', $this->paginate());
	}
	
	public function manager_view($id = null) {
		$this->layout = 'management';
		$this->view($id);
	}
	public function manager_add($id = null) {
		$this->layout = 'management';
		$this->add($id);
	}
	public function manager_edit($id=null) {
		$this->layout = 'management';
		$this->edit($id);
	}
	public function manager_delete($id=null) {
		$this->layout = 'management';
		$this->delete($id);
	}
	
	/**
		Supported Galleries
	*/
	
	/**
		Facebook
	*/
	
	private function add_facebook() {
	
		$this->request->data['Gallery']['source'] = 'facebook';
		$this->set('css_files', 'stylesheets/tab');
		$this->render('supported/add_facebook');
	}
	private function edit_facebook() {
	
		$this->set('css_files', 'stylesheets/tab,stylesheets/gallery');
		$this->render('supported/edit_facebook');
	}
	
	private function view_facebook($gallery) {
	
		$variables = json_decode($gallery['Gallery']['variables'], true);
		$albums = $this->FacebookGallery->getAlbums($variables['account']);
		
		// foreach ($albums as $album) {
			// 
			// break;
		// }
		
		$this->set(compact('albums', 'gallery'));
		$this->set('css_files', 'stylesheets/gallery,stylesheets/loading');
		$this->set('js_files', 'spin,loading');
		$this->set('inline_js', '
		
			$("#loading").css("z-index", 100);
			$("#loading").css("opacity", 0.6);
			
			setTimeout(function() {
			
				$("#loading").css("z-index", -100);
				$("#loading").css("opacity", "0");

			}, 1000);
				
			$(".fb_album").each(function(index) {
			
				$(this).click(function() {
				
					$("#loading").css("z-index", 100);
					$("#loading").css("opacity", 0.6);
				
				});
			
			});					
		');
		$this->render('supported/view_facebook');

	}
	
	public function facebook($gid = null, $aid = null, $name = null) {
	
		if ( $gid && $aid && $name) {
			
			$gallery = $this->Gallery->read(null , $gid);
			
			if ( $gallery['Gallery']['source'] == 'facebook' ) {
			
				$pictures = $this->FacebookGallery->getPhotos($aid, str_replace("_", " ", $name));
				$this->set(compact('pictures', 'gallery'));
				$this->set('css_files', 'stylesheets/gallery,prettyPhoto/prettyPhoto,stylesheets/loading');
				$this->set('js_files', 'prettyPhoto/prettyPhoto,spin,loading');
				
				$this->set('inline_js', '
				
					$(".facebook_image").each(function(index) {
					
						$(this).parent().attr("rel","prettyPhoto[fb_gal]");
					
					});
					
					$(".fb_album").each(function(index) {
			
						$(this).click(function() {
					
							$("#loading").css("z-index", 100);
							$("#loading").css("opacity", 0.6);
						
						});
					});
					
					$("a[rel^=\'prettyPhoto[fb_gal]\']").prettyPhoto();
					
					
				
				');
				$this->render('supported/view_facebook_album');
			
			} else {
		
				$this->Session->setFlash("Specify a Facebook Gallery");
				$this->redirect(array('action' => 'index'));
			
			}
			
		} else {
		
			$this->Session->setFlash("Specify a Facebook Gallery");
			$this->redirect(array('action' => 'index'));
		
		}
	}
	
	/**
		Vimeo
		
	*/
	
	private function add_vimeo() {
	
		$this->request->data['Gallery']['source'] = 'vimeo';
		$this->set('css_files', 'stylesheets/tab');
		$this->render('supported/add_vimeo');
	}
	
	private function edit_vimeo() {
	
		$this->set('css_files', 'stylesheets/tab,stylesheets/gallery');
		$this->render('supported/edit_vimeo');
	}
	
	private function view_vimeo($gallery) {
	
		$variables = json_decode($gallery['Gallery']['variables'], true);
		$videos = $this->VimeoGallery->getVideos($variables['account']);
		
		// foreach ($albums as $album) {
			// 
			// break;
		// }
		
		$this->set(compact('videos', 'gallery'));
		$this->set('css_files', 'stylesheets/gallery,prettyPhoto/prettyPhoto,stylesheets/loading');

		$this->set('js_files', 'prettyPhoto/prettyPhoto,spin,loading');

		$this->set('inline_js', '
				
			$("#loading").css("z-index", 100);
			$("#loading").css("opacity", 0.6);
			
			setTimeout(function() {
			
				$("#loading").css("display", "none");

			}, 1000);
			
			$(".vimeo_image").each(function(index) {
					
				$(this).parent().attr("rel","prettyPhoto[vm_gal]");
			
			});
						
			$("a[rel^=\'prettyPhoto[vm_gal]\']").prettyPhoto();

		');
		$this->render('supported/view_vimeo');
		
	}
	
	
}
