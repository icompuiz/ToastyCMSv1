<?php
/* MemberGroup Test cases generated on: 2012-01-14 19:52:19 : 1326588739*/
App::uses('MemberGroup', 'Model');

/**
 * MemberGroup Test Case
 *
 */
class MemberGroupTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.member_group', 'app.profile_layout', 'app.group', 'app.user');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->MemberGroup = ClassRegistry::init('MemberGroup');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MemberGroup);

		parent::tearDown();
	}

}
