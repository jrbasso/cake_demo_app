<?php
/* Account Test cases generated on: 2011-01-18 12:01:48 : 1295360028*/
App::import('Model', 'Account');

class AccountTest extends Account {

	var $alias = 'Account';
	var $useTable = 'accounts';

	public function getFriendIds($username, $limit = 0, $rand = true) {
		return $this->_getFriendIds($username, $limit, $rand);
	}

}

class AccountTestCase extends CakeTestCase {
	public $fixtures = array('app.account', 'app.photo', 'app.post', 'app.photo_comment', 'app.post_comment', 'app.private_message', 'app.friend');

	public function setUp() {
		parent::setUp();
		$this->Account = ClassRegistry::init('AccountTest');
	}

	public function tearDown() {
		unset($this->Account);
		ClassRegistry::flush();
		parent::tearDown();
	}

	public function testGetIdFromUsername() {
		$this->assertEqual($this->Account->getIdFromUsername('user1'), 1);
		$this->assertEqual($this->Account->getIdFromUsername('user2'), 2);
		$this->assertEqual($this->Account->getIdFromUsername('invalid_user'), false);
	}

	public function testGetFriendIds() {
		$allFriends = $this->Account->getFriendIds('user1');
		sort($allFriends);
		$this->assertEqual($allFriends, array(2, 3));

		$this->assertTrue(in_array(1, $this->Account->getFriendIds('user2')));
	}

	public function testGetRandomFriends() {
		$allFriends = $this->Account->getFriendIds('user1');
		$result = $this->Account->getRandomFriends('user1', 1);
		$this->assertTrue($result[0]['Account']['username'] === 'user2' || $result[0]['Account']['username'] === 'user3');
	}

	public function testGetRandomPhotos() {
	}

	public function testGetLastFeeds() {
		$result = $this->Account->getLastFeeds('user1', 2);
		$this->assertEqual(count($result), 2);

		$expected = array(
			'id' => 3,
			'account_id' => 3,
			'created' => '2011-01-18 12:24:58',
			'message' => 'Lorem ipsum.'
		);
		$this->assertEqual($result[0]['Post'], $expected);
	}

}
