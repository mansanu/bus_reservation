<?php
App::uses('AppController', 'Controller');
/**
 * OtherFeatures Controller
 *
 * @property OtherFeature $OtherFeature
 * @property PaginatorComponent $Paginator
 */
class OtherFeaturesController extends AppController {

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
		$this->OtherFeature->recursive = 0;
		$this->set('otherFeatures', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OtherFeature->exists($id)) {
			throw new NotFoundException(__('Invalid other feature'));
		}
		$options = array('conditions' => array('OtherFeature.' . $this->OtherFeature->primaryKey => $id));
		$this->set('otherFeature', $this->OtherFeature->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OtherFeature->create();
			if ($this->OtherFeature->save($this->request->data)) {
				$this->Session->setFlash(__('The other feature has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The other feature could not be saved. Please, try again.'));
			}
		}
		$passengerTypes = $this->OtherFeature->PassengerType->find('list');
		//$travelDetails = $this->OtherFeature->TravelDetail->find('list');
		$this->set(compact('passengerTypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->OtherFeature->exists($id)) {
			throw new NotFoundException(__('Invalid other feature'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OtherFeature->save($this->request->data)) {
				$this->Session->setFlash(__('The other feature has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The other feature could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('OtherFeature.' . $this->OtherFeature->primaryKey => $id));
			$this->request->data = $this->OtherFeature->find('first', $options);
		}
		$passengerTypes = $this->OtherFeature->PassengerType->find('list');
		$travelDetails = $this->OtherFeature->TravelDetail->find('list');
		$this->set(compact('passengerTypes', 'travelDetails'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->OtherFeature->id = $id;
		if (!$this->OtherFeature->exists()) {
			throw new NotFoundException(__('Invalid other feature'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->OtherFeature->delete()) {
			$this->Session->setFlash(__('The other feature has been deleted.'));
		} else {
			$this->Session->setFlash(__('The other feature could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
