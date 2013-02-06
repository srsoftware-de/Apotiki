<?php
App::uses('Upload', 'Model');

/**
 * Upload Test Case
 *
 */
class UploadTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.upload',
		'app.item',
		'app.event',
		'app.user',
		'app.item_place',
		'app.place',
		'app.property',
		'app.attribute'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Upload = ClassRegistry::init('Upload');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Upload);

		parent::tearDown();
	}

}
