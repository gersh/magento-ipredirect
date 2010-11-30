<?php

class LocationTracker_IpRedirect_Model_Mysql4_IpRedirect_locations extends Mage_Core_Model_Mysql4_Abstract
{
	public function _construct() 
	{
		parent::_construct();
		$this->_init('IpRedirect/IpRedirect_locations');
	}
}
?>
