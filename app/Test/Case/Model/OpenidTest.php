<?php
App::uses('Openid', 'Model');

/**
 * Openid Test Case
 *
 */
class OpenidTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.openid',
		'app.user',
		'app.event',
		'app.item',
		'app.item_place',
		'app.place',
		'app.property',
		'app.attribute',
		'app.upload'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Openid = ClassRegistry::init('Openid');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Openid);

		parent::tearDown();
	}

}
