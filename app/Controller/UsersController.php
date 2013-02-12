<?php
App::uses('AppController', 'Controller');


/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {
	public $components = array('Openid');
	public $uses = array();
	
	public function beforeFilter() {
		parent::beforeFilter();
		if ($this->User->find('count')==0) {
			$this->Auth->allow('add');
			if ($this->action=='add'){
				$this->Session->setFlash(__('Please add a first user!'));
			} else { 			
				$this->redirect(array('action'=>'add'));
			}
		}
		$this->Auth->allow('openidlogin');
		
	}
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if ($id==null) $id=$this->Auth->user('id');
		$this->User->recursive=2;
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->find('count')==0) {
				$this->request->data['User']['user_id']=1;
			} else $this->request->data['User']['user_id'] = $this->Auth->user('id');
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$supervisors = $this->User->Supervisor->find('list');
		$this->set(compact('supervisors'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
		$supervisors = $this->User->Supervisor->find('list');
		$this->set(compact('supervisors'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	private function setMessage($message) {
		$this->set('message', $message);
	}
	
	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash(__('Invalid username or password, try again'));
			}
		}
	}
	
	public function openidlogin() {
		$realm = 'http://' . $_SERVER['HTTP_HOST'];
        $returnTo = $realm . $_SERVER['REQUEST_URI'] ;
        //die ($returnTo);
        if ($this->request->isPost() && !$this->Openid->isOpenIDResponse()) {
            try {
                $this->Openid->authenticate($this->data['OpenidUrl']['openid'], $returnTo, $realm);
            } catch (InvalidArgumentException $e) {
                $this->set('error', 'Invalid OpenID');
            } catch (Exception $e) {
                $this->set('error', $e->getMessage());
            }
        } elseif ($this->Openid->isOpenIDResponse()) {
            $response = $this->Openid->getResponse($returnTo);

            if ($response->status == Auth_OpenID_CANCEL) {
                $this->set('error', 'Verification cancelled');
            } elseif ($response->status == Auth_OpenID_FAILURE) {
                $this->set('error', 'OpenID verification failed: '.$response->message);
            } elseif ($response->status == Auth_OpenID_SUCCESS) {
            	$identity=$response->endpoint->claimed_id;
            	print($identity);
            	$identity=$this->User->Openid->read(null,$identity);
            	if (isset($identity['User'])){
            		$this->Auth->login($identity['User']);
            		$this->redirect(array('controller'=>'items','action'=>'index'));
            	} else {
            		$this->set('error', 'OpenID verification successfull, but openid not assigned to any user!');
            	}
            }
        }
	}
	
	public function logout() {
		$this->redirect($this->Auth->logout());
	}
}
