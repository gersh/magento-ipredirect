<?php
class LocationTracker_IpRedirect_Model_Mysql4_Metrocodes extends Mage_Core_Model_Mysql4_Abstract 
{
	protected function _construct()
	{
		$this->_init('ipredirect/metrocodes','metro_code');
	}	
}
