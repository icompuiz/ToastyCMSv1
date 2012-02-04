<?php
/* SiteLayout Test cases generated on: 2011-12-17 19:47:00 : 1324169220*/
App::uses('SiteLayout', 'Model');

/**
 * SiteLayout Test Case
 *
 */
class SiteLayoutTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.site_layout');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->SiteLayout = ClassRegistry::init('SiteLayout');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SiteLayout);

		parent::tearDown();
	}

}
