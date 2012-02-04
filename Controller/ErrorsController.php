<?php
class ErrorsController extends AppController {

/**
 * Controller name
 *
 * @var string
 * @access public
 */
	var $name = 'Error';

/**
 * Default helper
 *
 * @var array
 * @access public
 */
	var $helpers = array('Html');

	function fourofour() {
		$this->set('title_for_page', '404 Not Found');
		$this->render('404');
	}
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('*');
	 }
}