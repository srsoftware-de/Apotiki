<?php
App::uses('AppController', 'Controller');
/**
 * Properties Controller
 *
 * @property Property $Property
*/
class PropertiesController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this->Property->recursive = 0;
		$this->set('properties', $this->paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this->Property->id = $id;
		if (!$this->Property->exists()) {
			throw new NotFoundException(__('Invalid property'));
		}
		$this->set('property', $this->Property->read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add($itemid =null) {
		if ($this->Property->Attribute->find('count')==0){
			$this->Session->setFlash(__('Please create an attribute first!'));
			$this->redirect(array('controller'=>'attributes','action'=>'add'));
		} else
			if ($this->request->is('post')) {
			$this->Property->create();
			if ($this->Property->save($this->request->data)) {
				$this->Property->read();
				//print_r($this->Property->data); die();
				$this->requestAction(
						array('controller'=>'events','action'=>'add'),
						array('Event'=>array('item_id'=>$this->Property->data['Item']['id'], 'description'=>(__('Added Property').' '.$this->Property->data['Attribute']['name'].'='.$this->Property->data['Property']['value']), 'user_id'=>$this->Auth->user('id'))));
				$this->Session->setFlash(__('The property has been saved'));
				if (isset($itemid)){
					$this->redirect(array('controller'=>'items','action'=>'view',$itemid));
				} else $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The property could not be saved. Please, try again.'));
			}
		}
		$attributes = $this->Property->Attribute->find('list');
		if (isset($itemid)){
			$items=$this->Property->Item->find('list',array('conditions'=>array('id'=>$itemid)));
		} else $items = $this->Property->Item->find('list');
		$this->set(compact('attributes', 'items'));
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this->Property->id = $id;
		if (!$this->Property->exists()) {
			throw new NotFoundException(__('Invalid property'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Property->save($this->request->data)) {
				$this->Session->setFlash(__('The property has been saved'));
				$this->redirect(array('controller'=>'items','action'=>'view',$this->request->data['Property']['item_id']));
			} else {
				$this->Session->setFlash(__('The property could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Property->read(null, $id);
		}
		$attributes = $this->Property->Attribute->find('list');
		$items = $this->Property->Item->find('list');
		$this->set(compact('attributes', 'items'));
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
		$this->Property->id = $id;
		if (!$this->Property->exists()) {
			throw new NotFoundException(__('Invalid property'));
		}
		$this->Property->read();
		//print_r($this->Property->data['Item']); die();
		if ($this->Property->delete()) {
			$this->requestAction(
					array('controller'=>'events','action'=>'add'),
					array('Event'=>array('item_id'=>$this->Property->data['Item']['id'], 'description'=>(__('Deleted Property').' '.$this->Property->data['Attribute']['name'].'='.$this->Property->data['Property']['value']), 'user_id'=>$this->Auth->user('id'))));
				
			$this->Session->setFlash(__('Property deleted'));
			$this->redirect(array('controller'=>'items','action' => 'view',$this->Property->data['Item']['id']));
		}
		$this->Session->setFlash(__('Property was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
