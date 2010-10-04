<?php

/**
 * @see MageTool_Tool_Core_Provider_Abstract
 */
require_once 'MageTool/Tool/MageApp/Provider/Abstract.php';

/**
 * undocumented class
 *
 * @package default
 * @author Alistair Stead
 **/
class MageTool_Tool_MageApp_Provider_Core_Cache extends MageTool_Tool_MageApp_Provider_Abstract
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
        return 'MageCoreCache';
    }
    
    /**
     * Clear the magento cache
     *
     * @return void
     * @author Alistair Stead
     **/
    public function clear()
    {
        $this->_bootstrap();
        
        Mage::app()->cleanCache();
        
        // get request/response object
        $request = $this->_registry->getRequest();
        $response = $this->_registry->getResponse();
        
        $response->appendContent(
            'Cache Cleared',
            array('color' => array('green'))
            );
    }
    
    /**
     * Enable the Magento cache
     *
     * @return void
     * @author Alistair Stead
     **/
    public function enable()
    {
        // TODO enable all magento cache
    }
    
    /**
     * Disable the Magento cache
     *
     * @return void
     * @author Alistair Stead
     **/
    public function disable()
    {
        // TODO disable all magento cache
    }
}