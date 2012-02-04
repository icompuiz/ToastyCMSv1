<?php
/* MemberGroups Test cases generated on: 2012-01-10 23:13:45 : 1326255225*/
App::uses('MemberGroupsController', 'Controller');

/**
 * TestMemberGroupsController *
 */
class TestMemberGroupsController extends MemberGroupsController {
/**
 * Auto render
 *
 * @var boolean
 */
	public $autoRender = false;

/**
 * Redirect action
 *
 * @param mixed $url
 * @param mixed $status
 * @param boolean $exit
 * @return void
 */
	public function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

/**
 * MemberGroupsController Test Case
 *
 */
class MemberGroupsControllerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.member_group', 'app.group', 'app.user', 'app.content', 'app.category', 'app.variable', 'app.log_entry', 'app.log');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->MemberGroups = new TestMemberGroupsController();
		$this->MemberGroups->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MemberGroups);

		parent::tearDown();
	}

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {

	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {

	}

/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {

	}

/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {

	}

/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {

	}

}
