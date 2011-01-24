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
		$this->helpers[] = 'Time';
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
		$canBeMyFriend = !$me && $loggedUser && $this->Account->canBeMyFriend($loggedUser['Account']['username'], $username);
		$this->set(compact('loggedUser', 'user', 'friends', 'photos', 'feeds', 'me', 'canBeMyFriend'));

		$this->helpers[] = 'Time';
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

	public function add_friend($username) {
		if (!$this->_logged) {
			$this->Session->setFlash(__('You are not logged.'));
			$this->redirect($this->request->referer());
		}
		$me = $this->Auth->user();
		if ($me['Account']['username'] === $username) {
			$this->Session->setFlash(__('You cannot add yourself.'));
			$this->redirect($this->request->referer());
		}
		try {
			$this->Account->addFriend($me['Account']['username'], $username);
			$this->Session->setFlash(__('The invite has made. The %s need to approve the friendship.', $username));
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
		}
		$this->redirect(array('action' => 'view', $username));
	}

	public function invitations() {
		if (!$this->_logged) {
			$this->Session->setFlash(__('You are not logged.'));
			$this->redirect($this->request->referer());
		}
		$user = $this->Auth->user();
		$invitations = $this->Account->getInvitations($user['Account']['id']);
		$this->set(compact('invitations'));
	}

	public function invite_response($userId) {
		if (!$this->request->is('post') || !isset($this->data['accept']) || empty($userId)) {
			throw new MethodNotAllowedException();
		}
		if (!$this->_logged) {
			$this->Session->setFlash(__('You are not logged.'));
			$this->redirect('/');
		}
		$accept = $this->data['accept'] == 1;
		$me = $this->Auth->user();
		if ($this->Account->acceptInvitation($me['Account']['id'], $userId, $accept)) {
			if ($accept) {
				$this->Session->setFlash(__('You have a new friend. :)'));
			} else {
				$this->Session->setFlash(__('I also hate that guy...'));
			}
		} else {
			$this->Session->setFlash(__('Ooops, some problem with this invitation. Please, try again.'));
		}
		$this->redirect(array('action' => 'invitations'));
	}

}
