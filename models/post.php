<?php
class Post extends AppModel {
	public $name = 'Post';
	public $validate = array(
		'message' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	public $belongsTo = array(
		'Account' => array(
			'className' => 'Account',
			'foreignKey' => 'account_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $hasMany = array(
		'PostComment' => array(
			'className' => 'PostComment',
			'foreignKey' => 'post_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => array('PostComment.created' => 'DESC'),
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	public $actsAs = array('Containable');

	public function deletePost($userId, $postId) {
		$this->id = $postId;
		$post = $this->read(array('account_id'), $postId);
		if (empty($post) || $post['Post']['account_id'] != $userId) {
			return false;
		}
		return $this->delete();
	}

	public function addComment($user, $postId, $message) {
		$post = $this->find('first', array('conditions' => array('Post.id' => $postId), 'contain' => array('Account')));
		if (empty($post)) {
			return false;
		}
		if ($post['Account']['username'] !== $user && !$this->Account->isFriend($user, $post['Account']['username'])) {
			return false;
		}
		return $this->PostComment->save(array(
			'post_id' => $postId,
			'commenter_id' => $this->Account->getIdFromUsername($user),
			'comment' => $message
		));
	}
}
