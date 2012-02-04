<?php
/* Content Test cases generated on: 2011-12-04 22:31:04 : 1323055864*/
App::uses('Content', 'Model');

/**
 * Content Test Case
 *
 */
class ContentTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.content');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Content = ClassRegistry::init('Content');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Content);

		parent::tearDown();
	}

}
