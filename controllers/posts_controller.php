<?php

class PostsController extends AppController {

	public function add() {
		if (!$this->request->is('post')) {
			$this->redirect('/');
		}
		$user = $this->Auth->user();
		if (empty($user) || $user['Account']['id'] != $this->request->data['Post']['account_id']) {
			$this->Session->setFlash(__('You cannot create a post to another user.'));
			$this->redirect('/');
		}
		$this->Post->create();
		$this->Post->save($this->request->data);
		$this->redirect($this->request->referer());
	}

	public function add_comment() {
		if (!$this->request->is('post')) {
			$this->redirect('/');
		}
		$user = $this->Auth->user();
		if (empty($user)) {
			$this->Session->setFlash(__('Only logged users can comment.'));
			$this->redirect('/');
		}
		$this->request->data['PostComment']['commenter_id'] = $user['Account']['id'];
		if ($this->Post->addComment($user['Account']['username'], $this->request->data['PostComment']['post_id'], $this->request->data['PostComment']['message'])) {
			$this->Session->setFlash(__('Comment added.'));
		} else {
			$this->Session->setFlash(__('Failed to add the comment.'));
		}
		$this->redirect($this->request->referer());
	}

}