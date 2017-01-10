<?php

if (!defined('_PS_VERSION_'))
    exit;

class OpeningHours extends Module {

    // Constructeur du module
    public function __construct() {
        $this->name = "openinghours";
        $this->tab = 'front_office_test';
        $this->version = '1.0';
        $this->author = "lulu";
        $this->need_instance = 0;
        $this->ps_versions_compliancy = array('min' => '1.5', 'max' => _PS_VERSION_);

        parent::__construct();

        $this->displayName = $this->l('RockModule');
        $this->description = $this->l('This module can be use to tag the opening hours on your website');
        $this->confirmUninstall = $this->l('Are you sure you want to uninstall ?');
        if (!Configuration::get('MYMODULE_NAME'))
            $this->warning = $this->l('No name provided');
    }
    
    //Installe le module et génère en même temps la table "ps_opening_hours".
    public function install() {
        if (Shop::isFeatureActive())
            Shop::setContext(Shop::CONTEXTE_ALL);
        
        //Création de la table
        $sql = 'CREATE TABLE ' . _DB_PREFIX_ .'opening_hours (
                    `Day` varchar(20) NOT NULL,
                    `Beginning` varchar(12) NOT NULL,
                    `Ending` varchar(12) NOT NULL
                    ) ENGINE=InnoDB DEFAULT CHARSET=latin1';
        $createTable = Db::getInstance()->execute($sql);
        
        //Si la table est bien créée, insert les données dedans
        if ($createTable){
            $sql = "INSERT INTO " . _DB_PREFIX_ ."opening_hours (`Day`, `Beginning`, `Ending`) VALUES
                                ('Lundi', '8h30', '19h00'),
                                ('Mardi', '8h30', '19h00'),
                                ('Mercredi', '8h30', '19h00'),
                                ('Jeudi', '8h30', '19h00'),
                                ('Vendredi', '8h30', '21h00'),
                                ('Samedi', '10h30', '21h00'),
                                ('Dimanche', '', '')";
        $insertTable = Db::getInstance()->execute($sql);
        }            
        
        //Rattache aux hooks Header & Nav et renvoie un booléen pour savoir si la table a bien été créée
        //si toutes les conditions sont remplies, renvoie "Module installé avec succès", sinon : message d'érreur
        return parent::install() &&
                $this->registerHook('nav') &&
                $this->registerHook('header') &&
                $createTable &&
                Configuration::updateValue('MYMODULE_NAME', 'my friend');
    }
    
    //Désinstalle le module et supprime la table "ps_opening_hours" de la BDD
    public function uninstall() {
        $sql = 'DROP TABLE  ' . _DB_PREFIX_ .'opening_hours';
        $dropTable = Db::getInstance()->execute($sql);
        
        return parent::uninstall() && Configuration::deleteByName('MYMODULE_NAME')
                &&   $dropTable;
    }

    //Permet de rattacher le module à la barre de navigation
    public function hookDisplayNav() {
        $sql = 'SELECT * FROM ' . _DB_PREFIX_ . 'opening_hours';
        $openingHours = Db::getInstance()->executeS($sql);
        $this->context->smarty->assign('openingHours', $openingHours);

        return $this->display(__FILE__, 'openinghours.tpl');
    }
    
    //insert le css dans la balise Head du document HTML ==> Ne marche pas pour le moment : cause incompréhensible...
    public function hookDisplayHeader() {
        $this->context->controller->addCSS($this->_path . 'css/openinghours.css', 'all');
    }
    
    //Fonction permettant de lancer la configuration depuis le back office ==> à configurer en ajoutant un formulaire
    //permettant de modifier les horaires d'ouverture dans la base de données
    public function getContent() {        
    }

}
