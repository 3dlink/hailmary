<?php
/**
 * PassFixture
 *
 */
class PassFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'start' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'end' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'top' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'old_price' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'new_price' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'active' => array('type' => 'integer', 'null' => true, 'default' => '1', 'length' => 4, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'start' => '2016-04-03 06:25:37',
			'end' => '2016-04-03 06:25:37',
			'top' => 1,
			'old_price' => 1,
			'new_price' => 1,
			'active' => 1,
			'created' => '2016-04-03 06:25:37',
			'modified' => '2016-04-03 06:25:37'
		),
	);

}
