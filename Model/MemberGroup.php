<?php
App::uses('AppModel', 'Model');
/**
 * MemberGroup Model
 *
 * @property ProfileLayout $ProfileLayout
 * @property Group $Group
 */
class MemberGroup extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';
	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				// 'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'profile_layout_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */	
	public $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id'
		),
		'ProfileLayout' => array(
			'className' => 'ProfileLayout',
			'foreignKey' => 'profile_layout_id'
		),
	);
	
	public $hasMany = array(
		'Member' => array(
			'className' => 'Member',
			'foreignKey' => 'member_group_id'
		),
	);
	
	public function getFields($id) {
	
		$plid = $this->read('profile_layout_id', $id);
		$plid = $plid['MemberGroup']['profile_layout_id'];
		return $this->ProfileLayout->readFields($plid);
	
	}
}
