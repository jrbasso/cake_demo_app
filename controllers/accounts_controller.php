<?php
class AccountsController extends AppController {

	const NUM_FRIENDS = 6;
	const NUM_PHOTOS = 6;
	const NUM_FEEDS = 20;

	public function login() {
		if ($this->_logged) {
			$this->redirect($this->Auth->redirect());
		}
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash(__('Username or password is incorrect'), 'default', array(), 'auth');
			}
		}
	}

	public function logout() {
		$this->redirect($this->Auth->logout());
	}

	public function index() {
		if ($this->_logged) {
			$user = $this->Auth->user();
			$this->redirect(array('action' => 'view', $user['username']));
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
		$me = ($loggedUser && $loggedUser['username'] === $username);
		$canBeMyFriend = !$me && $loggedUser && $this->Account->canBeMyFriend($loggedUser['username'], $username);
		$myFriend = !$me && $loggedUser && $this->Account->isFriend($loggedUser['username'], $username);
		$this->set(compact('loggedUser', 'user', 'friends', 'photos', 'feeds', 'me', 'canBeMyFriend', 'myFriend'));

		$this->helpers[] = 'Time';
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Account->create();
			if ($this->Account->save($this->request->data)) {
				$this->Session->setFlash(__('The account has been created.'));
				$this->Auth->login($this->request->data);
				$this->redirect($this->Auth->loginRedirect);
			} else {
				$this->Session->setFlash(__('The account could not be saved. Please, try again.'));
				$this->request->data['password'] = '';
			}
		}
	}

	public function add_friend($username) {
		if (!$this->_logged) {
			$this->Session->setFlash(__('You are not logged.'));
			$this->redirect($this->request->referer());
		}
		$me = $this->Auth->user();
		if ($me['username'] === $username) {
			$this->Session->setFlash(__('You cannot add yourself.'));
			$this->redirect($this->request->referer());
		}
		try {
			$this->Account->addFriend($me['username'], $username);
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
		$invitations = $this->Account->getInvitations($user['id']);
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
		if ($this->Account->acceptInvitation($me['id'], $userId, $accept)) {
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

	public function delete_post($postId) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		if (empty($postId)) {
			throw new NotFoundException(__('Invalid post.'));
		}
		if (!$this->_logged) {
			$this->Session->setFlash(__('You are not logged.'));
			$this->redirect('/');
		}
		$user = $this->Auth->user();
		if ($this->Account->Post->deletePost($user['id'], $postId)) {
			$this->Session->setFlash(__('Post deleted.'));
		} else {
			$this->Session->setFlash(__('Failed to delete the post.'));
		}
		$this->redirect(array('action' => 'view', $user['username']));
	}

}
