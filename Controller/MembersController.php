<?php
App::uses('AppController', 'Controller');
/**
 * Members Controller
 *
 * @property Member $Member
 */
class MembersController extends AppController {

	public $helpers = array('Multifile');
	public $components = array('Strings');
	public $uses = array('MediaFile', 'Member');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Member->recursive = 0;
		$this->set('members', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Member->id = $id;
		if (!$this->Member->exists()) {
			throw new NotFoundException(__('Invalid member'));
		}
		$this->set('member', $this->Member->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($group_id=null) {
	
		$this->Member->MemberGroup->id = $group_id;
		if (!$this->Member->MemberGroup->exists()) {
			$this->Session->setFlash(__('Invalid member group'));
			$this->redirect(array('controller' => 'member_groups', 'action' => 'add'));

		}
		
		if ($group_id) {
		
			if ($this->request->is('post')) {
			
				$picture['path'] = array_shift($this->request->data['User']['avatar']);
				unset($this->request->data['User']['avatar']);
				$picture_exists = $picture['path']['error'] == 0;
				
				if ( $picture_exists ) {
				
					// get extension
					
					$name = $picture['path']['name'];
					$ext = $this->Strings->getExt($name); 
								
					$picture['name'] = $this->request->data['User']['full_name'].mktime().$ext;
					$picture = $this->MediaFile->upload($picture, 'Members');
					$this->request->data['Member']['avatar'] = $picture['MediaFile']['path']; 
					
					unset($name);
					unset($picture);
					
				} else {
					$this->request->data['Member']['avatar'] = null;
				}


			
				$this->request->data['User']['username'] = $this->request->data['User']['email'];
				$this->Member->User->create();
				
				if ($this->Member->User->save($this->request->data)) {
				
					$uid = $this->Member->User->id;
					
					$this->request->data['Member']['user_id'] = $uid; 
					$this->request->data['Member']['member_group_id'] = $group_id; 
					$this->Member->create();
					if ($this->Member->save($this->request->data)) {
						
						$mid = $this->Member->id;
						
						$this->Session->setFlash(__("Create a profile for the new member"));
						$this->redirect(array('controller' => 'profiles', 'action' => 'add', $mid));
					
					} else {
						$this->Session->setFlash(__('The member could not be saved. Please, try again.'));
						$this->Member->User->delete($uid);
					}
					
				} else {
					$flash = __('The member could not be saved. Please, try again.');
					$this->Session->setFlash($flash);
				}
			}
		
			$gid = $this->Member->MemberGroup->read(null, $group_id);
			$this->request->data['User']['group_id'] = $gid['MemberGroup']['group_id'];
			$this->request->data['User']['memberGroup_id'] = $group_id;
			//$this->setFields($gid);
			
			$this->retrieveContentBar();
		} else {
			$this->redirect(array('controller' => 'member_groups', 'action' => 'add'));
		}
	}
	
	private function retrieveContentBar() {
		$memberGroups = $this->Member->MemberGroup->find('all');
		foreach ($memberGroups as &$group) {
		
			foreach($group['Member'] as &$member) {
				$user = $this->Member->User->read('username', $member['user_id']);
				$member['username'] = $user['User']['username'];
			}
		}
		$this->set('memberGroups', $memberGroups);
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($member_id = null) {
		$this->Member->id = $member_id;
		if (!$this->Member->exists()) {
			$this->Session->setFlash(__('Invalid member'));
			$this->redirect(array('action' => 'index'));
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
		
		
			$picture['path'] = array_shift($this->request->data['User']['avatar']);
			unset($this->request->data['User']['avatar']);
			$picture_exists = $picture['path']['error'] == 0;
			
			if ( $picture_exists ) {
			
				// get extension
				
				$name = $picture['path']['name'];
				$ext = $this->Strings->getExt($name); 
							
				$picture['name'] = $this->request->data['User']['full_name'].mktime().$ext;
				$picture = $this->MediaFile->upload($picture, 'Members');
				$this->request->data['Member']['avatar'] = $picture['MediaFile']['path']; 
				
				unset($name);
				unset($picture);
				
			} else {
				$this->request->data['Member']['avatar'] = $this->request->data['User']['old_avatar'];
			}
		
			if (empty($this->request->data['User']['password'])) {
				unset($this->request->data['User']['password']);
				unset($this->request->data['User']['password_confirmation']);
			}

			$this->request->data['User']['username'] = $this->request->data['User']['email'];
			
			$this->request->data['Member']['id'] = $this->request->data['User']['member_id'];
			$this->request->data['Member']['user_id'] = $this->request->data['User']['id'];
			$this->request->data['Member']['member_group_id'] = $this->request->data['User']['member_group_id'];
			
			if ($this->Member->User->save($this->request->data)) {
				if ( $this->Member->save($this->request->data)) {
					$flash = __('The member has been saved');
					$this->Session->setFlash($flash);
					$this->redirect(array('controller'=>'member_groups','action' => 'index'));
				}
				else {
					$flash = __('The member could not be saved. Please, try again.');
					$this->Session->setFlash($flash);
				}
			} else {
				$flash = __('The member could not be saved. Please, try again.');
				$this->Session->setFlash($flash);
			}
			
		} else {

			$member = $this->Member->read(null, $member_id);
			$member['User']['member_group_id'] = $member['Member']['member_group_id'];
			$member['User']['old_avatar'] = $member['Member']['avatar'];
			$member['User']['member_id'] = $member['Member']['id'];
			// pr($member); exit;
			
			$this->request->data  = $member;
			unset($this->request->data['User']['password']);
		}
		
		$css = '
		
			.password_field, .avatar_field {
			
				width: 100%;
				background: #fff;
				padding: 5px;
				border: 1px solid #003D4C;
				border-top: none;
			
			}
			
			.avatar_edit {
			
				margin-top: 10px;
			
			}
			.password_hider,
			.avatar_hider {
				background: #eee;

				width: 100%;
				text-align: center;
				margin-top: 10px;
			}
			
			.old_avatar {
				width: 200px;
				margin: 0 auto;
				padding: 3px;
				border: 1px solid #eee;
				text-align: center;
			}
			
			.old_avatar img {
				width: 100%;
			}
			
			
		
		';
		
		$this->set('inline_css', $css);
		
		$script = '
		
			if ( !$(".password.error").length ) {
				$(".password_field").hide();
				pw_show = true;
			} else {
				pw_show = false;
			}
			if ( !$(".avatar.error").length ) {
				$(".avatar_field").hide();
				avatar_show = true;
			} else {
				avatar_show = false;
			}
				
				
			$(".password_hider, .avatar_hider").css("cursor", "pointer");
			$(".password_hider, .avatar_hider").css("border", "1px dotted #003D4C");
			$(".password_hider, .avatar_hider").css("padding", "5px");
			$(".password_hider, .avatar_hider").css("float", "left");
			
			$(".password_hider").click( function() {
			
				if (pw_show) {
					$(".password_hider").css("border", "1px solid #003D4C");
					$(".password_hider").css("border-bottom", "none");
					$(".password_field").slideDown(100);
				}
				else {
					$(".password_hider").css("border", "1px dotted #003D4C");
					$(".password_field").slideUp(100);
				}
					
				pw_show = !pw_show;
					
			});
			
			$(".avatar_hider").click( function() {
			
				if (avatar_show) {
					$(".avatar_hider").css("border", "1px solid #003D4C");
					$(".avatar_hider").css("border-bottom", "none");

					$(".avatar_field").slideDown(100);
				}
				else {
					$(".avatar_hider").css("border", "1px dotted #003D4C");
					$(".avatar_field").slideUp(100);
				}
					
				avatar_show = !avatar_show;
					
			});
		
		';
		$this->set('inline_js', $script);
	
		$this->retrieveContentBar();
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
		$this->Member->id = $id;
		if (!$this->Member->exists()) {
			throw new NotFoundException(__('Invalid member'));
		}
		if ($this->Member->delete()) {
			$this->Session->setFlash(__('Member deleted'));
			$this->redirect(array('controller' => 'member_groups','action' => 'index'));

		}
		$this->Session->setFlash(__('Member was not deleted'));
		$this->redirect(array('controller' => 'member_groups','action' => 'index'));
	}
	public function beforeFilter() {
		parent::beforeFilter();
		
		if($this->request->params['action'] == 'user_edit') {
			
			$user = $this->Auth->user();
			$member = $this->Member->find('first', array('conditions' => array('Member.user_id' => $user['id'])));
			if($member['Member']['id'] != $this->request->params['pass'][0]) {
				$this->Auth->deny('user_edit');
				$this->redirect(array('action' => 'user_edit', $member['Member']['id']));
			}
			
		}
		
	}
	
	public function manager_add($group_id) {
		$this->layout = 'management';

		$this->add($group_id);
		$this->render('add');
	}
	public function manager_edit($member_id) {
		$this->layout = 'management';
		$this->edit($member_id);
		$this->render('edit');
	}
	public function manager_delete($member_id) {
		$this->delete($member_id);
	}
	
	public function manager_index() {
		$this->layout = 'management';
		$this->redirect(array('controller' => 'member_groups', 'action' => 'index'));
	}
	
	public function user_index() {
		$this->layout = 'user_management';
		$this->index();
		$this->render('index');
	}
	
	public function user_view($id=null) {
	
	}
	
	public function user_edit($id=null) {
		$this->layout = 'user_management';
		$this->edit($id);
	}
	private function user_delete($id=null) {
		$this->layout = 'user_management';
		$this->delete();
	}
}
