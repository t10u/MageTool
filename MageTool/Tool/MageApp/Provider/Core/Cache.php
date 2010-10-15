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
     * Cache types
     *
     * @var array
     **/
    protected $_cacheTypes = array();
    
    protected function _getCacheTypes()
    {
        if (!$this->_cacheTypes) {
            $cacheTypes = array();
            foreach (Mage::app()->getCacheInstance()->getTypes() as $type) {
                $cacheTypes[] = $type->getId();
            }
            
            $this->_cacheTypes = $cacheTypes;
        }
        
        return $this->_cacheTypes;
    }
    
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
            'Magento Cache Cleared',
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
        $this->_bootstrap();
        $allTypes = Mage::app()->useCache();

        $updatedTypes = 0;
        foreach ($this->_getCacheTypes() as $code) {
            if (empty($allTypes[$code])) {
                $allTypes[$code] = 1;
                $updatedTypes++;
            }
        }
        if ($updatedTypes > 0) {
            Mage::app()->saveUseCache($allTypes);
        }
        
        // get request/response object
        $request = $this->_registry->getRequest();
        $response = $this->_registry->getResponse();
        
        $response->appendContent(
            'Magento Cache Enabled',
            array('color' => array('green'))
            );
    }
    
    /**
     * Disable the Magento cache
     *
     * @return void
     * @author Alistair Stead
     **/
    public function disable()
    {
        $this->_bootstrap();
        $allTypes = Mage::app()->useCache();

        $updatedTypes = 0;
        foreach ($this->_getCacheTypes() as $code) {
            if (!empty($allTypes[$code])) {
                $allTypes[$code] = 0;
                $updatedTypes++;
            }
            $tags = Mage::app()->getCacheInstance()->cleanType($code);
        }
        if ($updatedTypes > 0) {
            Mage::app()->saveUseCache($allTypes);
        }
        
        // get request/response object
        $request = $this->_registry->getRequest();
        $response = $this->_registry->getResponse();
        
        $response->appendContent(
            'Magento Cache Disabled',
            array('color' => array('green'))
            );
    }
}