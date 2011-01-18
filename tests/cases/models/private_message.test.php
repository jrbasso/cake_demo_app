<?php
/* PrivateMessage Test cases generated on: 2011-01-18 12:01:25 : 1295360725*/
App::import('Model', 'PrivateMessage');

class PrivateMessageTestCase extends CakeTestCase {
	public $fixtures = array('app.private_message', 'app.account', 'app.photo', 'app.photo_comment', 'app.post', 'app.post_comment', 'app.friend');

	public function startTest() {
		$this->PrivateMessage = ClassRegistry::init('PrivateMessage');
	}

	public function endTest() {
		unset($this->PrivateMessage);
		ClassRegistry::flush();
	}

}
