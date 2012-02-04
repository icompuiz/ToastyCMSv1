<?php
App::uses('AppModel', 'Model');
/**
 * Member Model
 *
 * @property User $User
 * @property MemberGroup $MemberGroup
 */
class Member extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'avatar' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Members must have an avatar',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'MemberGroup' => array(
			'className' => 'MemberGroup',
			'foreignKey' => 'member_group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		
	);
	
	public $hasOne = array(
		'Profile' => array(
			'className' => 'Profile',
			'foreignKey' => 'member_id'
		)
	);
	
	public function beforeDelete() {
		$this->read(null, $this->id);
	
		$this->User->id = $this->data['User']['id'];
		$this->Profile->id = $this->data['Profile']['id'];
		
		$this->Profile->delete();
		$this->User->delete();
		
		return true;
	}
}
