<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');

/**
 * Email Model
 *
 * @property Group $Group
 */
 
class EmailService extends AppModel {
	var $useTable = false;
	var $_schema = array(
		'name'		    => array('type'=>'string', 'length'=>100), 
		'recipient'		=> array('type'=>'string'), 
		'sender'		=> array('type'=>'string', 'length'=>255), 
		'subject'		=> array('type'=>'string', 'length'=>255), 
		'message'	    => array('type'=>'text')
	);
	var $validate = array(
		'name' => array(
			'rule'=> 'notempty', 
			'message'=>'Name is required' ),
		'sender' => array(
			'rule'=>'email', 
			'message'=>'Must be a valid email address' ),
		'recipient' => array(
			'rule'=> 'email', 
			'message'=> 'You must select a recipient' ),
		'subject' => array(
			'rule'=> 'notempty', 
			'message'=>'Subject is required' ),
		'message' => array(
			'rule'=> 'notempty', 
			'message'=>'Message is required' )
	);
	
	function save($data) {
		$this->set($data);
		if ($this->validates()) {
			return true;
		} else {
			return false;
		}
		
	}

}