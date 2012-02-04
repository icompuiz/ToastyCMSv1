<?php
/* Blog Test cases generated on: 2011-12-04 17:40:39 : 1323038439*/
App::uses('Blog', 'Model');

/**
 * Blog Test Case
 *
 */
class BlogTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.blog', 'app.user', 'app.group');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Blog = ClassRegistry::init('Blog');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Blog);

		parent::tearDown();
	}

}
