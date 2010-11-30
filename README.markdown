Introduction
==============
Provides the ability to use geo-targeting on your website with Magento. Once you install this module, you can select which cities you want to geo-target, and have the user redirected. The IP address is detected based on a database from http://www.ipinfodb.com. For better GeoLocation, get the latest and greatest from them.

Installation
=============
Copy this directory to app/code/local/LocationTracker. You will probably have to create the LocationTracker directory. Next, create an xml file in app/etc/modules/LocationTracker_IpRedirect.xml with the following:


        <?xml version="1.0"?>
	<config>
		<modules>
			<LocationTracker_IpRedirect>
				<active>true</active>
				<codePool>local</codePool>
				<depends>
					<Mage_Core/>
				</depends>
			</LocationTracker_IpRedirect>
		</modules>
	</config>


You should now be able to go to your website, and it should create the appropiate databases. It uses the "load data from file" sql command, and the directory paths use unix-style slashes. So, on Windows you may encounter problems. Also, the MySQL security settings could also potentially cause problems on some shared hosting environments.


Configuration
===============
You can configure the cities to redirect to and other options in the admin under System->Configuration->General. The URL /IpRedirect will redirect to the appropiate URL as configured.

Getting the detected city name
===============================
You can get the city name detected from the ipredirect helper. For example


        Mage::helper('ipredirect')->getRegion()

Updating the database(optional)
===============================
If you want to use a newer database, copy over the CSV files in the SQL directory with new ones from ipinfodb.com. You may need to delete the row with code 'ipredirect_setup' from the 'core_resource' table in your database.

Contact
========
Written by Gershon Bialer
gershon.bialer@gmail.com
