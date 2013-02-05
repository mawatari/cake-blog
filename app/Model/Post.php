<?php
App::uses('AppModel', 'Model');
/**
 * Post Model
 *
 * @property Author $Author
 */
class Post extends AppModel {

	public $order = array('Post.id DESC');

	public $actsAs = array('Search.Searchable');

	public $filterArgs = array(
		'author_id' => array('type' => 'value'),
		'keyword' => array('type' => 'like', 'field' => array('Post.title', 'Post.body'), 'connectorAnd' => '+', 'connectorOr' => ','),
		'from' => array('type' => 'value', 'field' => 'Post.created >='),
		'to' => array('type' => 'value', 'field' => 'Post.created <='),
	);

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'body' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'author_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Author' => array(
			'className' => 'Author',
			'foreignKey' => 'author_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
