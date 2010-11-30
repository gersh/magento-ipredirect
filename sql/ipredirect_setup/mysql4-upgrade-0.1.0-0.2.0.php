<?php


$installer = $this;

$installer->startSetup();

$moduleSqlDir=Mage::getConfig()->getModuleDir("sql",(string)$this->_resourceConfig->setup->module);
$installer->run("

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

LOAD DATA LOCAL INFILE '$moduleSqlDir/metrocodes.csv' into table`{$installer->getTable("ipredirect_metrocodes")}`
FIELDS TERMINATED BY ',' ENCLOSED BY '\"'
LINES TERMINATED BY '\n'
IGNORE 1 LINES
(province_name,metro_name,metro_code,display_name);
");
$installer->endSetup();
