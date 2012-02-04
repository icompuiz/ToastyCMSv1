<?php
/* ProfileLayout Test cases generated on: 2012-01-14 17:19:24 : 1326579564*/
App::uses('ProfileLayout', 'Model');

/**
 * ProfileLayout Test Case
 *
 */
class ProfileLayoutTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.profile_layout');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->ProfileLayout = ClassRegistry::init('ProfileLayout');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProfileLayout);

		parent::tearDown();
	}

}
