<?php
App::uses('AppController', 'Controller');
/**
 * Openids Controller
 *
 * @property Openid $Openid
 */
class OpenidsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Openid->recursive = 0;
		$this->set('openids', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Openid->id = $id;
		if (!$this->Openid->exists()) {
			throw new NotFoundException(__('Invalid openid'));
		}
		$this->set('openid', $this->Openid->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($userid=null) {
		if ($this->request->is('post')) {
			$identity=rtrim($this->request->data['Openid']['openid'],"/");
			$count=$this->Openid->find('count',array('conditions'=>array('identity'=>$identity)));
			if ($count>0){
				$this->Session->setFlash(__('This openid is already assigned to a user!'));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->request->data['Openid']['identity']=$identity;
				$this->Openid->create();
				if ($this->Openid->save($this->request->data)) {
					$this->Session->setFlash(__('The openid has been saved'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The openid could not be saved. Please, try again.'));
				}
			}
		}
		if ($userid){
			$users = $this->Openid->User->find('list',array('conditions'=>array('User.id'=>$userid)));
		} else $users = $this->Openid->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Openid->id = $id;
		if (!$this->Openid->exists()) {
			throw new NotFoundException(__('Invalid openid'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Openid->save($this->request->data)) {
				$this->Session->setFlash(__('The openid has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The openid could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Openid->read(null, $id);
		}
		$users = $this->Openid->User->find('list');
		$this->set(compact('users'));
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
		$this->Openid->id = $id;
		if (!$this->Openid->exists()) {
			throw new NotFoundException(__('Invalid openid'));
		}
		if ($this->Openid->delete()) {
			$this->Session->setFlash(__('Openid deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Openid was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
