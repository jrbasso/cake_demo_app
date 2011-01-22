<?php

class PostsController extends AppController {

	public function add() {
		if (!$this->request->is('post')) {
			$this->redirect('/');
		}
		$this->Post->create();
		$this->Post->save($this->request->data);
		$this->redirect($this->request->referer());
	}

}