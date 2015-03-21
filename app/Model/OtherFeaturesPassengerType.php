<?php
App::uses('AppModel', 'Model');
/**
 * OtherFeaturesPassengerType Model
 *
 * @property OtherFeature $OtherFeature
 * @property PassengerType $PassengerType
 */
class OtherFeaturesPassengerType extends AppModel {


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
}
