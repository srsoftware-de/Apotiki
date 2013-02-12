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
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
*/
class AppController extends Controller {
	//...

	public $components = array(
			'Session',
			'Auth' => array(
					'loginRedirect' => array('controller' => 'items', 'action' => 'index'),
					'logoutRedirect' => array('controller' => 'items', 'action' => 'index', 'home'),
					'authorize' => array('Controller') // Added this line
			)
	);
	
	public function beforeFilter()	{
		$navi = array(
				'top'=>array(
						__('Logout')=>array('controller'=>'users','action'=>'logout'),
						__('Profile')=>array('controller'=>'users','action'=>'view')
				),
				'new'=>array(
						__('New Item')=>array('controller' => 'items', 'action' => 'add'),
						__('New Item Place')=>array('controller' => 'item_places', 'action' => 'add'),
						__('New Property')=>array('controller' => 'properties', 'action' => 'add'),
						__('New User')=>array('controller' => 'users', 'action' => 'add')
				),
				'lists'=>array(
						__('List Items')=>array('controller' => 'items', 'action' => 'index'),
						__('List Events')=>array('controller' => 'events', 'action' => 'index'),
						__('List Places')=>array('controller' => 'places', 'action' => 'index'),
						__('List Properties')=>array('controller' => 'properties', 'action' => 'index'),
						__('List Users')=>array('controller' => 'users', 'action' => 'index')));
		$this->set('navi', $navi);
	}
	
	public function isAuthorized($user) {
		// users are allowed...
		if (isset($user['username'])){
			return true;
		}
	
		// Default deny
		return false;
	}
}
