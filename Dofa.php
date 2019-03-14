<?php
/**
 * Created by PhpStorm.
 * User: doman
 * Date: 2/26/2019
 * Time: 6:32 PM
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

class Dofa extends Module
{

    public function __construct()
    {
        $this->name = 'dofa';
        $this->author = 'Domantas ir Faustas';
        //$this->tab = 'front_office_features';
        $this->version = '0.0.1';
        //$this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Welcome to Dofa');
        $this->description = $this->l('Sveitaine');
        //$this->ps_versions_compliancy = array('min' => '1.7.2.0', 'max' => _PS_VERSION_);
    }

    public function install()
    {


        return parent::install()
            && $this->registerHook('displayReassurance')
            && $this->registerHook('actionFrontControllerSetMedia')
            && $this->createTables();
    }

    public function uninstall()
    {
        return parent::uninstall() && $this->deleteTables();
    }

    protected function createTables()
    {
        return (bool)Db::getInstance()->execute('
        CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'product_comments` (
        `id_comment` int(10) unsigned NOT NULL AUTO_INCREMENT,
        `id_product` int(255) NOT NULL,
        `username` varchar(255) NOT NULL,
        `email` varchar(255) NOT NULL,
        `phone_number` varchar(255) NOT NULL,
        `comment` varchar(255) NOT NULL,
        `star_rating` int(10)  NOT NULL,
        PRIMARY KEY (`id_comment`)
        ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=UTF8;');

    }

    public function hookDisplayReassurance()
    {

        $comment=Db::getInstance()->executeS('select * from  ps_product_comments where id_product='.Tools::getValue('id_product'));

        $this->context->smarty->assign(array(
            'commentSubmit'=>$this->context->link->getModuleLink($this->name, 'commentSubmit'),
            'comments'=>$comment,

        ));
        return
             $this->context->smarty->fetch('module:dofa/views/templates/front/form.tpl');



        // return $this->display(__FILE__,'pirmas.php');

    }

    public function hookActionFrontControllerSetMedia()
    {

        $this->context->controller->registerStylesheet('dofa-form', 'modules/dofa/views/css/form.css');
        $this->context->controller->registerJavascript('dofa-form', 'modules/dofa/views/css/form.css');
        $this->context->controller->registerStylesheet('dofa-form', 'modules/dofa/views/css/5star.css');
        $this->context->controller->registerJavascript('dofa-form', 'modules/dofa/views/css/5star.css');

    }

    public function getContent()

    {
        $controllerLink = Context::getContext()->link->getAdminLink('AdminDofaConfiguration');

        Tools::redirectAdmin($controllerLink);

    }


    public function getTabs()
    {
        return [
            [
                'name' => 'Dofa',
                'parent_class_name' => 'AdminParentModulesSf',
                'class_name' => 'AdminDofaParent',
                'visible' => false,
            ],
            [
                'name' => 'Configuration',
                'parent_class_name' => 'AdminDofaParent',
                'class_name' => 'AdminDofaConfiguration',
            ]
        ];
    }

    private function deleteTables()
    {
        return Db::getInstance()->execute(
            'DROP TABLE IF EXISTS ' . _DB_PREFIX_ . 'product_comments'
        );
    }


}
