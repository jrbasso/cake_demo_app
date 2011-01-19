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

	public function beforeFilter() {
		$this->_authConfig();

		parent::beforeFilter();
	}

	protected function _authConfig() {
		$this->Auth->userModel = 'Account';
		$this->Auth->fields = array('username' => 'username', 'password' => 'password');
		$this->Auth->loginAction = array('controller' => 'accounts', 'action' => 'login');
		$this->Auth->loginRedirect = '/';
		$this->Auth->logoutRedirect = $this->Auth->loginAction;
		$this->Auth->authorize = 'controller';
		$this->Auth->allow('*');
	}

	function isAuthorized() {
		return true;
	}

}
