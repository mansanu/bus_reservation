<?php
App::uses('AppModel', 'Model');
/**
 * Bus Model
 *
 * @property BusType $BusType
 * @property Agency $Agency
 * @property TravelDetail $TravelDetail
 */
class Bus extends AppModel {

public $displayField = 'bus_reg_no';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'BusType' => array(
			'className' => 'BusType',
			'foreignKey' => 'bus_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Agency' => array(
			'className' => 'Agency',
			'foreignKey' => 'agency_id',
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
		'TravelDetail' => array(
			'className' => 'TravelDetail',
			'foreignKey' => 'bus_id',
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
