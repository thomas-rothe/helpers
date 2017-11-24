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

        if (!$this->context->customer->isLogged() && $this->php_self != 'authentication' && $this->php_self != 'password') {
            Tools::redirect('index.php?controller=authentication?back=my-account');
        }

        ...
    }
}
