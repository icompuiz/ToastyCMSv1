<?php
/* Gallery Test cases generated on: 2011-12-30 14:13:49 : 1325272429*/
App::uses('Gallery', 'Model');

/**
 * Gallery Test Case
 *
 */
class GalleryTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.gallery');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Gallery = ClassRegistry::init('Gallery');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Gallery);

		parent::tearDown();
	}

}
