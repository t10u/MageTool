<?php

require_once 'MageTool/Tool/MageApp/Provider/Admin/User.php';
require_once 'MageTool/Tool/MageApp/Provider/Core/Cache.php';
require_once 'MageTool/Tool/MageApp/Provider/Core/Resource.php';
require_once 'MageTool/Tool/MageApp/Provider/Core/Config.php';
require_once 'MageTool/Tool/MageApp/Provider/App.php';

/**
 * @see Zend_Tool_Framework_Manifest_ProviderManifestable
 */
require_once 'Zend/Tool/Framework/Manifest/ProviderManifestable.php';

class MageTool_Tool_MageApp_Provider_Manifest 
    implements Zend_Tool_Framework_Manifest_ProviderManifestable, Zend_Tool_Framework_Manifest_ActionManifestable
{
    public function getProviders()
    {
        $providers = array(
            new MageTool_Tool_MageApp_Provider_Admin_User(),
            new MageTool_Tool_MageApp_Provider_Core_Cache(),
            new MageTool_Tool_MageApp_Provider_Core_Resource(),
            new MageTool_Tool_MageApp_Provider_Core_Config(),
            new MageTool_Tool_MageApp_Provider_App(),
            );

        return $providers;
    }

    public function getActions()
    {
        $actions = array();

        return $actions;
    }
}