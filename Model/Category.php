<?php
App::uses('AppModel', 'Model');
/**
 * Category Model
 *
 * @property Content $Content
 */
class Category extends AppModel {

	public $restricted = array('navigation', 'footer', 'uncategorized', 'administrator');
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'not_restricted' => array(
				'rule' => array('check_restrictions'),
				'message' => 'Restricted Category'
			)
		),
	);
	
	public function check_restrictions($check) {
		$title = strtolower($check['title']);
		foreach ( $this->restricted as $word ) {
			if ( $title == $word )
				return false;
		}
		return true;
	}

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Content' => array(
			'className' => 'Content',
			'foreignKey' => 'category_id',
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
