<?php
/* PhotoComment Test cases generated on: 2011-01-18 12:01:19 : 1295360299*/
App::import('Model', 'PhotoComment');

class PhotoCommentTestCase extends CakeTestCase {
	public $fixtures = array('app.photo_comment', 'app.photo', 'app.account', 'app.post', 'app.post_comment', 'app.private_message', 'app.friend');

	public function startTest() {
		$this->PhotoComment = ClassRegistry::init('PhotoComment');
	}

	public function endTest() {
		unset($this->PhotoComment);
		ClassRegistry::flush();
	}

}
