<?php
class Account extends AppModel {
	public $name = 'Account';
	public $displayField = 'name';
	public $validate = array(
		'username' => array(
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'unique' => array(
				'rule' => array('isUnique'),
				'message' => 'This username already exist.',
				'on' => 'create'
			)
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'The name cannot be empty.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Please, input a valid e-mail.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	public $hasMany = array(
		'Photo' => array(
			'className' => 'Photo',
			'foreignKey' => 'account_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'account_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'PhotoComment' => array(
			'className' => 'PhotoComment',
			'foreignKey' => 'commenter_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'PostComment' => array(
			'className' => 'PostComment',
			'foreignKey' => 'commenter_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'SendPrivateMessage' => array(
			'className' => 'PrivateMessage',
			'foreignKey' => 'sender_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'ReceivePrivateMessage' => array(
			'className' => 'PrivateMessage',
			'foreignKey' => 'destination_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'DoFriend' => array(
			'className' => 'Friend',
			'foreignKey' => 'request_friend_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'InvitedFriend' => array(
			'className' => 'Friend',
			'foreignKey' => 'requested_friend_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	public function getIdFromUsername($username) {
		static $users = array();
		if (isset($users[$username])) {
			return $users[$username];
		}
		return $users[$username] = $this->field('id', compact('username'));
	}

	public function getUser($username, $associations = false) {
		$userId = $this->getIdFromUsername($username);
		if (empty($userId)) {
			return array();
		}
		return $this->find('first', array(
			'conditions' => array('Account.id' => $userId),
			'recursive' => $associations ? 0 : -1
		));
	}

	public function addFriend($userRequest, $userRequested) {
		$requestId = $this->getIdFromUsername($userRequest);
		$requestedId = $this->getIdFromUsername($userRequested);
		if (empty($requestId) || empty($requestedId)) {
			throw new Exception(__('The friendship can not be established. Please, try again.'));
		}
		$exists = $this->DoFriend->find('first', array(
			'conditions' => array(
				'OR' => array(
					array(
						'request_friend_id' => $requestId,
						'requested_friend_id' => $requestedId
					),
					array(
						'request_friend_id' => $requestedId,
						'requested_friend_id' => $requestId
					)
				)
			),
			'recursive' => -1
		));
		if (!empty($exists)) {
			if ($exists['DoFriend']['accepted']) {
				throw new Exception(__('You are already friend with %s.', $userRequested));
			} else {
				throw new Exception(__('You are already invited %s.', $userRequested));
			}
		}
		$this->DoFriend->create();
		$success = $this->DoFriend->save(array(
			'request_friend_id' => $requestId,
			'requested_friend_id' => $requestedId,
			'accepted' => 0
		));
		if (!$success) {
			throw new Exception(__('The friendship can not be established. Please, try again.'));
		}
	}

	public function invitesToAccept($userId) {
		return $this->InvitedFriend->find('count', array(
			'conditions' => array(
				'InvitedFriend.requested_friend_id' => $userId,
				'InvitedFriend.accepted' => 0
			),
			'recursive' => -1
		));
	}

	public function getInvitations($userId) {
		return $this->InvitedFriend->find('all', array(
			'conditions' => array(
				'InvitedFriend.requested_friend_id' => $userId,
				'InvitedFriend.accepted' => 0
			),
			'contain' => array(
				'DoFriend'
			)
		));
	}

	public function acceptInvitation($invitedId, $inviterId, $accepted) {
		$this->DoFriend->id = $this->DoFriend->field('id', array('request_friend_id' => $inviterId, 'requested_friend_id' => $invitedId));
		if (empty($this->DoFriend->id)) {
			return false;
		}
		return (bool)$this->DoFriend->saveField('accepted', $accepted ? 1 : 2);
	}

	public function canBeMyFriend($me, $other) {
		$requestId = $this->getIdFromUsername($me);
		$requestedId = $this->getIdFromUsername($other);
		$result = $this->DoFriend->find('count', array(
			'conditions' => array(
				'OR' => array(
					array(
						'request_friend_id' => $requestId,
						'requested_friend_id' => $requestedId
					),
					array(
						'request_friend_id' => $requestedId,
						'requested_friend_id' => $requestId
					)
				)
			),
			'recursive' => -1
		));
		return $result === 0;
	}

	public function isFriend($me, $friend) {
		return in_array($this->getIdFromUsername($friend), $this->_getFriendIds($me));
	}

	public function getRandomFriends($username, $quantity) {
		$friends = $this->_getFriendIds($username, $quantity, true);
		if (empty($friends)) {
			return array();
		}
		return $this->find('all', array(
			'conditions' => array(
				'Account.id' => $friends
			),
			'recursive' => -1
		));
	}

	public function getRandomPhotos($username, $quantity) {
		return $this->Photo->find('all', array(
			'conditions' => array('Account.username' => $username),
			'order' => 'RAND()',
			'limit' => $quantity
		));
	}

	public function getLastFeeds($username, $quantity) {
		$accounts = $this->_getFriendIds($username);
		$accounts[] = $this->getIdFromUsername($username);
		return $this->Post->find('all', array(
			'conditions' => array('Post.account_id' => $accounts),
			'order' => array('Post.created' => 'DESC'),
			'limit' => $quantity > 0 ? $quantity : null,
			'contain' => array('Account', 'PostComment', 'PostComment.Commenter')
		));
	}

	protected function _getFriendIds($username, $limit = 0, $rand = true) {
		static $friends = array();
		if (isset($friends[$username])) {
			if ($limit > 0) {
				if ($rand) {
					shuffle($friends[$username]);
				}
				return array_slice($friends[$username], 0, $limit);
			}
			return $friends[$username];
		}
		$accountId = $this->getIdFromUsername($username);
		$data = $this->DoFriend->find('all', array(
			'fields' => array('DoFriend.request_friend_id', 'DoFriend.requested_friend_id'),
			'conditions' => array(
				'DoFriend.accepted' => 1,
				'OR' => array(
					'DoFriend.request_friend_id' => $accountId,
					'DoFriend.requested_friend_id' => $accountId
				)
			),
			'recursive' => -1
		));
		if (empty($data)) {
			return array();
		}
		$friends = array_merge(Set::classicExtract($data, '{n}.DoFriend.request_friend_id'), Set::classicExtract($data, '{n}.DoFriend.requested_friend_id'));
		return array_diff($friends, array($accountId));
	}

}
