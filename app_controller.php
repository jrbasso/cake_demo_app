<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app
 */
class AppController extends Controller {

	public $components = array('Session', 'Auth');
	public $uses = array('Account');
	protected $_logged = false;

	public function beforeFilter() {
		$this->_authConfig();

		parent::beforeFilter();
	}

	public function beforeRender() {
		$this->set('logged', $this->_logged);
		if ($this->_logged) {
			$user = $this->Auth->user();
			$this->set('openInvite', $this->Account->invitesToAccept($user['Account']['id']));
		}

		parent::beforeRender();
	}

	protected function _authConfig() {
		$this->Auth->userModel = 'Account';
		$this->Auth->fields = array('username' => 'username', 'password' => 'password');
		$this->Auth->loginAction = array('controller' => 'accounts', 'action' => 'login');
		$this->Auth->loginRedirect = '/';
		$this->Auth->logoutRedirect = $this->Auth->loginRedirect;
		$this->Auth->authorize = 'controller';
		$this->Auth->allow('*');
		$this->_logged = (bool)$this->Auth->user();
	}

	function isAuthorized() {
		return true;
	}

}
