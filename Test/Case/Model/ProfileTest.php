<?php
/* Profile Test cases generated on: 2012-01-10 23:14:03 : 1326255243*/
App::uses('Profile', 'Model');

/**
 * Profile Test Case
 *
 */
class ProfileTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.profile', 'app.user', 'app.group');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Profile = ClassRegistry::init('Profile');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Profile);

		parent::tearDown();
	}

}
