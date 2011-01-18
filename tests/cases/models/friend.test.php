<?php
/* Friend Test cases generated on: 2011-01-18 12:01:59 : 1295360219*/
App::import('Model', 'Friend');

class FriendTestCase extends CakeTestCase {
	public $fixtures = array('app.friend', 'app.account', 'app.photo', 'app.post', 'app.photo_comment', 'app.post_comment', 'app.private_message');

	public function startTest() {
		$this->Friend = ClassRegistry::init('Friend');
	}

	public function endTest() {
		unset($this->Friend);
		ClassRegistry::flush();
	}

}
