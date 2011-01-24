<?php
class Friend extends AppModel {
	public $name = 'Friend';
	public $validate = array(
		'accepted' => array(
			'boolean' => array(
				'rule' => array('boolean'),
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
		'DoFriend' => array(
			'className' => 'Account',
			'foreignKey' => 'request_friend_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'InvitedFriend' => array(
			'className' => 'Account',
			'foreignKey' => 'requested_friend_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $actsAs = array('Containable');
}
