<?php


$installer = $this;

$installer->startSetup();

$moduleSqlDir=Mage::getConfig()->getModuleDir("sql",(string)$this->_resourceConfig->setup->module);
$installer->run("

DROP TABLE IF EXISTS `{$installer->getTable("ipredirect_ip_group_city")}` ;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE  `{$installer->getTable("ipredirect_ip_group_city")}` (
  `ip_start` bigint(20) NOT NULL,
  `location` int(11) NOT NULL,
  UNIQUE KEY `ip_start` (`ip_start`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `{$installer->getTable("ipredirect_locations")}` ;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `{$installer->getTable("ipredirect_locations")}` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL,
  `region_code` varchar(2) NOT NULL,
  `city` varchar(64) NOT NULL,
  `zipcode` varchar(8) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `metrocode` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `{$installer->getTable("ipredirect_metrocodes")}` ;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `{$installer->getTable("ipredirect_metrocodes")}` (
  `metro_code` varchar(3) NOT NULL,
  `province_name` varchar(255) NOT NULL,
	`metro_name` varchar(255) NOT NULL,
	`display_name` varchar(255) NOT NULL,
  PRIMARY KEY (`metro_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40101 SET character_set_client = @saved_cs_client */;
LOAD DATA LOCAL INFILE '$moduleSqlDir/locations.csv' into table `{$installer->getTable("ipredirect_locations")}` 
FIELDS TERMINATED BY ';' ENCLOSED BY '\"'
LINES TERMINATED BY '\n'
IGNORE 1 LINES;
LOAD DATA LOCAL INFILE '$moduleSqlDir/ip_group_city.csv' into table `{$installer->getTable("ipredirect_ip_group_city")}`
FIELDS TERMINATED BY ';' ENCLOSED BY '\"'
LINES TERMINATED BY '\n'
IGNORE 1 LINES;
LOAD DATA LOCAL INFILE '$moduleSqlDir/metrocodes.csv' into table`{$installer->getTable("ipredirect_metrocodes")}`
FIELDS TERMINATED BY ',' ENCLOSED BY '\"'
LINES TERMINATED BY '\n'
IGNORE 1 LINES
(province_name,metro_name,metro_code,display_name);
");
$installer->endSetup();
