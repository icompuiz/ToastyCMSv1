<?php
/* Member Test cases generated on: 2012-01-18 11:22:50 : 1326903770*/
App::uses('Member', 'Model');

/**
 * Member Test Case
 *
 */
class MemberTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.member', 'app.user', 'app.group');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Member = ClassRegistry::init('Member');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Member);

		parent::tearDown();
	}

}
