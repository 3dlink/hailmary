<?php
App::uses('AppModel', 'Model');
/**
 * Code Model
 *
 * @property Pass $Pass
 */
class Code extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Pass' => array(
			'className' => 'Pass',
			'foreignKey' => 'pass_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
