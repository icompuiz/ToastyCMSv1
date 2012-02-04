<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');

/**
 * User Model
 *
 * @property Group $Group
 */
class User extends AppModel {
	public $name = 'User';
	public $actsAs = array('Acl' => array('type' => 'requester'));
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Member must have a username',
			),
			'duplicate' => array(
				'rule' => array('duplicate'),
				'message' => 'Username has been already used',
				'last' => true

			)
		),
		'group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'full_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Provide full member name',
				'last' => true
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Email address format: your_email@emailhost.com',
			),
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Email field must not be empty',
			),
			'duplicate' => array(
				'rule' => array('duplicateEmail'),
				'message' => 'Email address has been already used',
				'last' => true
			)
		),
		'password' => array(
			'lengthRule' => array(
				'rule' => array('minlength', 8),
				'message' => 'Member must have a password of at least 8 characters',
			),
		),
		'password_confirmation' => array(
			'matches' => array(
				'rule' => array('matches'),
				'message' => 'Passwords must match',
			),
		),
	);
	public function n($check) {
		return false;
	}
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	/**
	 * Hash passwords before they 
	 * go into the database.  
	 */
	public function beforeSave() {
			
		if (isset($this->data['User']['password']))
			$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);		

        return true;
    }
	
	/**
	 * For Auth and Acl to work properly we need to 
	 * associate our users and groups to rows in the Acl tables. 
	 * In order to do this we will use the AclBehavior. 
	 * The AclBehavior allows for the automagic connection 
	 * of models with the Acl tables. Its use requires an 
	 * implementation of parentNode() on your model. 
	 * In our User model we will add the following: 
	 */
	
	function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['User']['group_id'])) {
            $groupId = $this->data['User']['group_id'];
        } else {
            $groupId = $this->field('group_id');
        }
        if (!$groupId) {
            return null;
        } else {
            return array('Group' => array('id' => $groupId));
        }
    }
	
	/**
	 * We want simplified per-group only 
	 * permissions
	 */
	function bindNode($user) {
		return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
	}
	
	function matches($check) {
	
		// pr($this->data); exit;
		
		if ( empty($this->data['User']['password'] ))
			return false;
	
		$pass = $this->data['User']['password'];
		$match = $this->data['User']['password_confirmation'];
		
		return $pass == $match;
	}
	
	function duplicate($check) {
	
		$check = $this->find('all', array('conditions' => array('User.username' => $check['username'])));
		return empty($check);
		
	}
	
	function duplicateEmail($check) {

		if (isset($this->data['User']['id'])) {
			$data = $this->data;
			$exsistingEmail = $this->read('email', $this->data['User']['id']);
			$exsistingEmail = $exsistingEmail['User']['email'];
			
			$this->data = $data;
			
			if ( $check['email'] == $exsistingEmail )
				return true;
		}
		
		$check = $this->find('all', array('conditions' => array('User.email' => $check['email'])));
			return empty($check);
		
	}
	
	
}
