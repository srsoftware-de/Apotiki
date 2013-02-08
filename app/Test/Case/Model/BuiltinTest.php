<?php
App::uses('Builtin', 'Model');

/**
 * Builtin Test Case
 *
 */
class BuiltinTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.builtin',
		'app.item',
		'app.event',
		'app.user',
		'app.item_place',
		'app.place',
		'app.property',
		'app.attribute',
		'app.upload',
		'app.included_item'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Builtin = ClassRegistry::init('Builtin');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Builtin);

		parent::tearDown();
	}

}
