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
        $this->name = 'Dofa';
        $this->author = 'Domantas ir Faustas';
        //$this->tab = 'front_office_features';
        $this->version = '0.0.1';
        //$this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Welcome to Dofa');
        $this->description = $this->l(
            'Sveitaine'
        );
        //$this->ps_versions_compliancy = array('min' => '1.7.2.0', 'max' => _PS_VERSION_);
    }

    public function install()
    {
        return parent::install() && $this->registerHook('DisplayHome') && $this->registerHook('displayAfterCarrier');
    }

    public function hookdisplayAfterCarrier()
    {
        return '<h1>kazkas</h1>';
    }

    public function hookDisplayHome()
    {
        return '<h1>Sveiki atvyke!!</h1>';
    }


}
