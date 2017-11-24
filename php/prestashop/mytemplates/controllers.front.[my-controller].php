<?php

class mycontrollernameModuleFrontController extends ModuleFrontControllerCore
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
