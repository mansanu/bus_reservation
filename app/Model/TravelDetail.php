<?php
App::uses('AppModel', 'Model');
/**
 * TravelDetail Model
 *
 * @property Bus $Bus
 * @property Route $Route
 * @property FreqDetail $FreqDetail
 * @property ReservationDetail $ReservationDetail
 */
class TravelDetail extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Bus' => array(
			'className' => 'Bus',
			'foreignKey' => 'bus_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Route' => array(
			'className' => 'Route',
			'foreignKey' => 'route_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'FreqDetail' => array(
			'className' => 'FreqDetail',
			'foreignKey' => 'freq_detail_id',
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
			'foreignKey' => 'travel_detail_id',
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
