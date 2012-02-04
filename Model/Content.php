<?php
App::uses('AppModel', 'Model');
/**
 * Content Model
 *
 * @property Category $Category
 */
class Content extends AppModel {
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
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	function GetCrumbs($id) {
			$retVal = false;
			$Content = $this->read(array('alias','title','parent'), $id);
			if ( !empty($Content) ) 
			{
				$crumbs[] = array('title'=> $Content['Content']['title'], 'alias'=>$Content['Content']['alias']);
				
				while( '' != $Content['Content']['parent'] ) 
				{
					$Content = $this->read(array('alias','title','parent'), $Content['Content']['parent']);
					$crumbs[] = array('title'=> $Content['Content']['title'], 'alias'=>$Content['Content']['alias']);
				
				}
				unset($crumbs[0]['alias']);
				$retVal = array_reverse($crumbs);
			}
			
		return $retVal;
	}
}
