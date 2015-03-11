<?php
App::uses('AppController', 'Controller');
/**
 * TravelDetails Controller
 *
 * @property TravelDetail $TravelDetail
 * @property PaginatorComponent $Paginator
 */
class TravelDetailsController extends AppController {

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
		
		$this->TravelDetail->recursive = 0;
		
		$this->set('travelDetails', $this->Paginator->paginate());
		
		$this->set('agencies', $this->TravelDetail->Bus->Agency->find('all'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TravelDetail->exists($id)) {
			throw new NotFoundException(__('Invalid travel detail'));
		}
		$options = array('conditions' => array('TravelDetail.' . $this->TravelDetail->primaryKey => $id));
		$this->set('travelDetail', $this->TravelDetail->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			
			$this->TravelDetail->FreqDetail->create();
			
			$this->TravelDetail->FreqDetail->save($this->request->data);
			
			$this->request->data['TravelDetail']['freq_detail_id'] = $this->TravelDetail->FreqDetail->getLastInsertID();
			
			$this->TravelDetail->create();
			
			if ($this->TravelDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The travel detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The travel detail could not be saved. Please, try again.'));
			}
		}
		$buses = $this->TravelDetail->Bus->find('list');
		$routes = $this->TravelDetail->Route->find('list');
		$this->set(compact('buses', 'routes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->TravelDetail->exists($id)) {
			throw new NotFoundException(__('Invalid travel detail'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->TravelDetail->FreqDetail->id=$this->request->data['TravelDetail']['freq_detail_id'];
			$this->TravelDetail->FreqDetail->save($this->request->data);
			if ($this->TravelDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The travel detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The travel detail could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TravelDetail.' . $this->TravelDetail->primaryKey => $id));
			$this->request->data = $this->TravelDetail->find('first', $options);
		}
		$buses = $this->TravelDetail->Bus->find('list');
		$routes = $this->TravelDetail->Route->find('list');
		$freqDetails = $this->TravelDetail->FreqDetail->find('all');
		$this->set(compact('buses', 'routes', 'freqDetails'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->TravelDetail->id = $id;
		if (!$this->TravelDetail->exists()) {
			throw new NotFoundException(__('Invalid travel detail'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TravelDetail->delete()) {
			$this->Session->setFlash(__('The travel detail has been deleted.'));
		} else {
			$this->Session->setFlash(__('The travel detail could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
