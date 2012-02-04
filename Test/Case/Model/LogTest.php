<?php
/* Log Test cases generated on: 2011-12-08 16:36:43 : 1323380203*/
App::uses('Log', 'Model');

/**
 * Log Test Case
 *
 */
class LogTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.log', 'app.log_entry');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Log = ClassRegistry::init('Log');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Log);

		parent::tearDown();
	}

}
