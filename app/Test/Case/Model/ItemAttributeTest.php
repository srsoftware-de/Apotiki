<?php
App::uses('ItemAttribute', 'Model');

/**
 * ItemAttribute Test Case
 *
 */
class ItemAttributeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.item_attribute',
		'app.attribute',
		'app.item'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ItemAttribute = ClassRegistry::init('ItemAttribute');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ItemAttribute);

		parent::tearDown();
	}

}
