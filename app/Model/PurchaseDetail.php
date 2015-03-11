<?php
App::uses('AppModel', 'Model');
/**
 * PurchaseDetail Model
 *
 * @property Passenger $Passenger
 * @property ReservationDetail $ReservationDetail
 */
class PurchaseDetail extends AppModel {


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
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'ReservationDetail' => array(
			'className' => 'ReservationDetail',
			'foreignKey' => 'purchase_detail_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
