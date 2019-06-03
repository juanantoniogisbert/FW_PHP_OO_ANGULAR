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

        public function print_user($arrArgument){
            return $this->bll->print_user_BLL($arrArgument);
        }

        public function insert_social($arrArgument){
            return $this->bll->insert_social_BLL($arrArgument);
        }

        public function userType($arrArgument){
            return $this->bll->userType_BLL($arrArgument);
        }

        public function modify_user($arrArgument){
            return $this->bll->modify_user_BLL($arrArgument);
        }

        public function get_paises($url) {
            return $this->bll->get_paises_BLL($url);
        }

        public function get_provincias($url) {
            return $this->bll->get_provincias_BLL($url);
        }

        public function get_poblaciones($url) {
            return $this->bll->get_poblaciones_BLL($url);
        }

        public function u_avatar($arrArgument){
            return $this->bll->u_avatar_BLL($arrArgument);
        }
    }