<?php


class Feedback_Model_Feedback extends Core_Model_Default
{
	public function __construct($params = array())
	{
		parent::__construct($params);
		$this->_db_table = 'Feedback_Model_Db_Table_Feedback';
		return $this;
	}
	
	public function findByCustomerId($value_id, $customer_id)
	{
		return $this->getTable()->findByCustomerId($value_id, $customer_id);
	}
	
	public function saveData($data, $where)
	{
		$this->getTable()->saveData($data, $where);
	}
	
	public function getSessionData($session_id) {
		return $this->getTable()->getSessionData($session_id);
	}
}