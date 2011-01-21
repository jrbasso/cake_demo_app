<?php
/* Post Fixture generated on: 2011-01-18 12:01:58 : 1295360578 */
class PostFixture extends CakeTestFixture {
	public $name = 'Post';

	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'account_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'message' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'comment' => '', 'charset' => 'utf8'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $records = array(
		array(
			'id' => 1,
			'account_id' => 1,
			'created' => '2011-01-18 12:22:58',
			'message' => 'Lorem ipsum.'
		),
		array(
			'id' => 2,
			'account_id' => 2,
			'created' => '2011-01-18 12:23:58',
			'message' => 'Lorem ipsum.'
		),
		array(
			'id' => 3,
			'account_id' => 3,
			'created' => '2011-01-18 12:24:58',
			'message' => 'Lorem ipsum.'
		),
		array(
			'id' => 4,
			'account_id' => 4,
			'created' => '2011-01-18 12:25:58',
			'message' => 'Lorem ipsum.'
		),
	);
}
