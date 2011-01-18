<?php
/* Friend Fixture generated on: 2011-01-18 12:01:59 : 1295360219 */
class FriendFixture extends CakeTestFixture {
	public $name = 'Friend';

	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'request_friend_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'requested_friend_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'accepted' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 4, 'collate' => NULL, 'comment' => ''),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $records = array(
		array(
			'id' => 1,
			'request_friend_id' => 1,
			'requested_friend_id' => 1,
			'accepted' => 1
		),
	);
}
