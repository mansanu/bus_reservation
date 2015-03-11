<?php
App::uses('AppController', 'Controller');
/**
 * BusTypes Controller
 *
 * @property BusType $BusType
 * @property PaginatorComponent $Paginator
 */
class BusTypesController extends AppController {

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
		$this->BusType->recursive = 0;
		$this->set('busTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->BusType->exists($id)) {
			throw new NotFoundException(__('Invalid bus type'));
		}
		$options = array('conditions' => array('BusType.' . $this->BusType->primaryKey => $id));
		$this->set('busType', $this->BusType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BusType->create();
			if ($this->BusType->save($this->request->data)) {
				$this->Session->setFlash(__('The bus type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bus type could not be saved. Please, try again.'));
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
		if (!$this->BusType->exists($id)) {
			throw new NotFoundException(__('Invalid bus type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->BusType->save($this->request->data)) {
				$this->Session->setFlash(__('The bus type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bus type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('BusType.' . $this->BusType->primaryKey => $id));
			$this->request->data = $this->BusType->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->BusType->id = $id;
		if (!$this->BusType->exists()) {
			throw new NotFoundException(__('Invalid bus type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BusType->delete()) {
			$this->Session->setFlash(__('The bus type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The bus type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
