<?php
class home_model {
    private $bll;
    static $_instance;

    private function __construct() {
        $this->bll = home_bll::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function home($arrArgument) {
        return $this->bll->home_bll($arrArgument);
    }
    
    public function select_all_cars(){
        return $this->bll->select_all_cars_BLL();
    }

    public function more_cars_home($arrArgument){
        return $this->bll->more_cars_home_BLL($arrArgument);
    }

    public function load_car_name(){
        return $this->bll->load_car_name_BLL();
    }

    public function select_name_car_auto($arrArgument){
        return $this->bll->select_name_car_auto_BLL($arrArgument);
    }

}
