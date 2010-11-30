<?php

class LocationTracker_IpRedirect_Model_Mysql4_Metrocodes_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
	protected function _construct()
	{
		$this->_init('ipredirect/metrocodes');
	}
	public function test() 
	{
		return("");
	}	
	public function toOptionArray()
	{
		
		if(method_exists($this,"_toOptionArray")) {
			return($this->_toOptionArray('metro_code','display_name'));
			//return(array(array('value'=>'test','label'=>'test')));
		}
		else {
			return(array(array('value'=>'test2','label'=>'test2')));
 		}
		//return($this->_toOptionArray('metro_code','metro_code'));
	}
}
