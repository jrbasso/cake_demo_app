<?php
/* Photo Test cases generated on: 2011-01-18 12:01:02 : 1295360462*/
App::import('Model', 'Photo');

class PhotoTestCase extends CakeTestCase {
	public $fixtures = array('app.photo', 'app.account', 'app.post', 'app.photo_comment', 'app.post_comment', 'app.private_message', 'app.friend');

	public function startTest() {
		$this->Photo = ClassRegistry::init('Photo');
	}

	public function endTest() {
		unset($this->Photo);
		ClassRegistry::flush();
	}

}
