<?php
/* Post Test cases generated on: 2011-01-18 12:01:58 : 1295360578*/
App::import('Model', 'Post');

class PostTestCase extends CakeTestCase {
	public $fixtures = array('app.post', 'app.account', 'app.photo', 'app.photo_comment', 'app.post_comment', 'app.private_message', 'app.friend');

	public function startTest() {
		$this->Post = ClassRegistry::init('Post');
	}

	public function endTest() {
		unset($this->Post);
		ClassRegistry::flush();
	}

}
