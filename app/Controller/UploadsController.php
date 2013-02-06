<?php
App::uses('AppController', 'Controller');
/**
 * Uploads Controller
 *
 * @property Upload $Upload
 */
class UploadsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Upload->recursive = 0;
		$this->set('uploads', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Upload->id = $id;
		if (!$this->Upload->exists()) {
			throw new NotFoundException(__('Invalid upload'));
		}
		$this->set('upload', $this->Upload->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($itemid=null) {
		
		if ($this->request->is('post') && is_uploaded_file($this->request->data['Upload']['File']['tmp_name'])) {
			$status=$this->Upload->query("SHOW TABLE STATUS LIKE 'uploads'");
			$count=$status[0]['TABLES']['Auto_increment'];
			$parts=str_split($count);
			$path="files/";			
			foreach ($parts as $part) $path.=$part.'/';
			@mkdir($path,0777,true);
			$path.='data';
			$this->request->data['Upload']['File']['path']=$path;
			$this->request->data['Upload']['File']['item_id']=$this->request->data['Upload']['item_id'];
			//print_r($this->request->data['Upload']['File']['name']); die();				
			move_uploaded_file($this->request->data['Upload']['File']['tmp_name'], $path);
			$this->Upload->create();
			if ($this->Upload->save($this->request->data['Upload']['File'])) {
				$this->Upload->read();
	//			print_r($this->Upload); die();
				$this->requestAction(
						array('controller'=>'events','action'=>'add'),
						array('Event'=>array('item_id'=>$this->Upload->data['Item']['id'], 'description'=>__('Uploded').' '.$this->Upload->data['Upload']['name'], 'user_id'=>$this->Auth->user('id'))));
				$this->Session->setFlash(__('The upload has been saved'));
				$this->redirect(array('controller'=>'items','action' => 'view',$this->Upload->data['Item']['id']));				
			} else {
				$this->Session->setFlash(__('The upload could not be saved. Please, try again.'));
			}
		}
		if (isset($itemid)){
			$items=$this->Upload->Item->find('list',array('conditions'=>array('id'=>$itemid)));
		} else $items = $this->Upload->Item->find('list');
		$this->set(compact('items'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Upload->id = $id;
		if (!$this->Upload->exists()) {
			throw new NotFoundException(__('Invalid upload'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Upload->save($this->request->data)) {
				$this->Session->setFlash(__('The upload has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The upload could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Upload->read(null, $id);
		}
		$items = $this->Upload->Item->find('list');
		$this->set(compact('items'));
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
		$this->Upload->id = $id;
		if (!$this->Upload->exists()) {
			throw new NotFoundException(__('Invalid upload'));
		}
		$this->Upload->read();
		$name=$this->Upload->data['Upload']['name'];
		$itemid=$this->Upload->data['Item']['id'];
		unlink($this->Upload->data['Upload']['path']);
		if ($this->Upload->delete()) {
			$this->requestAction(
					array('controller'=>'events','action'=>'add'),
					array('Event'=>array('item_id'=>$itemid, 'description'=>__('Deleted').' '.$name, 'user_id'=>$this->Auth->user('id'))));			
			$this->Session->setFlash(__('Upload deleted'));
			$this->redirect(array('controller'=>'items','action' => 'view',$itemid));
		}
		$this->Session->setFlash(__('Upload was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function download($id = null){
		$this->Upload->id = $id;
		if (!$this->Upload->exists()) {
			throw new NotFoundException(__('Invalid upload'));
		}
		$this->Upload->read(null);
		$this->set('upload',$this->Upload->read(null));
	}
}
