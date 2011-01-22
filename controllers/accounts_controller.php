<?php
class AccountsController extends AppController {

	const NUM_FRIENDS = 6;
	const NUM_PHOTOS = 6;
	const NUM_FEEDS = 20;

	public function login() {
		if ($this->request->is('post')) {
			$this->Auth->login();
		}
	}

	public function logout() {
		$this->redirect($this->Auth->logout());
	}

	public function index() {
		if ($this->_logged) {
			$user = $this->Auth->user();
			$this->redirect(array('action' => 'view', $user['Account']['username']));
		}
	}

	public function all() {
		$this->Account->recursive = 0;
		$this->set('accounts', $this->paginate());
	}

	public function view($username = null) {
		$user = $this->Account->getUser($username);
		if (empty($user)) {
			$this->response->statusCode(404);
			$this->set(compact('username'));
			$this->render('user_not_found');
			return;
		}
		$loggedUser = false;
		if ($this->_logged) {
			$loggedUser = $this->Auth->user();
		}
		$friends = $this->Account->getRandomFriends($username, self::NUM_FRIENDS);
		$photos = $this->Account->getRandomPhotos($username, self::NUM_PHOTOS);
		$feeds = $this->Account->getLastFeeds($username, self::NUM_FEEDS);
		$me = ($loggedUser && $loggedUser['Account']['username'] === $username);
		$this->set(compact('loggedUser', 'user', 'friends', 'photos', 'feeds', 'me'));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Account->create();
			if ($this->Account->save($this->request->data)) {
				$this->Session->setFlash(__('The account has been created.'));
				$this->Auth->login();
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The account could not be saved. Please, try again.'));
			}
		}
	}

}
