<?php
App::uses('Place', 'Model');

/**
 * Place Test Case
 *
 */
class PlaceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.place',
		'app.item',
		'app.event',
		'app.user',
		'app.item_event',
		'app.item_place',
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
		$this->Place = ClassRegistry::init('Place');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Place);

		parent::tearDown();
	}

}
