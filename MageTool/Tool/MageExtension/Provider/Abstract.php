<?php


/**
 * @see Zend_Tool_Framework_Provider_Interface
 */
require_once 'Zend/Tool/Framework/Provider/Interface.php';

/**
 * undocumented class
 *
 * @package default
 * @author Alistair Stead
 **/
abstract class MageTool_Tool_MageExtension_Provider_Abstract implements Zend_Tool_Framework_Provider_Interface
{
    /**
     * Overload the constructor to add the setup for finding the mage file
     *
     * @return void
     * @author Alistair Stead
     **/
    public function __construct()
    {
        // TODO bootstrap the Magento application
    }
}