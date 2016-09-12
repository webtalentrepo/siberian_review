<?php
$schemas = (!isset($schemas)) ? array() : $schemas;
$schemas['feedback'] = array(
	'feedback_id' => array(
		'type' => 'int(11) unsigned',
		'auto_increment' => true,
		'primary' => true
	),
	'customer_id' => array(
		'type' => 'int(11)',
		'is_null' => true
	),
	'value_id' => array(
		'type' => 'int(11) unsigned'
	),
	'feedback_content' => array(
		'type' => 'text',
		'is_null' => true,
		'charset' => 'utf8',
		'collation' => 'utf8_general_ci'
	),
	'feedback_score' => array(
		'type' => 'int(11)',
		'is_null' => true
	),
	'created_at' => array(
		'type' => 'datetime'
	),
	'updated_at' => array(
		'type' => 'datetime'
	)
);