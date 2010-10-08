<?php

/**
 * @see MageTool_Tool_MageExtension_Provider_Abstract
 */
require_once 'MageTool/Tool/MageExtension/Provider/Abstract.php';

/**
 * undocumented class
 *
 * @package default
 * @author Alistair Stead
 **/
class MageTool_Tool_MageExtension_Provider_Extension extends MageTool_Tool_MageExtension_Provider_Abstract
    implements Zend_Tool_Framework_Provider_Pretendable
{
    /**
     * Define the name of the provider
     *
     * @return string
     * @author Alistair Stead
     **/
    public function getName()
    {
        return 'MageExtension';
    }
    
    /**
     * Clear the magento cache
     *
     * @return void
     * @author Alistair Stead
     **/
    public function create($codePool, $vendorName, $extensionName)
    {
        echo "Create extension";
    }
}