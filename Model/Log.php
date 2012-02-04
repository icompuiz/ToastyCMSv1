<?php
App::uses('AppModel', 'Model');
/**
 * Log Model
 *
 * @property LogEntry $LogEntry
 */
class Log extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'LogEntry' => array(
			'className' => 'LogEntry',
			'foreignKey' => 'log_id',
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
