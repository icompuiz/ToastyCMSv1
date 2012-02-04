<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'content', 'action' => 'home'));
	Router::connect('/content/home', array('controller' => 'content', 'action' => 'home'));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	Router::connect('/content/*', array('controller' => 'content', 'action' => 'display'));
	Router::connect('/a/*', array('controller' => 'content', 'action' => 'display'));
	
	
	Router::connect('/manager', array('manager' => true, 'controller' => 'management'));
	Router::connect('/admin', array('admin' => true, 'controller' => 'administration'));
	Router::connect('/user', array('user' => true, 'controller' => 'user_management'));
	
	Router::connect('/management', array('manager' => true, 'controller' => 'management'));
	Router::connect('/administration', array('admin' => true, 'controller' => 'administration'));
	Router::connect('/user_management', array('user' => true, 'controller' => 'user_management'));

	Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
	Router::connect('/logout', array('controller' => 'users', 'action' => 'logout'));

/**
 * Load all plugin routes.  See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
