<?php
    class login_model {
        private $bll;
        static $_instance;
    
        private function __construct() {
            $this->bll = login_bll::getInstance();
        }
    
        public static function getInstance() {
            if (!(self::$_instance instanceof self)){
                self::$_instance = new self();
            }
            return self::$_instance;
        }
        
        public function insert_userp($arrArgument){
            return $this->bll->insert_userp_BLL($arrArgument);
        }
        
        public function rid_social($arrArgument){
            return $this->bll->rid_social_BLL($arrArgument);
        }

        public function data_social($arrArgument){
            return $this->bll->data_social_BLL($arrArgument);
        }

        public function select_token($arrArgument){
            return $this->bll->select_token_BLL($arrArgument);
        }
    }