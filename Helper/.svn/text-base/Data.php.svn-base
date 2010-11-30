<?php
/** 
 * LocationTracker_IpRedirect_Helper_Data
 *
 */
class LocationTracker_IpRedirect_Helper_Data extends Mage_Core_Helper_Abstract 
{
  public function getRedirectPage() 
  {
		$region=$this->getRegion();
		if($region=="none")
		{
			return(Mage::getStoreConfig("general/iptracker/DEFAULTURL"));
		}
		else
		{
				return(Mage::getStoreConfig("general/iptracker/URLPREFIX") . $region . Mage::getStoreConfig("general/iptracker/URLSUFFIX"));
		}
  }
	public function getRegion() 
	{
		if(Mage::getStoreConfig("general/iptracker/CATEGORYCOOKIES")) 
		{
			$session=Mage::getSingleton('catalog/session');
			if($categoryId=$session->getLastVisitedCategoryId())
			{
				$category=Mage::getModel('catalog/category')->load($categoryId);
				while($category->getLevel()>=3) {
					$category=$category->getParentCategory();	
				}
				return($category->getName());
			}	
		}
		$ip=$this->_getRequest()->getClientIp();
		$db = Mage::getSingleton('core/resource')->getConnection('core_write');
		$result = $db->query("SELECT l.metrocode as metrocode,metro.display_name as display_name from `ipredirect_ip_group_city` ir JOIN ipredirect_locations l on ir.location=l.id JOIN ipredirect_metrocodes metro on metro.metro_code=l.metrocode where ip_start <= INET_ATON('$ip') order by ip_start desc limit 1;");
			if(!$result) {
			return "none";
		}
		$rows = $result->fetch(PDO::FETCH_ASSOC);
		if(!$rows) {
			return "none";	
		}
		foreach(explode(",",Mage::getStoreConfig("general/iptracker/REDIRECTREGIONS")) as $region)
		{
			if($rows['metrocode']==$region) {	
				return($rows['display_name']);
			}
		}
		return("none");

	}
}
?>
