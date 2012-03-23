<?php
App::uses('AppController', 'Controller');
/**
 * Profiles Controller
 *
 * @property Profile $Profile
 */
class ProfilesController extends AppController {

	public $helpers = array('ProfileField');
	public $components = array('Tag');
/**
 * index method
 *
 * @return void
 */
 
	public $uses = array('Profile', 'MemberGroup', 'MediaFile');
	
	public function admin_index() {
		$this->Profile->recursive = 0;
		$this->set('profiles', $this->paginate());
		$this->set('title_for_page', 'Profiles');
		
	}
	
	public function index() {
		$this->redirect(array('controller'=>'member_groups','action' => 'index'));
		$this->set('title_for_page', 'Profiles');

	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($member_id = null) {
	
		$member = $this->Profile->Member->read(null, $member_id);
		$member_group = $this->Profile->Member->MemberGroup->read(null, $member['MemberGroup']['id']);
		
		$fields = $this->MemberGroup->ProfileLayout->readFields($member['MemberGroup']['profile_layout_id']);
		$profile = $this->Profile->read(null, $member['Profile']['id']);
		$values = json_decode($profile['Profile']['fields'], true);
		
		foreach (array_keys($fields) as $field) {
		
			
			if ( isset($values[$field])) {
				$tmp['type'] = $fields[$field];
				$tmp['value'] = $values[$field];
			}
				
			$fields[$field] = $tmp;
		}
		
		$name = $member_group['ProfileLayout']['name'];
		
		$css = $member_group['ProfileLayout']['css_files'];
		$js = $member_group['ProfileLayout']['js_files'];
		
		$this->set('js_files', $js);
		$this->set('css_files', $css);
		
		$this->set(compact('member', 'member_group', 'fields'));
		$this->set('title_for_page', ucfirst($member['User']['full_name']));

		$this->render("../ProfileLayouts/Layouts/$name/layout");
	}

// /**
 // * add method
 // *
 // * @return void
 // */
	// private function add() {
		// if ($this->request->is('post')) {
			// $this->Profile->create();
			// if ($this->Profile->save($this->request->data)) {
				// $this->Session->setFlash(__('The profile has been saved'));
				// $this->redirect(array('action' => 'index'));
			// } else {
				// $this->Session->setFlash(__('The profile could not be saved. Please, try again.'));
			// }
		// }
		// $users = $this->Profile->User->find('list');
		// $this->set(compact('users'));
	// }

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	private function edit($member_id = null) {
		$this->Profile->Member->id = $member_id;
		if (!$this->Profile->Member->exists()) {
			throw new NotFoundException(__('Invalid member'));
		}
		
		$member = $this->Profile->Member->read(null, $member_id);
		$fields = $this->MemberGroup->ProfileLayout->readFields($member['MemberGroup']['profile_layout_id']);
		
		if ( !empty($fields)) {
			
			$this->set(compact('fields'));
		
			if ($this->request->is('post') || $this->request->is('put')) {
			
				$data = $this->collapseFields($this->request->data['Profile'], $fields); 
				unset($this->request->data['Profile']['fields']);
				$this->request->data['Profile']['fields'] = json_encode($data);
				if ($this->Profile->save($this->request->data)) {
					$this->Session->setFlash(__('The profile has been saved'));
					$this->redirect(array('controller'=>'members','action' => 'edit', $member_id));
				} else {
					$this->Session->setFlash(__('The profile could not be saved. Please, try again.'));
				}
				
			} else {
			
				$profile = $this->Profile->find('first', array('conditions' => array('Profile.member_id'=>$member_id)));
				if ( !empty($profile) ) {
					$data = json_decode($profile['Profile']['fields'], true);
					$data['raw'] = $profile['Profile']['fields'];
					$profile['Profile'] = array_merge($profile['Profile'], $data);
					$this->request->data = $profile;
				} else {
					$this->Session->setFlash(__('No profile defined for member, notify administrator'));
					$this->redirect(array('controller'=>'member_groups','action' => 'index'));
				}
			}

		} else {
			$this->Session->setFlash(__('No profile layout defined for Member Group'));

			$this->redirect(array('controller' => 'member_groups', 'action' => 'index'));
		}

		$this->set('title_for_page', 'Edit ' . ucfirst($member['User']['full_name']));
		$this->set('css_files', 'stylesheets/profile');
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
		$this->Profile->id = $id;
		if (!$this->Profile->exists()) {
			throw new NotFoundException(__('Invalid profile'));
		}
		if ($this->Profile->delete()) {
			$this->Session->setFlash(__('Profile deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Profile was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	private function add($member_id) {
		
		$this->Profile->Member->id = $member_id;
		
		if (!$this->Profile->Member->exists()) {
			throw new NotFoundException(__('Invalid profile'));
		}
		
		$member = $this->Profile->Member->read(null, $member_id);
		$mgroup = $this->MemberGroup->find('first', array('conditions' => array('MemberGroup.id' => $member['MemberGroup']['id'])));
		$fields = $this->MemberGroup->ProfileLayout->readFields($mgroup['ProfileLayout']['id']);
		$this->set(compact('fields'));
		
		if ($this->request->is('post') || $this->request->is('put')) {
			
			$data = $this->collapseFields($this->request->data['Profile'], $fields); 
			unset($this->request->data['Profile']['fields']);
			$this->request->data['Profile']['fields'] = json_encode($data);
			$this->request->data['Profile']['member_id'] = $member_id;
			if ($this->Profile->save($this->request->data)) {
				$this->Session->setFlash(__('The profile has been saved'));
				$this->redirect(array('controller'=>'members','action' => 'edit', $member_id));
			} else {
				$this->Session->setFlash(__('The profile could not be saved. Please, try again.'));
			}
		}
		
		$this->set('title_for_page', 'Create Profile for ' . ucfirst($member['User']['full_name']));

	
	}
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('view');
		
		if($this->request->params['action'] == 'user_edit') {
			
			$user = $this->Auth->user();
			$member = $this->Profile->Member->find('first', array('conditions' => array('Member.user_id' => $user['id'])));
			$profile = $this->Profile->find('first', array('conditions' => array('Profile.member_id' => $member['Member']['id'])));
			if($profile['Member']['id'] != $this->request->params['pass'][0]) {
				$this->Auth->deny('user_edit');
				$this->redirect(array('action' => 'user_edit', $profile['Member']['id']));
			}
			
		}
		

	}
	
	private function collapseFields($values, $fields) {
		$index = 0;
		foreach (array_keys($fields) as $key) {
			$action = $fields[$key];
			
			switch ($action ) 
			{
				case ('string'):
					$output[$key] = $values[$key];
					break;
				case ('text'):
					$output[$key] = $values[$key];
					break;
				case ('image'):
					$picture['path'] = $values[$key][0];
					$picture = $this->MediaFile->upload($picture, 'profiles');
					$output[$key] = $picture['MediaFile']['path'];
					if (empty($output[$key])) {
						$data = json_decode($values['raw'], true);
						$output[$key] = $data[$key];
					}
					break;
				case ('datetime'):
					$output[$key] = $values[$key];
					break;
				case ('time'):
					$output[$key] = $values[$key];
					break;
				default:
					$output[$key] = $values[$key];
					break;
			}
			$index++;
		}

		return $output;
	}

	public function admin_add($member_id=null) {
		$this->layout = 'management';
		
		$this->add($member_id);
		$this->render('add');
		
	}
	
	public function admin_edit($member_id=null) {
		$this->layout = 'management';
		
		$this->edit($member_id);
		$this->render('edit');
		
	}
	
	public function admin_view($member_id=null) {
		$this->layout = 'management';
	
		$this->view($member_id);
	}
	
	public function user_index() {
		$this->layout = 'user_management';
		$this->index();
		$this->render('index');
	}
	
	public function user_view($member_id=null) {
		$this->layout = 'user_management';
	
		$this->view($member_id);
	}	
	
	public function user_edit($id=null) {
		$this->layout = 'user_management';
		$this->edit($id);
		$this->render('edit');
	}
	private function user_delete($id=null) {
		$this->layout = 'user_management';
		$this->delete($id);
	}
}
