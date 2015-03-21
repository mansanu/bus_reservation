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
	public $components = array('Paginator','Wizard.Wizard');
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->Wizard->steps = array('seats', 'passenger','review');
		$this->Wizard->action = 'reservation';
}

	function reservation($step = null) {

		$this->Wizard->process($step);
	}
	
	public function register($travel_detail_id,$depature_date) ///register travel_detail_id/depature_date and redirect
	{
		$this->Session->write('travel_detail_id', $travel_detail_id);
		$this->Session->write('depature_date', $depature_date);
		
		return $this->redirect(array('action' => 'reservation'));
	}

	public function _prepareSeats() {
		
		$this->layout='user';

		$selected_seat_no = array();

		$wizardData = $this->Wizard->read();

		if(is_array($wizardData)){	
			extract($wizardData);
			$selected_seat_no = $seats['ReservationDetail']['selected_seats'];
		}
	
		
		$this->set('selected_seat_no',$selected_seat_no);
		
		$travel_detail_id = $this->Session->read('travel_detail_id');
		
		$depature_date = $this->Session->read('depature_date');
		
		$date = explode('-',$depature_date);
		$depature_date = $date[0].'/'.$date[1].'/'.$date[2];
		
		//find all travel-details
		$this->ReservationDetail->TravelDetail->recursive = 2;
		$this->ReservationDetail->TravelDetail->unbindModel( array('hasMany' => array('ReservationDetail')));
		//$this->ReservationDetail->TravelDetail->unbindModel( array('belongsTo' => array('FreqDetail')));
		$this->ReservationDetail->TravelDetail->Bus->unbindModel( array('hasMany' => array('TravelDetail')));
		$this->ReservationDetail->TravelDetail->Route->unbindModel( array('hasMany' => array('TravelDetail')));
	
		$travel_detail = $this->ReservationDetail->TravelDetail->find('first',array(
													'conditions'=>array('TravelDetail.id'=>$travel_detail_id)
													));
	
		
		//find all reserved seats
		$this->ReservationDetail->recursive = -1;
		
		$reserved_seats = $this->ReservationDetail->find('list',array(
										'fields' => array('ReservationDetail.seat_no'),
										'conditions'=>array(
											'AND'=>array('ReservationDetail.travel_detail_id'=>$travel_detail_id),
												   array('ReservationDetail.depature_date'=>$depature_date)
												   )));
		
		$reserved_seats = "'".implode("','",$reserved_seats)."'";
		$this->set('reserved_seats', $reserved_seats);
		
		$this->set('depature_date', $depature_date);
		$this->set('travel_detail',$travel_detail);
		
		$this->loadModel('City');
		$this->set('cities',$this->City->find('all'));
		
		//get the feature included
		
		$this->ReservationDetail->TravelDetail->unbindModel( array('hasMany' => array('ReservationDetail')));
		$this->ReservationDetail->TravelDetail->unbindModel( array('belongsTo' => array('FreqDetail')));
		$this->ReservationDetail->TravelDetail->unbindModel( array('belongsTo' => array('Bus')));
		$this->ReservationDetail->TravelDetail->unbindModel( array('belongsTo' => array('Route')));

		 $otherFeatures = $this->ReservationDetail->TravelDetail->find('first',array(
													'conditions'=>array('TravelDetail.id'=>$this->Session->read('travel_detail_id'))
													));
		
		
		$this->set(compact('otherFeatures',$otherFeatures['OtherFeature']));
													
	}

	function _processSeats() {
		return true;
	}

	function _preparePassenger()
	{
		$this->layout='user';
		$wizardData = $this->Wizard->read();
	
		extract($wizardData);
		
		$total_seats = explode(',',$wizardData['seats']['ReservationDetail']['selected_seats']);
		
		$passengerTypes = $this->ReservationDetail->TravelDetail->OtherFeature->PassengerType->find('list');
		
		$this->set(compact('total_seats','passengerTypes'));
	}
	function _processPassenger()
	{
		return true;
	}

	function _prepareReview()
	{
		$this->layout='user';
		$wizardData = $this->Wizard->read();
	
		$this->set(compact('wizardData'));
		extract($wizardData);

				//get the total price of feature

		$this->ReservationDetail->TravelDetail->unbindModel( array('hasMany' => array('ReservationDetail')));
		$this->ReservationDetail->TravelDetail->unbindModel( array('belongsTo' => array('FreqDetail')));
		$this->ReservationDetail->TravelDetail->unbindModel( array('belongsTo' => array('Bus')));
		$this->ReservationDetail->TravelDetail->unbindModel( array('belongsTo' => array('Route')));

		//just to get other feature for this travel detail
		$travelDetails = $this->ReservationDetail->TravelDetail->find('first',array(
													'conditions'=>array('TravelDetail.id'=>$this->Session->read('travel_detail_id'))
													));

		//now get the total of feature 
		
		$total_feature_price = 0;

		foreach($travelDetails['OtherFeature'] as $feature):

			foreach($passenger['PassengerType']['id'] as $passenger_type):			
				$fare = $this->ReservationDetail->TravelDetail->OtherFeature->OtherFeaturesPassengerType->find('first',array(
									'conditions'=>array(
									'AND'=>	array('OtherFeaturesPassengerType.other_feature_id'=>$feature['id']),
											array('OtherFeaturesPassengerType.passenger_type_id'=>$passenger_type)
									)));
				
				if(!empty($fare)){
					$total_feature_price = $total_feature_price + $fare['OtherFeaturesPassengerType']['fare'];
				}

			endforeach;

		endforeach;

		$total_price = $seats['PurchaseDetail']['total_price']+$total_feature_price;
		$this->set('total_price',$total_price);
		
	}

	function _processReview()
	{
		return true;
	}
	
	function _afterComplete() {

		$wizardData = $this->Wizard->read();
	
		extract($wizardData);
		
		//get the total price of feature

		$this->ReservationDetail->TravelDetail->unbindModel( array('hasMany' => array('ReservationDetail')));
		$this->ReservationDetail->TravelDetail->unbindModel( array('belongsTo' => array('FreqDetail')));
		$this->ReservationDetail->TravelDetail->unbindModel( array('belongsTo' => array('Bus')));
		$this->ReservationDetail->TravelDetail->unbindModel( array('belongsTo' => array('Route')));

		//just to get other feature for this travel detail
		$travelDetails = $this->ReservationDetail->TravelDetail->find('first',array(
													'conditions'=>array('TravelDetail.id'=>$this->Session->read('travel_detail_id'))
													));

		//now get the total of feature 
		
		$total_feature_price = 0;

		foreach($travelDetails['OtherFeature'] as $feature):

			foreach($passenger['PassengerType']['id'] as $passenger_type):			
				$fare = $this->ReservationDetail->TravelDetail->OtherFeature->OtherFeaturesPassengerType->find('first',array(
									'conditions'=>array(
									'AND'=>	array('OtherFeaturesPassengerType.other_feature_id'=>$feature['id']),
											array('OtherFeaturesPassengerType.passenger_type_id'=>$passenger_type)
									)));
				
				if(!empty($fare)){
				$total_feature_price = $total_feature_price + $fare['OtherFeaturesPassengerType']['fare'];
				}

			endforeach;

		endforeach;

			$this->ReservationDetail->Passenger->create();
			$this->ReservationDetail->Passenger->save($passenger['Passenger']);
			
			$passenger_id = $this->ReservationDetail->Passenger->getLastInsertID();
		
			$seats['PurchaseDetail']['passenger_id']=$passenger_id;
			
			//need to check total price(bud ticket and other feature)
			
			$seats['PurchaseDetail']['purchase_amt']=$seats['PurchaseDetail']['total_price']+$total_feature_price;			
			
			$this->ReservationDetail->PurchaseDetail->create();
			$this->ReservationDetail->PurchaseDetail->save($seats['PurchaseDetail']);
			$purchase_id = $this->ReservationDetail->PurchaseDetail->getLastInsertID();
		
			
			//$seat = explode(',', $seats['ReservationDetail']['selected_seats']);
			
				foreach ($passenger['PassengerType']['id'] as $seat_no => $passenger_type_id) {
				
					$this->ReservationDetail->create();
				
					$this->ReservationDetail->save($this->ReservationDetail->set(array(
							'travel_detail_id' => $this->Session->read('travel_detail_id'),
							'passenger_id' => $passenger_id,
							'seat_no' =>$seat_no,
							'purchase_detail_id'=>$purchase_id,
							'passenger_type_id'=>$passenger_type_id,
							'depature_date'=> $this->Session->read('depature_date')
								))
							);
				}
	}
	
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
			//pr($this->request->data);
			$this->ReservationDetail->Passenger->create();
			$this->ReservationDetail->Passenger->save($this->request->data);
			
			$passenger_id = $this->ReservationDetail->Passenger->getLastInsertID();
			
			//$this->request->data['ReservationDetail']['passenger_id']=$passenger_id;
			
			$this->request->data['PurchaseDetail']['passenger_id']=$passenger_id;
			//need to check total price
			$this->request->data['PurchaseDetail']['purchase_amt']=$this->request->data['total_price'];			
			
			$this->ReservationDetail->PurchaseDetail->create();
			$this->ReservationDetail->PurchaseDetail->save($this->request->data);
			$purchase_id = $this->ReservationDetail->PurchaseDetail->getLastInsertID();
		
			
			$seat = explode(',', $this->request->data['selected_seats']);
			
				for($a=0;$a<count($seat);$a++)
				{
					$this->ReservationDetail->create();
				
					$this->ReservationDetail->save($this->ReservationDetail->set(array(
							'travel_detail_id' => $this->request->data['travel_detail_id'],
							'passenger_id' => $passenger_id,
							'seat_no' =>$seat[$a],
							'purchase_detail_id'=>$purchase_id,
							'depature_date'=>$this->request->data['depature_date']
								))
							);
				}
		}
		/*
		$passengers = $this->ReservationDetail->Passenger->find('list');
		$travelDetails = $this->ReservationDetail->TravelDetail->find('list');
		$purchaseDetails = $this->ReservationDetail->PurchaseDetail->find('list');
		$this->set(compact('passengers', 'travelDetails', 'purchaseDetails'));
		*/
		
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
	
	/*public function seats($travel_detail_id,$depature_date) {
		
		$date = explode('-',$depature_date);
		$depature_date = $date[0].'/'.$date[1].'/'.$date[2];
		
		//find all travel-details
		$this->ReservationDetail->TravelDetail->recursive = 2;
		$this->ReservationDetail->TravelDetail->unbindModel( array('hasMany' => array('ReservationDetail')));
		$this->ReservationDetail->TravelDetail->unbindModel( array('belongsTo' => array('FreqDetail')));
		$this->ReservationDetail->TravelDetail->Bus->unbindModel( array('hasMany' => array('TravelDetail')));
		$this->ReservationDetail->TravelDetail->Route->unbindModel( array('hasMany' => array('TravelDetail')));
	
		$travel_detail = $this->ReservationDetail->TravelDetail->find('first',array(
													'conditions'=>array('TravelDetail.id'=>$travel_detail_id)
													));
	
		
		//find all reserved seats
		$this->ReservationDetail->recursive = -1;
		
		$reserved_seats = $this->ReservationDetail->find('list',array(
										'fields' => array('ReservationDetail.seat_no'),
										'conditions'=>array(
											'AND'=>array('ReservationDetail.travel_detail_id'=>$travel_detail_id),
												   array('ReservationDetail.depature_date'=>$depature_date)
												   )));
		$reserved_seats = "'".implode("','",$reserved_seats)."'";
		$this->set('reserved_seats', $reserved_seats);
		
		$this->set('depature_date', $depature_date);
		$this->set('travel_detail',$travel_detail);
		
		$this->loadModel('City');
		$this->set('cities',$this->City->find('all'));
													
	}*/
}
