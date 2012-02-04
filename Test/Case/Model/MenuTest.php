<?php
/* Menu Test cases generated on: 2011-12-05 00:07:06 : 1323061626*/
App::uses('Menu', 'Model');

/**
 * Menu Test Case
 *
 */
class MenuTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.menu', 'app.content');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Menu = ClassRegistry::init('Menu');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Menu);

		parent::tearDown();
	}

}
