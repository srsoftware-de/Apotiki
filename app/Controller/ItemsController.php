<?php
App::uses('AppController', 'Controller');
/**
 * Items Controller
 *
 * @property Item $Item
 */
class ItemsController extends AppController {

	public $helpers = array('QrCode');
	
	public $paginate = array(
			'limit' => 10,
			'conditions' => array('NOT erased')
			);
/**
 * index method
 *
 * @return void
 */
	public function index() {
		if ($this->Item->Event->User->find('count')==0) $this->redirect(array('controller'=>'users','action'=>'add'));
		$this->Item->recursive = 0;
		$this->set('items', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Item->id = $id;
		if (!$this->Item->exists()) {
			throw new NotFoundException(__('Invalid item'));
		}
		$this->Item->recursive=2;
		$this->set('item', $this->Item->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->Item->ItemPlace->Place->find('count')==0){
			$this->Session->setFlash(__('Please create a place first!'));
			$this->redirect(array('controller'=>'places','action'=>'add'));
		} else	if ($this->request->is('post')) {
			$this->Item->create();
			if ($this->Item->save($this->request->data)) {
				$this->requestAction(
						array('controller'=>'events','action'=>'add'),
						array('Event'=>array('item_id'=>$this->Item->id, 'description'=>__('Created Object'), 'user_id'=>$this->Auth->user('id'))));
				$this->Session->setFlash(__('The item has been saved'));
				$this->redirect(array('controller'=>'item_places','action' => 'add'));
			} else {
				$this->Session->setFlash(__('The item could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Item->id = $id;
		if (!$this->Item->exists()) {
			throw new NotFoundException(__('Invalid item'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Item->save($this->request->data)) {
				$this->Session->setFlash(__('The item has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The item could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Item->read(null, $id);
		}
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
		$this->Item->id = $id;
		if (!$this->Item->exists()) {
			throw new NotFoundException(__('Invalid item'));
		}
		$this->Item->read(null,$id);
		$this->Item->data['Item']['erased']=1;
		if ($this->Item->save()) {
				$this->requestAction(
						array('controller'=>'events','action'=>'add'),
						array('Event'=>array('item_id'=>$this->Item->id, 'description'=>__('Deleted Object'), 'user_id'=>$this->Auth->user('id'))));
							
			$this->Session->setFlash(__('Item deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Item was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function label($id=null){
		if (!isset($id)){
			throw new MethodNotAllowedException();
		}
		$item=$this->Item->read(null,$id);
		$dir='files/tmp';
		$item['qrcodefile']=$dir.'/code_'.rand(0,1000000).'.png';
		@mkdir($dir,0777,true);
		$this->set('item',$item);
	}
}
