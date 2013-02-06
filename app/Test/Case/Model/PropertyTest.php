<?php
App::uses('Property', 'Model');

/**
 * Property Test Case
 *
 */
class PropertyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.property',
		'app.attribute',
		'app.item',
		'app.item_attribute',
		'app.item_event',
		'app.event',
		'app.user',
		'app.item_place',
		'app.place'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Property = ClassRegistry::init('Property');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Property);

		parent::tearDown();
	}

}
