<?php
App::uses('AppModel', 'Model');
/**
 * FreqDetail Model
 *
 * @property TravelDetail $TravelDetail
 */
class FreqDetail extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasOne = array(
		'TravelDetail' => array(
			'className' => 'TravelDetail',
			'foreignKey' => 'freq_detail_id',
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
