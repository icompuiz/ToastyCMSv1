<?php
/* LogEntry Test cases generated on: 2011-12-08 16:36:50 : 1323380210*/
App::uses('LogEntry', 'Model');

/**
 * LogEntry Test Case
 *
 */
class LogEntryTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.log_entry', 'app.log');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->LogEntry = ClassRegistry::init('LogEntry');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LogEntry);

		parent::tearDown();
	}

}
