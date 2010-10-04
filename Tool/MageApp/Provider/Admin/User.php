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
class MageTool_Tool_MageApp_Provider_Admin_User extends MageTool_Tool_MageApp_Provider_Abstract
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
        return 'MageAdminUser';
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
     * Create a new admin user
     *
     * @return void
     * @author Alistair Stead
     **/
    public function create()
    {
        $this->_bootstrap();
        
        // get request/response object
        $request = $this->_registry->getRequest();
        $response = $this->_registry->getResponse();
        
        $response->appendContent(
            "Magento Admin User:\n",
            array('color' => array('yellow'))
            );

        try {
            //create new user
            $user = Mage::getModel('admin/user')
                ->setData(array(
                    'username'  => USERNAME,
                    'firstname' => 'John',
                    'lastname'  => 'Doe',
                    'email'     => EMAIL,
                    'password'  => PASSWORD,
                    'is_active' => 1
                ))->save();

        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }

        try {
            //create new role
            $role = Mage::getModel("admin/roles")
                    ->setName('Development')
                    ->setRoleType('G')
                    ->save();

            //give "all" privileges to role
            Mage::getModel("admin/rules")
                    ->setRoleId($role->getId())
                    ->setResources(array("all"))
                    ->saveRel();

        } catch (Mage_Core_Exception $e) {
            echo $e->getMessage();
            exit;
        } catch (Exception $e) {
            echo 'Error while saving role.';
            exit;
        }

        try {
            //assign user to role
            $user->setRoleIds(array($role->getId()))
                ->setRoleUserId($user->getUserId())
                ->saveRelations();

        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }
}