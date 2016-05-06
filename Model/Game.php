<?php
App::uses('AppModel', 'Model');
/**
 * Game Model
 *
 * @property Pass $Pass
 */
class Game extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


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
