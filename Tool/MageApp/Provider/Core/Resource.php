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
    public function show()
    {
    }
    
    /**
     * Delete a core resource
     *
     * @return void
     * @author Alistair Stead
     **/
    public function clear()
    {
    }
}