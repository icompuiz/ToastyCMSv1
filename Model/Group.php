<?php
App::uses('AppModel', 'Model');
/**
 * Group Model
 *
 * @property User $User
 */
class Group extends AppModel {
	public $actsAs = array('Acl' => array('type' => 'requester'));

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
        return null;
    }
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
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
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'group_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
