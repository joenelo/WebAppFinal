<?php

//====== define database credentials=====//
DEFINE ("DBCREDENTIALS","dbCredentials.ini");
abstract class AbstractModel {
    public $dbhost = "";
    public $dbusername = "";
    public $dbpassword = "";
    public $dbname = "";
    public $ini_array;

    public function AbstractModel($form) {
        $this->form = $form;
        $this->initialize();
    }

    // stores user form information in a names array
    // can be used to validate date from forms and
    // process business logic of our forms
    protected $form = array();

    // returns the form for binding to session in controller
    public function GetForm ()
    {
        return $this->form;
    }

    public function GetFormData ($key) {
        return $this->form[$key];
    }


    // **** Exposes form information to public **** //
    public function SetFormData ($key, $value) {
        $this->form[$key]=$value;

    }

    // ***** load dbLoginCredentials.ini **** //
    public function initialize (){

            $this->ini_array = parse_ini_file(DBCREDENTIALS, true);
            $this->dbhost = $this->ini_array["DATABASE"]["dbhost"];
            $this->dbusername = $this->ini_array["DATABASE"]["dbusername"];
            $this->dbpassword = $this->ini_array["DATABASE"]["dbpassword"];
            $this->dbname = $this->ini_array["DATABASE"]["dbname"];
    }

    // === Generic function to return specific settings from the dbLoginCredentials.ini file ===//
    public function getSetting($section, $name){

        return $this->ini_array[$section][$name];
    }

    public function getDBHost () {
            return $this->dbhost;
    }
    public function getDBUserName () {
            return $this->dbusername;
    }
    public function getDBPassword () {
            return $this->dbpassword;
    }
    public function getDBName () {
            return $this->dbname;
    }

}
