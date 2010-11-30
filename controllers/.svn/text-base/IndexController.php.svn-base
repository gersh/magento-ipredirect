<?php
class LocationTracker_IpRedirect_IndexController extends Mage_Core_Controller_Front_Action 
{
	public function indexAction() {
		$helper=Mage::helper('ipredirect');
		$location=$helper->getRedirectPage();
		$this->_redirect($location);	
	}
}
?>
