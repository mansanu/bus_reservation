<?php
App::uses('AppModel', 'Model');
/**
 * TravelDetailsOtherFeature Model
 *
 * @property TravelDetail $TravelDetail
 * @property OtherFeature $OtherFeature
 */
class TravelDetailsOtherFeature extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	//public $primaryKey = 'other_feature_id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'TravelDetail' => array(
			'className' => 'TravelDetail',
			'foreignKey' => 'travel_detail_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'OtherFeature' => array(
			'className' => 'OtherFeature',
			'foreignKey' => 'other_feature_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
