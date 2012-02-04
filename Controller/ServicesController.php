<?php
App::uses('CakeEmail', 'Network/Email');
class ServicesController extends AppController {

	public $uses = array('ListservService','EmailService', 'MemberGroup');
	
	public function mailinglist() {
	
		if ($this->request->is('post')) {
		
			$this->ListservService->create();
			
			if($this->ListservService->save($this->request->data)) {
			
				$this->Session->setFlash(__('You have been added to the mailing list'));
				$this->redirect(array('action' => 'mailinglist'));
				
			} else {
				
				$this->Session->setFlash(__('Could not add you to the mailing list'));
			
			}
		
		}
		
		$this->set('title_for_layout', 'Join Mailing List');
	
	}
	
	public function contact($member_group_id=null) {
	
		$this->MemberGroup->id = $member_group_id;
		
		if (!$this->MemberGroup->exists()) {
			$this->Session->setFlash(__('Invalid Group provided, please contact the site administrator'));
			$this->redirect('/');
		}
	
		if ($this->request->is('post')) {
		
			$this->EmailService->create();
			
			if($this->EmailService->save($this->request->data)) {
			
				$template = 'user_message';
				
				if ($this->_sendEmail($this->request->data, $template)) {
				
					$data['EmailService']['name'] = "RIT Global Union";
					$data['EmailService']['recipient'] = $this->request->data['EmailService']['sender'];
					$data['EmailService']['sender'] = "ritglobalunion@gmail.com";
					$data['EmailService']['subject'] = "Thank You for contacting the Global Union";
					$data['EmailService']['message'] = $this->request->data['EmailService']['message'];
					
					$template = 'user_confirmation';

					if ($this->_sendEmail($data, $template)) {
						$this->Session->setFlash(__("Thank you for your message, we will respond as soon as possible.", true));
					} else {
						$this->Session->setFlash(__("Unable to send message, please try again", true));
					}
					
				} else {
					$this->Session->setFlash(__("Unable to send message, please try again", true));
				}
				
			} else {
				$this->Session->setFlash(__('Unable to send message, please verify all fields are correct'));
			}
		
		}
	
		// collect email addresses
		$member_group = $this->MemberGroup->read(null, $member_group_id);
		$group = $this->MemberGroup->Group->read(null, $member_group['Group']['id']);
		
		foreach($group['User'] as $user) {
		
			$recipients[$user['email']] = $user['full_name'];
		
		}
		
		$this->set(compact('recipients', 'member_group_id'));
		$this->set('title_for_page', 'Contact Us');

	}
	
	private function _sendEmail($data, $template='default') {
	
		$email = new CakeEmail();
		$email->from($data['EmailService']['sender']);
		$email->to($data['EmailService']['recipient']);
		$email->subject($data['EmailService']['subject']);
		$email->send($data['EmailService']['message']);
		
		return true;
		
	}

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('mailinglist', 'contact');
	}
}