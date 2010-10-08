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
class MageTool_Tool_MageApp_Provider_Core_Config extends MageTool_Tool_MageApp_Provider_Abstract
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
        return 'MageCoreConfig';
    }
    
    /**
     * Retrive a list of installed resources
     *
     * @return void
     * @author Alistair Stead
     **/
    public function show($path = null, $scope = null)
    {
        $this->_bootstrap();
        
        // get request/response object
        $request = $this->_registry->getRequest();
        $response = $this->_registry->getResponse();
        
        $response->appendContent(
            'Magento Config Data: $PATH [$SCOPE] = $VALUE',
            array('color' => array('yellow'))
            );
            
        $configCollection = $configs = Mage::getModel('core/config_data')->getCollection();

        if(is_string($path)) {
            $configCollection->addFieldToFilter('path', array("eq" => $path));
        }
        if(is_string($scope)) {
            $configCollection->addFieldToFilter('scope', array("eq" => $scope));
        }
        $configCollection->load();

        foreach($configs as $key => $config) {
            $response->appendContent(
                "{$config->getPath()} [{$config->getScope()}] = {$config->getValue()}",
                array('color' => array('white'))
                );
        }
    }
    
    /**
     * Set the value of a config value that matches a path and scope.
     *
     * @return void
     * @author Alistair Stead
     **/
    public function set($path, $scope = null, $value)
    {
        $this->_bootstrap();
        
        // get request/response object
        $request = $this->_registry->getRequest();
        $response = $this->_registry->getResponse();
        
        $response->appendContent(
            'Magento Config updated to: $PATH [$SCOPE] = $VALUE',
            array('color' => array('yellow'))
            );
            
        $configCollection = $configs = Mage::getModel('core/config_data')->getCollection();
            
        $configCollection->addFieldToFilter('path', array("eq" => $path));
        if(is_string($scope)) {
            $configCollection->addFieldToFilter('scope', array("eq" => $scope));
        }
        $configCollection->load();
            
        foreach($configs as $key => $config) {
            $config->setValue($value);
            if ($this->_registry->getRequest()->isPretend()) {
                $result = "Dry run";
            } else {
                $result = "Saved";
                $config->save();
            }  

            $response->appendContent(
                "{$result} > {$config->getPath()} [{$config->getScope()}] = {$config->getValue()}",
                array('color' => array('white'))
                );
        }
    }
    
    /**
     * Update a config value that matches a path and scope by using str_replace
     *
     * @return void
     * @author Alistair Stead
     **/
    public function replace($match, $value, $path = null, $scope = null)
    {
        $this->_bootstrap();
        
        // get request/response object
        $request = $this->_registry->getRequest();
        $response = $this->_registry->getResponse();
        
        $response->appendContent(
            'Magento Config updated to: $PATH [$SCOPE] = $VALUE',
            array('color' => array('yellow'))
            );
            
        $configCollection = $configs = Mage::getModel('core/config_data')->getCollection();

        if(is_string($path)) {
            $configCollection->addFieldToFilter('path', array("eq" => $path));
        }
        if(is_string($scope)) {
            $configCollection->addFieldToFilter('scope', array("eq" => $scope));
        }
        $configCollection->load();

        foreach($configs as $key => $config) {
            if(strstr($config->getvalue(), $match)) {
                $config->setValue(str_replace($match, $value, $config->getvalue()));
                
                if ($this->_registry->getRequest()->isPretend()) {
                    $result = "Dry run";
                } else {
                    $result = "Saved";
                    $config->save();
                }  

                $response->appendContent(
                    "{$result} > {$config->getPath()} [{$config->getScope()}] = {$config->getValue()}",
                    array('color' => array('white'))
                    );
            }
        }
    }
}