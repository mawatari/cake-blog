<?php
/**
 * AuthorFixture
 *
 */
class AuthorFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
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
			'name' => 'uma',
			'created' => '2012-01-01 10:00:00',
			'modified' => '2012-01-01 10:00:00'
		),
		array(
			'id' => 2,
			'name' => 'mawatari',
			'created' => '2012-02-09 10:00:00',
			'modified' => '2012-02-09 10:00:00'
		),
		array(
			'id' => 3,
			'name' => 'naoto',
			'created' => '2012-12-03 10:00:00',
			'modified' => '2012-12-03 10:00:00'
		),
	);

}
