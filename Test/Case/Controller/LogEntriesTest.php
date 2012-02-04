<?php
/* LogEntries Test cases generated on: 2011-12-08 16:36:50 : 1323380210*/
App::uses('LogEntries', 'Controller');

/**
 * TestLogEntries *
 */
class TestLogEntries extends LogEntries {
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
 * LogEntries Test Case
 *
 */
class LogEntriesTestCase extends CakeTestCase {
/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->LogEntries = new TestLogEntries();
		$this->->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LogEntries);

		parent::tearDown();
	}

}
