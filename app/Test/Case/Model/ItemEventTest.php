<?php
App::uses('ItemEvent', 'Model');

/**
 * ItemEvent Test Case
 *
 */
class ItemEventTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.item_event',
		'app.item',
		'app.event',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ItemEvent = ClassRegistry::init('ItemEvent');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ItemEvent);

		parent::tearDown();
	}

}
