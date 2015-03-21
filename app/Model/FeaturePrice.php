<?php
App::uses('AppModel', 'Model');
/**
 * FeaturePrice Model
 *
 * @property OtherFeature $OtherFeature
 * @property PassengerType $PassengerType
 * @property TravelDetail $TravelDetail
 */
class FeaturePrice extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'OtherFeature' => array(
			'className' => 'OtherFeature',
			'foreignKey' => 'other_feature_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PassengerType' => array(
			'className' => 'PassengerType',
			'foreignKey' => 'passenger_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'TravelDetail' => array(
			'className' => 'TravelDetail',
			'joinTable' => 'travel_details_feature_prices',
			'foreignKey' => 'feature_price_id',
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
