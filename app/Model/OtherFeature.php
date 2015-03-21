<?php
App::uses('AppModel', 'Model');
/**
 * OtherFeature Model
 *
 * @property PassengerType $PassengerType
 * @property TravelDetail $TravelDetail
 */
class OtherFeature extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'PassengerType' => array(
			'className' => 'PassengerType',
			'joinTable' => 'other_features_passenger_types',
			'foreignKey' => 'other_feature_id',
			'associationForeignKey' => 'passenger_type_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'TravelDetail' => array(
			'className' => 'TravelDetail',
			'joinTable' => 'travel_details_other_features',
			'foreignKey' => 'other_feature_id',
			'associationForeignKey' => 'travel_detail_id',
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
