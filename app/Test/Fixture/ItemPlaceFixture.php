<?php
/**
 * ItemPlaceFixture
 *
 */
class ItemPlaceFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'place_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'item_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'count' => array('type' => 'integer', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'place_id' => 1,
			'item_id' => 1,
			'count' => 1
		),
	);

}
