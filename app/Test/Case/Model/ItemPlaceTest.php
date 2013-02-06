<?php
App::uses('ItemPlace', 'Model');

/**
 * ItemPlace Test Case
 *
 */
class ItemPlaceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.item_place',
		'app.place',
		'app.item'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ItemPlace = ClassRegistry::init('ItemPlace');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ItemPlace);

		parent::tearDown();
	}

}
