<?php

class ListservService extends AppModel {

	var $useTable = 'Listserv';
	
	var $_schema = array(
		'name'  => array('type' => 'string', 'length' => 255),
		'email'  => array('type' => 'string', 'length' => 255),
	);
	
	var $validate = array(
	  'name' => array(
		 'rule'=>'notempty', 
		 'message'=>'Name is required' ),
	  'email' => array(
		 'rule'=>'email', 
		 'message'=>'Must be a valid email address' )
	);

}