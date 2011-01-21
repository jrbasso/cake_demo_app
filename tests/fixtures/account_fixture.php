<?php
/* Account Fixture generated on: 2011-01-18 12:01:48 : 1295360028 */
class AccountFixture extends CakeTestFixture {
	public $name = 'Account';

	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'username' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'comment' => '', 'charset' => 'utf8'),
		'password' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45, 'collate' => 'utf8_general_ci', 'comment' => '', 'charset' => 'utf8'),
		'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'comment' => '', 'charset' => 'utf8'),
		'email' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_general_ci', 'comment' => '', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'username_UNIQUE' => array('column' => 'username', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $records = array(
		array(
			'id' => 1,
			'username' => 'user1',
			'password' => 'secret',
			'name' => 'User 1',
			'email' => 'user1@example.com',
			'created' => '2011-01-18 12:13:48'
		),
		array(
			'id' => 2,
			'username' => 'user2',
			'password' => 'secret',
			'name' => 'User 2',
			'email' => 'user2@example.com',
			'created' => '2011-01-18 12:13:50'
		),
		array(
			'id' => 3,
			'username' => 'user3',
			'password' => 'secret',
			'name' => 'User 3',
			'email' => 'user3@example.com',
			'created' => '2011-01-18 12:13:50'
		),
		array(
			'id' => 4,
			'username' => 'user4',
			'password' => 'secret',
			'name' => 'User 4',
			'email' => 'user4@example.com',
			'created' => '2011-01-18 12:13:50'
		),
	);
}
