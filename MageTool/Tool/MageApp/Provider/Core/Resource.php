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
class MageTool_Tool_MageApp_Provider_Core_Resource extends MageTool_Tool_MageApp_Provider_Abstract
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
        return 'MageCoreResource';
    }
    
    /**
     * Retrive a list of installed resources
     *
     * @return void
     * @author Alistair Stead
     **/
    public function show($code = null)
    {
        $this->_bootstrap();
        
        // get request/response object
        $request = $this->_registry->getRequest();
        $response = $this->_registry->getResponse();
        
        $response->appendContent(
            'Magento Core Resource: [VERSION] [DATA_VERSION]',
            array('color' => array('yellow'))
            );
            
        $resTable = Mage::getSingleton('core/resource')->getTableName('core/resource');
        $read = Mage::getSingleton('core/resource')->getConnection('core_read');
        
        $select = $read->select()->from($resTable, array('code', 'version', 'data_version'));
        if(is_string($code)) {
            $select->where('code = ?', $code);
        }
        $resourceCollection = $read->fetchAll($select);
        $read->closeConnection();

        foreach($resourceCollection as $key => $resource) {
            $response->appendContent(
                "{$resource['code']} [{$resource['version']}] [{$resource['data_version']}]",
                array('color' => array('white'))
                );
        }
    }
    
    /**
     * Delete a core resource
     *
     * @return void
     * @author Alistair Stead
     **/
    public function delete($code)
    {
        $this->_bootstrap();
        
        // get request/response object
        $request = $this->_registry->getRequest();
        $response = $this->_registry->getResponse();
        
        $resTable = Mage::getSingleton('core/resource')->getTableName('core/resource');
        $write = Mage::getSingleton('core/resource')->getConnection('core_write');

        $write->delete($resTable, "code = '{$code}'");
        $write->closeConnection();
    }
}