<?php
App::uses('AppController', 'Controller');
/**
 * Passengers Controller
 *
 * @property Passenger $Passenger
 * @property PaginatorComponent $Paginator
 */
class PassengersController extends AppController {

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
		$this->Passenger->recursive = 0;
		$this->set('passengers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Passenger->exists($id)) {
			throw new NotFoundException(__('Invalid passenger'));
		}
		$options = array('conditions' => array('Passenger.' . $this->Passenger->primaryKey => $id));
		$this->set('passenger', $this->Passenger->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Passenger->create();
			if ($this->Passenger->save($this->request->data)) {
				$this->Session->setFlash(__('The passenger has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The passenger could not be saved. Please, try again.'));
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
		if (!$this->Passenger->exists($id)) {
			throw new NotFoundException(__('Invalid passenger'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Passenger->save($this->request->data)) {
				$this->Session->setFlash(__('The passenger has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The passenger could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Passenger.' . $this->Passenger->primaryKey => $id));
			$this->request->data = $this->Passenger->find('first', $options);
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
		$this->Passenger->id = $id;
		if (!$this->Passenger->exists()) {
			throw new NotFoundException(__('Invalid passenger'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Passenger->delete()) {
			$this->Session->setFlash(__('The passenger has been deleted.'));
		} else {
			$this->Session->setFlash(__('The passenger could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
