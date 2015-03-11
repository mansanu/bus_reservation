<?php
App::uses('AppController', 'Controller');
/**
 * PurchaseDetails Controller
 *
 * @property PurchaseDetail $PurchaseDetail
 * @property PaginatorComponent $Paginator
 */
class PurchaseDetailsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->PurchaseDetail->recursive = 0;
		$this->set('purchaseDetails', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PurchaseDetail->exists($id)) {
			throw new NotFoundException(__('Invalid purchase detail'));
		}
		$options = array('conditions' => array('PurchaseDetail.' . $this->PurchaseDetail->primaryKey => $id));
		$this->set('purchaseDetail', $this->PurchaseDetail->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PurchaseDetail->create();
			if ($this->PurchaseDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The purchase detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The purchase detail could not be saved. Please, try again.'));
			}
		}
		$passengers = $this->PurchaseDetail->Passenger->find('list');
		$this->set(compact('passengers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PurchaseDetail->exists($id)) {
			throw new NotFoundException(__('Invalid purchase detail'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PurchaseDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The purchase detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The purchase detail could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PurchaseDetail.' . $this->PurchaseDetail->primaryKey => $id));
			$this->request->data = $this->PurchaseDetail->find('first', $options);
		}
		$passengers = $this->PurchaseDetail->Passenger->find('list');
		$this->set(compact('passengers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PurchaseDetail->id = $id;
		if (!$this->PurchaseDetail->exists()) {
			throw new NotFoundException(__('Invalid purchase detail'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PurchaseDetail->delete()) {
			$this->Session->setFlash(__('The purchase detail has been deleted.'));
		} else {
			$this->Session->setFlash(__('The purchase detail could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
