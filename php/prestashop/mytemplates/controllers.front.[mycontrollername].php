<?php

/*
get link to this controller:
$link = $this->context->link->getModuleLink('[mymodulename]', '[mycontrollername]', array());
*/

class [mymodulename][mycontrollername]ModuleFrontController extends ModuleFrontControllerCore
{
    public function initContent()
    {
        parent::initContent();

        // Check if logged in custumer
        if (!$this->context->customer->isLogged() && $this->php_self != 'authentication' && $this->php_self != 'password') {
            Tools::redirect('index.php?controller=authentication?back=my-account');
        }
        
        // ..or check if logged in Admin
        $cookie = new Cookie('psAdmin');
        if ($cookie->id_employee){
            // logged in admin
        } else {
            // no logged in admin
        }

        // Do something
        ...
    }
}
