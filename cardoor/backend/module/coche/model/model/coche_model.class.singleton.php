<?php
    class coche_model {
        private $bll;
        static $_instance;
    
        private function __construct() {
            $this->bll = coche_bll::getInstance();
        }
    
        public static function getInstance() {
            if (!(self::$_instance instanceof self)){
                self::$_instance = new self();
            }
            return self::$_instance;
        }
        
        public function insert_car($arrArgument){
            return $this->bll->insert_car_BLL($arrArgument);
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

        public function creador($arrArgument){
            return $this->bll->creador_BLL($arrArgument);
        }

        public function car_up(){
            return $this->bll->car_up_BLL();
        }

        public function car_update($arrArgument){
            return $this->bll->car_update_BLL($arrArgument);
        }

        public function modify_car($arrArgument){
            return $this->bll->modify_car_BLL($arrArgument);
        }

        public function obtain_details($arrArgument){
            return $this->bll->obtain_details_BLL($arrArgument);
        }

        public function del_car($arrArgument){
            return $this->bll->del_car_BLL($arrArgument);
        }
    }