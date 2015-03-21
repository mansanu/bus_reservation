<?php
App::uses('AppController', 'Controller');
/**
 * PassengerTypes Controller
 *
 * @property PassengerType $PassengerType
 * @property PaginatorComponent $Paginator
 */
class PassengerTypesController extends AppController {

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
		$this->PassengerType->recursive = 0;
		$this->set('passengerTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PassengerType->exists($id)) {
			throw new NotFoundException(__('Invalid passenger type'));
		}
		$options = array('conditions' => array('PassengerType.' . $this->PassengerType->primaryKey => $id));
		$this->set('passengerType', $this->PassengerType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PassengerType->create();
			if ($this->PassengerType->save($this->request->data)) {
				$this->Session->setFlash(__('The passenger type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The passenger type could not be saved. Please, try again.'));
			}
		}
		//$otherFeatures = $this->PassengerType->OtherFeature->find('list');
		//$this->set(compact('otherFeatures'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PassengerType->exists($id)) {
			throw new NotFoundException(__('Invalid passenger type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PassengerType->save($this->request->data)) {
				$this->Session->setFlash(__('The passenger type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The passenger type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PassengerType.' . $this->PassengerType->primaryKey => $id));
			$this->request->data = $this->PassengerType->find('first', $options);
		}
		$otherFeatures = $this->PassengerType->OtherFeature->find('list');
		$this->set(compact('otherFeatures'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PassengerType->id = $id;
		if (!$this->PassengerType->exists()) {
			throw new NotFoundException(__('Invalid passenger type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PassengerType->delete()) {
			$this->Session->setFlash(__('The passenger type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The passenger type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
