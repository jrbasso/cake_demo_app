<?php
/* PostComment Test cases generated on: 2011-01-18 12:01:28 : 1295360548*/
App::import('Model', 'PostComment');

class PostCommentTestCase extends CakeTestCase {
	public $fixtures = array('app.post_comment', 'app.post', 'app.account', 'app.photo', 'app.photo_comment', 'app.private_message', 'app.friend');

	public function startTest() {
		$this->PostComment = ClassRegistry::init('PostComment');
	}

	public function endTest() {
		unset($this->PostComment);
		ClassRegistry::flush();
	}

}
