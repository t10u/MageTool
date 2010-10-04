<?php

require_once 'MageTool/Tool/MageExtension/Provider/Extension.php';

/**
 * @see Zend_Tool_Framework_Manifest_ProviderManifestable
 */
require_once 'Zend/Tool/Framework/Manifest/ProviderManifestable.php';

class MageTool_Tool_MageExtension_Provider_Manifest 
    implements Zend_Tool_Framework_Manifest_ProviderManifestable, Zend_Tool_Framework_Manifest_ActionManifestable
{
    public function getProviders()
    {
        $providers = array(
                new MageTool_Tool_MageExtension_Provider_Extension(),
            );

        return $providers;
    }

    public function getActions()
    {
        $actions = array();

        return $actions;
    }
}