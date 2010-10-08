<?php

/**
 * @see MageTool_Tool_MageApp_Provider_Abstract
 */
require_once 'MageTool/Tool/MageApp/Provider/Abstract.php';

/**
 * undocumented class
 *
 * @package default
 * @author Alistair Stead
 **/
class MageTool_Tool_MageApp_Provider_App extends MageTool_Tool_MageApp_Provider_Abstract 
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
        return 'MageApp';
    }
    
    /**
     * Clear the magento cache
     *
     * @return void
     * @author Alistair Stead
     **/
    public function version()
    {
        $this->_bootstrap();
        
        $version = Mage::getVersion();
        
        // get request/response object
        $request = $this->_registry->getRequest();
        $response = $this->_registry->getResponse();
        
        $response->appendContent(
            'Magento Version: ' . $version,
            array('color' => array('yellow'))
            );
    }
}