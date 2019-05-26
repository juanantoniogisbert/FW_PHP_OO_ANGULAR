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

        public function token_user($arrArgument){
            return $this->bll->token_user_BLL($arrArgument);
        }

        public function exist_user($arrArgument){
            return $this->bll->exist_user_BLL($arrArgument);
        }

        public function update_token($arrArgument){
            return $this->bll->update_token_BLL($arrArgument);
        }

        public function mail_rec_pass($arrArgument){
            return $this->bll->mail_rec_pass_BLL($arrArgument);
        }

        public function update_pass($arrArgument){
            return $this->bll->update_pass_BLL($arrArgument);
        }
    }