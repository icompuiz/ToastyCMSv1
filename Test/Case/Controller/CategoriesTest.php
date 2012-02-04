<?php
/* Categories Test cases generated on: 2011-12-05 00:13:25 : 1323062005*/
App::uses('Categories', 'Controller');

/**
 * TestCategories *
 */
class TestCategories extends Categories {
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
 * Categories Test Case
 *
 */
class CategoriesTestCase extends CakeTestCase {
/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Categories = new TestCategories();
		$this->->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Categories);

		parent::tearDown();
	}

}
