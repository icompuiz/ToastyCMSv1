<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 */
class AppController extends Controller {
	public $components = array(
        'Acl', 'Menu',
        'Auth' => array(
            'authorize' => array(
                'Actions' => array('actionPath' => 'controllers'),
            )
        ),
        'Session', 'Lock'
    );
    public $helpers = array('Html', 'Form', 'Session', 'Menu', 'ContentBar', 'Actions');
	public $layout = 'main';
	public $uses = array('Content','Category', 'Variable', 'LogEntry');
	
    public function beforeFilter() {

        //Configure AuthComponent
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
        $this->Auth->loginRedirect = $this->referer();
		
		
		$navigationMenu = $this->Menu->getMenu('navigation', $this->Content);
		$this->set('navigationMenu', $navigationMenu);
		
		$footerMenu = $this->Menu->getMenu('footer', $this->Content);
		$this->set('footerMenu', $footerMenu);
		
		$administrator_menu = $this->Menu->getMenu('administrator', $this->Content);
		$this->set('administrator_menu', $administrator_menu);
		
		$copyright = $this->Menu->getMenu('copyright', $this->Content);
		$this->set('copyright', $copyright);
				
		$array = $this->Variable->find('all');
		foreach ($array as $item) {
			$site_settings[$item['Variable']['key']] = $item['Variable']['value'];
		}
		
		$title_for_page = Inflector::humanize($this->request->params['action']);
		$site_name = $site_settings['site'];
		$this->set(compact('site_name'));
		
		
		
		// check if a user is logged in
		$this->group_id = $this->Session->read('Auth.User.group_id');
		$this->user_id = $this->Session->read('Auth.User.id');
		if ( $this->group_id == 1 ) {
			$this->admin = true;
		} else {
			$this->admin = false;
		}

		$this->session_active = false;
		if ($this->group_id) {
			$this->session_active = true;
		}
		if ( $this->session_active ) {
			if (isset($this->request->params['prefix']) && $this->request->params['prefix'] == 'manager') {
				$this->set('admin_mode', true);
			}
		}
		$this->set('group_id', $this->group_id);
		$this->set('user_id', $this->user_id);
		$this->set('admin', $this->admin);
    }
	
	public function log($message="undocumented", $level="informational", $source=null, $log_name="uncategorized") {
	
		$log = $this->LogEntry->Log->find('first', array('conditions' => array('Log.name' => $log_name)));
		if ( $log ) {
			$this->LogEntry->create();
			$tmp['log_id'] = $log['Log']['id'];
			$tmp['source'] = $source;
			$tmp['message'] = $message;
			$tmp['level'] = $level;
			$data['LogEntry'] = $tmp;
			return $this->LogEntry->save($data);
		}
		return false;
	}
	
	public function isAuthorized($user) {
		if (isset($user['group_id']) && ($user['group_id'] == 1))
			return true;
		return true;
	}
}
