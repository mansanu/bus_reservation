<?php
App::uses('AppModel', 'Model');
/**
 * PassengerType Model
 *
 * @property ReservationDetail $ReservationDetail
 * @property OtherFeature $OtherFeature
 */
class PassengerType extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'ReservationDetail' => array(
			'className' => 'ReservationDetail',
			'foreignKey' => 'passenger_type_id',
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


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'OtherFeature' => array(
			'className' => 'OtherFeature',
			'joinTable' => 'other_features_passenger_types',
			'foreignKey' => 'passenger_type_id',
			'associationForeignKey' => 'other_feature_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
