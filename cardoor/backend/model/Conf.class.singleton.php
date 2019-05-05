<?php
	$path=$_SERVER['DOCUMENT_ROOT'].'/www/FW_PHP_OO_MVC_JQUERY_NEW/cardoor/';
    define('SITE_ROOT', $path);
    define('MODEL_PATH',SITE_ROOT.'model/');

    class Conf {
        private $userdb;
        private $passdb;
        private $hostdb;
        private $db;
        static $instance;

        private function __construct() {
            $cnfg = parse_ini_file(MODEL_PATH."db.ini");
            $this->userdb = $cnfg['user'];
            $this->passdb = $cnfg['password'];
            $this->hostdb = $cnfg['host'];
            $this->db = $cnfg['db'];
        }

        private function __clone() {
        }

        public static function getInstance() {
            if (!(self::$instance instanceof self))
                self::$instance = new self();
                return self::$instance;
        }

        public function __get($property) {
            if (property_exists($this, $property)) {
                return $this->$property;
            }
        }
    }