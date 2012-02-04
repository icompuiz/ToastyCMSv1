<?php
/* Layout Test cases generated on: 2011-12-17 19:02:06 : 1324166526*/
App::uses('Layout', 'Model');

/**
 * Layout Test Case
 *
 */
class LayoutTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.layout', 'app.theme', 'app.media_file');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Layout = ClassRegistry::init('Layout');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Layout);

		parent::tearDown();
	}

}
