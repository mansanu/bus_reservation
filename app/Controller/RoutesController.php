<?php
App::uses('AppController', 'Controller');
/**
 * Routes Controller
 *
 * @property Route $Route
 * @property PaginatorComponent $Paginator
 */
class RoutesController extends AppController {

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
		$this->Route->recursive = 0;
		$this->set('routes', $this->Paginator->paginate());
		
		$this->loadModel('City');
		$this->set('cities',$this->City->find('all'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Route->exists($id)) {
			throw new NotFoundException(__('Invalid route'));
		}
		$options = array('conditions' => array('Route.' . $this->Route->primaryKey => $id));
		$this->set('route', $this->Route->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Route->create();
			if ($this->Route->save($this->request->data)) {
				$this->Session->setFlash(__('The route has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The route could not be saved. Please, try again.'));
			}
		}
		$this->loadModel('City');
		$this->set('cities',$this->City->find('list'));
		
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Route->exists($id)) {
			throw new NotFoundException(__('Invalid route'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Route->save($this->request->data)) {
				$this->Session->setFlash(__('The route has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The route could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Route.' . $this->Route->primaryKey => $id));
			$this->request->data = $this->Route->find('first', $options);
			
			$this->loadModel('City');
			$this->set('cities',$this->City->find('list'));
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
		$this->Route->id = $id;
		if (!$this->Route->exists()) {
			throw new NotFoundException(__('Invalid route'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Route->delete()) {
			$this->Session->setFlash(__('The route has been deleted.'));
		} else {
			$this->Session->setFlash(__('The route could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function search()
	{	
		//route check 
		$routes = $this->Route->find('first',array(
										'conditions'=>array(
											'AND'=>array('Route.from_city'=>$this->request->data['Route']['from_city']),
												   array('Route.to_city'=>$this->request->data['Route']['to_city'])
											)
										));
		
		//travel detail and freq_details
		$this->Route->TravelDetail->recursive = 2;
		
		$check_freq=array();
		foreach($routes['TravelDetail'] as $travel_detail){
			
			$this->Route->TravelDetail->Bus->unbindModel( array('hasMany' => array('TravelDetail')) );
			$this->Route->TravelDetail->Route->unbindModel( array('hasMany' => array('TravelDetail')) );
			$this->Route->TravelDetail->FreqDetail->unbindModel( array('hasMany' => array('TravelDetail')) );
		
			$check_freq[] = $this->Route->TravelDetail->find('first',array(
										'conditions'=>array(
											'AND'=>array('FreqDetail.id'=>$travel_detail['freq_detail_id']),
												   array('FreqDetail.'.$this->request->data['Route']['weekday']=>1)
											)
										));
			
		}
		$freq_details=array();
		
		$freq_details = array_filter(array_map('array_filter', $check_freq));//filter empty array
		
		$this->set('freq_details',$freq_details);
		
		$this->loadModel('City');
		$this->set('cities',$this->City->find('all'));
	}
}
