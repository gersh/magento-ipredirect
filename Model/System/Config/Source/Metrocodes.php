<?php

class LocationTracker_IpRedirect_Model_System_Config_Source_Metrocodes 
{
	protected $_options;
	public function toOptionArray() {
			return(Mage::getResourceModel("ipredirect/metrocodes_collection")->toOptionArray());
			$t=Mage::getConfig()->getResourceModelClassName("ipredirect/metrocodes_collection");
	}
}

?>
