# MageTool #

Additional ZF tools specifically for use during Magento development. Although Magento uses a great number of Zend Framework components and has a similar architecture to a Zend Framework application. It does not have any command line tools for use during development.

These tools have been created to facilitate a number of repetitive tasks during development. Rather than switching between mysql tools and the Magento admin system you can run simple command and improve your workflow greatly

## Install ##

First install ZF on your development machine.

	sudo pear channel-discover pear.zfcampus.org
	sudo pear install zfcampus/zf
	
Once you have installed ZF you will need to create configuration for your user by creating the following file:

	vim ~/.zf.ini
	
Add the following lines to load the additional commands:

	basicloader.classes.1 = "MageTool_Tool_MageApp_Provider_Manifest"
	basicloader.classes.2 = "MageTool_Tool_MageExtension_Provider_Manifest"
	