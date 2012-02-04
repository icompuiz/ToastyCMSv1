<?php
App::uses('Controller', 'Controller');
App::uses('ComponentCollection', 'Controller');
App::uses('AclComponent', 'Controller/Component');
App::uses('DbAcl', 'Model');
/**
 * Permissions Controller
 *
 */
class PermissionsController extends AppController {

	public $components = array('Acl');
	public $uses = array('Group');
	
	/**
	 * Root node name.
	 *
	 * @var string
	 **/
	public $rootNode = 'controllers';
	
	public function admin_index() {
	
		$root = $this->_checkNode($this->rootNode, $this->rootNode, null);
		$controllers = $this->_getControllerList();
		$this->_updateControllers($root, $controllers, null, &$berg);

		$plugins = CakePlugin::loaded();
		foreach ($plugins as $plugin) {
			$controllers = $this->_getControllerList($plugin);

			$path = $this->rootNode . '/' . $plugin;
			$pluginRoot = $this->_checkNode($path, $plugin, $root['Aco']['id']);
			$this->_updateControllers($pluginRoot, $controllers, $plugin, &$berg);
		}
		$controllers = $berg;
		$groups = $this->Group->find('all', array('conditions'=>'Group.id != 1'));
		
		if ( !empty($controllers) ) {
			$grouper = $this->Group;
			foreach($groups as $group) {
				$grouper->id = $group['Group']['id'];
				$counter = 0;
				foreach ($controllers as $controller) {
					foreach($controller['actions'] as $action) {
						$check = str_replace("-", "/", $controller['controller']);
						$this->request->data['Permissions']['Groups'][$grouper->id][$controller['controller']][$action] = 
							$this->Acl->check($grouper, $this->rootNode.'/'.$check.'/'.$action);
					}
					$counter++;
				}
			}
			// pr($this->request->data); exit;
			
			$this->set(compact('controllers','groups'));
		} else {
					$this->Session->setFlash("There are no controllers installed");

		}
	}
	
	public function admin_setPermissions() {
	
		if (!empty($this->request->data)) {
			$groups = $this->request->data['Permissions']['Groups'];
			
			$keys = array_keys($groups);
			
			$group = $this->Group;
			
			foreach($keys as $id) {
				$group->id = $id;
				$this->Acl->deny($group, $this->rootNode);
				$controllers = array_keys($groups[$id]);
				foreach($controllers as $controller) {
					$actions = array_keys($groups[$id][$controller]);
					foreach($actions as $action) {
						if ( $groups[$id][$controller][$action] == 1 ) {
							$controller = str_replace("-", "/", $controller);
							$this->Acl->allow($group, $this->rootNode.'/'.$controller.'/'.$action);
						} else {
							$controller = str_replace("-", "/", $controller);
							$this->Acl->deny($group, $this->rootNode.'/'.$controller.'/'.$action);
						}
					}
				}
			}
		}
		$this->Session->setFlash("Permissions Successfully Changed");
		$this->redirect(array('action'=>'index'));
	}
	
	/**
	 * Updates a collection of controllers.
	 *
	 * @param array $root Array or ACO information for root node.
	 * @param array $controllers Array of Controllers
	 * @param string $plugin Name of the plugin you are making controllers for.
	 * @return void
	 */
	private function _updateControllers($root, $controllers, $plugin = null, $controllerActions) {
		$dotPlugin = $pluginPath = $plugin;
		if ($plugin) {
			$dotPlugin .= '.';
			$pluginPath .= '/';
		}
		$appIndex = array_search($plugin . 'AppController', $controllers);
		if ($appIndex !== false) {
			App::uses($plugin . 'AppController', $dotPlugin . 'Controller');
			unset($controllers[$appIndex]);
		}
		$appIndex = array_search($plugin . 'PermissionsController', $controllers);
		if ($appIndex !== false) {
			App::uses($plugin . 'PermissionsController', $dotPlugin . 'Controller');
			unset($controllers[$appIndex]);
		}
		$appIndex = array_search($plugin . 'UsersController', $controllers);
		if ($appIndex !== false) {
			App::uses($plugin . 'UsersController', $dotPlugin . 'Controller');
			unset($controllers[$appIndex]);
		}
		$appIndex = array_search($plugin . 'GroupsController', $controllers);
		if ($appIndex !== false) {
			App::uses($plugin . 'GroupsController', $dotPlugin . 'Controller');
			unset($controllers[$appIndex]);
		}
		$appIndex = array_search($plugin . 'PagesController', $controllers);
		if ($appIndex !== false) {
			App::uses($plugin . 'PagesController', $dotPlugin . 'Controller');
			unset($controllers[$appIndex]);
		}
		$appIndex = array_search($plugin . 'SettingsController', $controllers);
		if ($appIndex !== false) {
			App::uses($plugin . 'SettingsController', $dotPlugin . 'Controller');
			unset($controllers[$appIndex]);
		}
		$appIndex = array_search($plugin . 'LogsController', $controllers);
		if ($appIndex !== false) {
			App::uses($plugin . 'LogsController', $dotPlugin . 'Controller');
			unset($controllers[$appIndex]);
		}
		$appIndex = array_search($plugin . 'ErrorsController', $controllers);
		if ($appIndex !== false) {
			App::uses($plugin . 'ErrorsController', $dotPlugin . 'Controller');
			unset($controllers[$appIndex]);
		}
		// look at each controller
		$counter = 0;
		foreach ($controllers as $controller) {
			App::uses($controller, $dotPlugin . 'Controller');
			$controllerName = preg_replace('/Controller$/', '', $controller);
			$path = $this->rootNode . '/' . $pluginPath . $controllerName;
			$controllerNode = $this->_checkNode($path, $controllerName, $root['Aco']['id']);
			$controllerActions[$counter]['controller'] = str_replace("/", "-", $pluginPath . $controllerName);
			$controllerActions[$counter]['actions'] = $this->_checkMethods($controller, $controllerName, $controllerNode, $pluginPath);
			// if ( $pluginPath )
				// $controllerActions[$counter]['plugin'] = $pluginPath;
			$counter++;
		} 
	}

/**
 * Get a list of controllers in the app and plugins.
 *
 * Returns an array of path => import notation.
 *
 * @param string $plugin Name of plugin to get controllers for
 * @return array
 **/
	function _getControllerList($plugin = null) {
		if (!$plugin) {
			$controllers = App::objects('Controller', null, false);
		} else {
			$controllers = App::objects($plugin . '.Controller', null, false);
		}
		return $controllers;
	}

/**
 * Check a node for existance, create it if it doesn't exist.
 *
 * @param string $path
 * @param string $alias
 * @param int $parentId
 * @return array Aco Node array
 */
	function _checkNode($path, $alias, $parentId = null) {
		$node = $this->Acl->Aco->node($path);
		if (!$node) {
			$this->Acl->Aco->create(array('parent_id' => $parentId, 'model' => null, 'alias' => $alias));
			$node = $this->Acl->Aco->save();
			$node['Aco']['id'] = $this->Acl->Aco->id;
			// $this->out(__('Created Aco node: %s', $path), 1, Shell::VERBOSE);
		} else {
			$node = $node[0];
		}
		return $node;
	}

	/**
	 * Check and Add/delete controller Methods
	 *
	 * @param string $controller
	 * @param array $node
	 * @param string $plugin Name of plugin
	 * @return void
	 */
	function _checkMethods($className, $controllerName, $node, $pluginPath = false) {
		$baseMethods = get_class_methods('Controller');
		$actions = get_class_methods($className);
		$methods = array_diff($actions, $baseMethods);
		foreach ($methods as $action) {
			if (strpos($action, '_', 0) === 0) {
				continue;
			}
			$path = $this->rootNode . '/' . $pluginPath . $controllerName . '/' . $action;
			$this->_checkNode($path, $action, $node['Aco']['id']);
		}

		
		return $methods;
	}
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->layout = 'administrator';
	}
	
	
	
}