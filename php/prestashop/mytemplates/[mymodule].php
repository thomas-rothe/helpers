<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

require_once dirname(__FILE__) . '/models/[MyModel].php';

class [Mymodule] extends Module
{
    protected $config_form = false;

    private $myModelInstance;
    
    public function __construct()
    {
        $this->name = '[mymodule]';
        $this->tab = 'administration';
        $this->version = '1.0.2';
        $this->author = '[me]';
        $this->need_instance = 1;

        $this->bootstrap = true;
        $this->module_key = '11111111111111222223333';

        parent::__construct();

        $this->displayName = $this->l('[Mymodule]');
        $this->description = $this->l('[Mymodule description]');

        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
        
        // Models
        $this->myModelInstance = new MyModel(Db::getInstance());
    }

    /***********************************************************************************************************************
     *  Install and uninstall
     ***********************************************************************************************************************/

    public function install()
    {
        return parent::install() &&
            $this->registerHook('header') &&
            $this->registerHook('backOfficeHeader') &&
            $this->registerHook('displayFooter');
    }

    public function uninstall()
    {
        return parent::uninstall();
    }

    /***********************************************************************************************************************
     *  Configuration form
     ***********************************************************************************************************************/

    public function getContent()
    {
        if (((bool)Tools::isSubmit('submit[Mymodule]')) == true) {
            $myVar = (string) Tools::getValue('MY_VAR');
            if (!$myVar || empty($myVar) || !Validate::isPhoneNumber($myVar)) {
                $message = $this->displayError($this->l('Your configuration value could not be saved. Please put in a valid value.'));
            } else {
                $this->postProcess();
                $message = $this->displayConfirmation($this->l('Settings updated.'));
            }
        }
        return (isset($message) ? $message : '') . $this->renderForm();
    }

    protected function renderForm()
    {
        $helper = new HelperForm();

        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $helper->module = $this;
        $helper->default_form_language = $this->context->language->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG', 0);

        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitMwdwhatsappModule';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false)
            . '&configure=' . $this->name . '&tab_module=' . $this->tab . '&module_name=' . $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');

        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFormValues(), /* Add values for your inputs */
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );

        return $helper->generateForm(array($this->getConfigForm(Configuration::get('MWD_TELEFONNUMMER'))));
    }

    protected function getConfigForm()
    {
        return array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Settings'),
                    'icon' => 'icon-cogs',
                ),
                'input' => array(
                    // Text
                    array(
                        'type' => 'text',
                        'label' => $this->l('My var'),
                        'name' => 'MY_VAR',
                        'desc' => $this->l('Please put in a value.'),
                        'col' => 5,
                    ),
                    // Select
                    array(
                        'type' => 'select',
                        'label' => $this->l('My other var'),
                        'name' => 'MY_OTHER_VAR',
                        'options' => array(
                            'query' => array(
                                array(
                                    'selectId'   => 1,
                                    'selectName' => 'My first option',
                                ),
                                array(
                                    'selectId'   => 2,
                                    'selectName' => 'My second option',
                                ),
                            ),
                            'id' => 'selectId',
                            'name' => 'selectName'
                        )
                    )
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                ),
            ),
        );
    }

    protected function getConfigFormValues()
    {
        return array(
            'MY_VAR' => Configuration::get('MY_VAR'),
        );
    }

    protected function postProcess()
    {
        $form_values = $this->getConfigFormValues();

        foreach (array_keys($form_values) as $key) {
            Configuration::updateValue($key, Tools::getValue($key));
        }
    }

    /***********************************************************************************************************************
     *  Hooks for CSS and JS
     ***********************************************************************************************************************/

    public function hookBackOfficeHeader()
    {
        if (
            Tools::getValue('module_name') == $this->name ||
            Tools::getValue('configure') == $this->name
        ) {
            $this->context->controller->addJS($this->_path.'views/js/back.js');
            $this->context->controller->addCSS($this->_path.'views/css/back.css');
        }
    }

    public function hookHeader()
    {
        if (
            Tools::getValue('module_name') == $this->name ||
            Tools::getValue('configure') == $this->name
        ) {
            $this->context->controller->addJS($this->_path . '/views/js/front.js');
            $this->context->controller->addCSS($this->_path . '/views/css/front.css');
        }
    }

    /***********************************************************************************************************************
     *  Hooks
     ***********************************************************************************************************************/

    public function hookDisplayFooter()
    {
        $myVar = $this->getConfigFormValues()['MY_VAR'];

        $linkToWhatsappMobile = 'whatsapp://send/?phone=' . $telefonnummer;
        $linkToWhatsappDesktopAndTablet = 'https://web.whatsapp.com/send?phone=' . $telefonnummer;

        $this->context->smarty->assign(array(
            'myVar' => $myVar,
        ));
        
        return $this->display(__FILE__, '[mytemplate].tpl');
    }
}
