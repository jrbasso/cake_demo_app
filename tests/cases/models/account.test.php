<?php
/* Account Test cases generated on: 2011-01-18 12:01:48 : 1295360028*/
App::import('Model', 'Account');

class AccountTestCase extends CakeTestCase {
	public $fixtures = array('app.account', 'app.photo', 'app.post', 'app.photo_comment', 'app.post_comment', 'app.private_message', 'app.friend');

	public function startTest() {
		$this->Account = ClassRegistry::init('Account');
	}

	public function endTest() {
		unset($this->Account);
		ClassRegistry::flush();
	}

}
