<?php
App::uses('AppController', 'Controller');
/**
 * ReservationDetails Controller
 *
 * @property ReservationDetail $ReservationDetail
 * @property PaginatorComponent $Paginator
 */
class ReservationDetailsController extends AppController {

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
		$this->ReservationDetail->recursive = 0;
		$this->set('reservationDetails', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ReservationDetail->exists($id)) {
			throw new NotFoundException(__('Invalid reservation detail'));
		}
		$options = array('conditions' => array('ReservationDetail.' . $this->ReservationDetail->primaryKey => $id));
		$this->set('reservationDetail', $this->ReservationDetail->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ReservationDetail->create();
			if ($this->ReservationDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The reservation detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reservation detail could not be saved. Please, try again.'));
			}
		}
		$passengers = $this->ReservationDetail->Passenger->find('list');
		$travelDetails = $this->ReservationDetail->TravelDetail->find('list');
		$purchaseDetails = $this->ReservationDetail->PurchaseDetail->find('list');
		$this->set(compact('passengers', 'travelDetails', 'purchaseDetails'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ReservationDetail->exists($id)) {
			throw new NotFoundException(__('Invalid reservation detail'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ReservationDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The reservation detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reservation detail could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ReservationDetail.' . $this->ReservationDetail->primaryKey => $id));
			$this->request->data = $this->ReservationDetail->find('first', $options);
		}
		$passengers = $this->ReservationDetail->Passenger->find('list');
		$travelDetails = $this->ReservationDetail->TravelDetail->find('list');
		$purchaseDetails = $this->ReservationDetail->PurchaseDetail->find('list');
		$this->set(compact('passengers', 'travelDetails', 'purchaseDetails'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ReservationDetail->id = $id;
		if (!$this->ReservationDetail->exists()) {
			throw new NotFoundException(__('Invalid reservation detail'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ReservationDetail->delete()) {
			$this->Session->setFlash(__('The reservation detail has been deleted.'));
		} else {
			$this->Session->setFlash(__('The reservation detail could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function seats($travel_detail_id,$depature_date) {
		
		$date = explode('-',$depature_date);
		$depature_date = $date[0].'/'.$date[1].'/'.$date[2];
	
		$this->ReservationDetail->recursive = -1;
		$reserved_seats = $this->ReservationDetail->find('list',array(
										'fields' => array('ReservationDetail.seat_no'),
										'conditions'=>array(
											'AND'=>array('ReservationDetail.travel_detail_id'=>$travel_detail_id),
												   array('ReservationDetail.depature_date'=>$depature_date)
												   )));
		$reserved_seats = "'".implode("','",$reserved_seats)."'";
		$this->set('reserved_seats', $reserved_seats);
		
		$this->set('travel_detail_id', $travel_detail_id);
	}
}
