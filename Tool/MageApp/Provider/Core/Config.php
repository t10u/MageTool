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
     * @TODO add path and scope filters
     **/
    public function show()
    {
        $this->_bootstrap();
        
        // get request/response object
        $request = $this->_registry->getRequest();
        $response = $this->_registry->getResponse();
        
        $response->appendContent(
            "Magento Config Data:\n",
            array('color' => array('yellow'))
            );
            
        try {
            $configs = Mage::getModel('core/config_data')
                ->getCollection()
                ->load();

            foreach($configs as $key => $config) {
                $response->appendContent(
                    "{$config->getvalue()}:\n",
                    array('color' => array('white'))
                    );
            }

        } catch (Exception $e) {
            throw new MageTool_Tool_MageApp_Provider_Exception('Unable to retrieve the config data.');
        }
    }
    
    /**
     * undocumented function
     *
     * @return void
     * @author Alistair Stead
     **/
    public function set($path, $scope = null, $value)
    {
    }
    
    /**
     * undocumented function
     *
     * @return void
     * @author Alistair Stead
     **/
    public function setIfMatch($path, $scope = null, $match, $value)
    {
    }
}