<?php
App::uses('AppController', 'Controller');
/**
 * OtherFeaturesPassengerTypes Controller
 *
 * @property OtherFeaturesPassengerType $OtherFeaturesPassengerType
 * @property PaginatorComponent $Paginator
 */
class OtherFeaturesPassengerTypesController extends AppController {

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
		$this->OtherFeaturesPassengerType->recursive = 0;
		$this->set('otherFeaturesPassengerTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OtherFeaturesPassengerType->exists($id)) {
			throw new NotFoundException(__('Invalid other features passenger type'));
		}
		$options = array('conditions' => array('OtherFeaturesPassengerType.' . $this->OtherFeaturesPassengerType->primaryKey => $id));
		$this->set('otherFeaturesPassengerType', $this->OtherFeaturesPassengerType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OtherFeaturesPassengerType->create();
			if ($this->OtherFeaturesPassengerType->save($this->request->data)) {
				$this->Session->setFlash(__('The other features passenger type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The other features passenger type could not be saved. Please, try again.'));
			}
		}
		$otherFeatures = $this->OtherFeaturesPassengerType->OtherFeature->find('list');
		$passengerTypes = $this->OtherFeaturesPassengerType->PassengerType->find('list');
		$this->set(compact('otherFeatures', 'passengerTypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->OtherFeaturesPassengerType->exists($id)) {
			throw new NotFoundException(__('Invalid other features passenger type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OtherFeaturesPassengerType->save($this->request->data)) {
				$this->Session->setFlash(__('The other features passenger type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The other features passenger type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('OtherFeaturesPassengerType.' . $this->OtherFeaturesPassengerType->primaryKey => $id));
			$this->request->data = $this->OtherFeaturesPassengerType->find('first', $options);
		}
		$otherFeatures = $this->OtherFeaturesPassengerType->OtherFeature->find('list');
		$passengerTypes = $this->OtherFeaturesPassengerType->PassengerType->find('list');
		$this->set(compact('otherFeatures', 'passengerTypes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->OtherFeaturesPassengerType->id = $id;
		if (!$this->OtherFeaturesPassengerType->exists()) {
			throw new NotFoundException(__('Invalid other features passenger type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->OtherFeaturesPassengerType->delete()) {
			$this->Session->setFlash(__('The other features passenger type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The other features passenger type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
