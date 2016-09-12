<?php

class Feedback_Model_Db_Table_Feedback extends Core_Model_Db_Table
{
	protected $_name = "feedback";
	protected $_primary = "feedback_id";
	
	/**
	 * Fetch By CustomerId and ValueId
	 *
	 * @param $value_id
	 * @param $customer_id
	 * @return null|Zend_Db_Table_Row_Abstract
	 */
	public function findByCustomerId($value_id, $customer_id)
	{
		$select = $this->select()
			->from(array('cc' => $this->_name))
			->where('cc.value_id = ?', $value_id)
			->where('cc.customer_id = ?', $customer_id);
		
		return $this->fetchRow($select);
	}
	
	public function saveData($data, $where = '')
	{
		if ($where == '') {
			$this->getAdapter()->insert($this->_name, $data);
		} else {
			$this->getAdapter()->update($this->_name, $data, $where);
		}
	}
	
}