<?php
/* Field Test cases generated on: 2012-01-10 23:14:16 : 1326255256*/
App::uses('Field', 'Model');

/**
 * Field Test Case
 *
 */
class FieldTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.field');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Field = ClassRegistry::init('Field');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Field);

		parent::tearDown();
	}

}
