<?php
App::uses('AppModel', 'Model');
/**
 * ReservationDetail Model
 *
 * @property Passenger $Passenger
 * @property TravelDetail $TravelDetail
 * @property PurchaseDetail $PurchaseDetail
 */
class ReservationDetail extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Passenger' => array(
			'className' => 'Passenger',
			'foreignKey' => 'passenger_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'TravelDetail' => array(
			'className' => 'TravelDetail',
			'foreignKey' => 'travel_detail_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PurchaseDetail' => array(
			'className' => 'PurchaseDetail',
			'foreignKey' => 'purchase_detail_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
