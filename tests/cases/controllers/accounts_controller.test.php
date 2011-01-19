<?php
/* Accounts Test cases generated on: 2011-01-18 13:01:38 : 1295363618*/
App::import('Controller', 'Accounts');

class TestAccountsController extends AccountsController {
	public $autoRender = false;

	public function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class AccountsControllerTestCase extends CakeTestCase {
	public $fixtures = array('app.account', 'app.photo', 'app.photo_comment', 'app.post', 'app.post_comment', 'app.private_message', 'app.friend');

	public function startTest() {
		$this->Accounts = new TestAccountsController();
		$this->Accounts->constructClasses();
	}

	public function endTest() {
		unset($this->Accounts);
		ClassRegistry::flush();
	}

	public function testIndex() {

	}

	public function testView() {

	}

	public function testAdd() {

	}

	public function testEdit() {

	}

	public function testDelete() {

	}

}
