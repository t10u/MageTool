# MageTool #

Additional ZF tools specifically for use during Magento development. Although Magento uses a great number of Zend Framework components and has a similar architecture to a Zend Framework application. It does not have any command line tools for use during development.

These tools have been created to facilitate a number of repetitive tasks during development. Rather than switching between mysql tools and the Magento admin system you can run simple command and improve your workflow greatly

## Install ##

First install ZF on your development machine.

	sudo pear channel-discover pear.zfcampus.org
	sudo pear install zfcampus/zf
	
Install MageTool on your development machine.

	sudo pear channel-discover pear.magetool.co.uk
	sudo pear install magetool/magetool
	
Once you have installed ZF and MageTool you will need to create configuration for your user by creating the following file:

	vim ~/.zf.ini
	
Add the following lines to load the additional MageTool commands:

	basicloader.classes.1 = "MageTool_Tool_MageApp_Provider_Manifest"
	basicloader.classes.2 = "MageTool_Tool_MageExtension_Provider_Manifest"
	
After creating the user specific configuration file and adding the additional config lines the additional MageToll commands will be available for you to use with zf. To confirm that everything is installed correctly run the following command:

	zf
	
Response:

	Zend Framework Command Line Console Tool v1.10.8
	Usage:
	    zf [--global-opts] action-name [--action-opts] provider-name [--provider-opts] [provider parameters ...]
	    Note: You may use "?" in any place of the above usage string to ask for more specific help information.
	    Example: "zf ? version" will list all available actions for the version provider.

	Providers and their actions:
	  Version
	    zf show version mode[=mini] name-included[=1]
	    Note: There are specialties, use zf show version.? to get specific help on them.

	  Config
	    zf create config
	    zf show config
	    Note: There are specialties, use zf enable config.? to get specific help on them.
	    Note: There are specialties, use zf disable config.? to get specific help on them.

	  Phpinfo
	    zf show phpinfo

	  Manifest
	    zf show manifest

	  Profile
	    zf show profile

	  Project
	    zf create project path name-of-profile file-of-profile
	    zf show project
	    Note: There are specialties, use zf show project.? to get specific help on them.

	  Application
	    zf change application.class-name-prefix class-name-prefix

	  Model
	    zf create model name module

	  View
	    zf create view controller-name action-name-or-simple-name

	  Controller
	    zf create controller name index-action-included[=1] module

	  Action
	    zf create action name controller-name[=Index] view-included[=1] module

	  Module
	    zf create module name

	  Form
	    zf create form name module

	  Layout
	    zf enable layout
	    zf disable layout

	  DbAdapter
	    zf configure db-adapter dsn section-name[=production]

	  DbTable
	    zf create db-table name actual-table-name module force-overwrite
	    Note: There are specialties, use zf create db-table.? to get specific help on them.

	  ProjectProvider
	    zf create project-provider name actions

	  MageAdminUser
	    zf show mage-admin-user
	    zf create mage-admin-user username email password firstname[=Admin] lastname[=User]

	  MageCoreCache
	    zf clear mage-core-cache
	    zf enable mage-core-cache
	    zf disable mage-core-cache

	  MageCoreResource
	    zf show mage-core-resource
	    zf delete mage-core-resource path

	  MageCoreConfig
	    zf show mage-core-config path scope
	    zf set mage-core-config path scope value
	    zf replace mage-core-config match value path scope

	  MageApp
	    zf version mage-app

	  MageExtension
	    zf create mage-extension code-pool vendor-name extension-name
	
## Example Usage ##

MageTool provides commands for use during Magento development.

	zf show mage-core-config --path web/unsecure/base_url
	
## Example Usage ##

MageTool provides commands for use during Magento development.

	zf show mage-core-config --path web/unsecure/base_url

## Additional configuration ##

To create aliases to frequently used commands, add the .bash_aliases file to your home directory and add the following to the .bashrc file

	if [ -f ~/.bash_aliases ]; then
	  . ~/.bash_aliases
	fi

List of aliases:

  - **mage_cc** - clear all caches
  - **mage_config_get** - get config setting, e.g. *mage_config_get dev/debug/template_hints*
  - **mage_config_set** - set config setting, e.g. *mage_config_set dev/debug/template_hints stores --value 1*
  - **mage_hints_on** - turn on template hints
  - **mage_hints_off** - turn off template hints
	
## Showing your appreciation ##

Of course, the best way to show your appreciation for the magetool itself remains
contributing by forking this project.  If you'd like to show your appreciation in
another way, however, consider Flattr'ing me:

[![Flattr this][2]][1]

[1]: http://flattr.com/thing/71078/MageTool
[2]: http://api.flattr.com/button/button-compact-static-100x17.png	