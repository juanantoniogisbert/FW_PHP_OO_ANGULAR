<?php
class shop_model {
    private $bll;
    static $_instance;

    private function __construct() {
        $this->bll = shop_bll::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function view_cars_shop($arrArgument) {
        return $this->bll->view_cars_shop_bll($arrArgument);
    }

    public function select_like($arrArgument){
        return $this->bll->select_like_BLL($arrArgument);
    }

    public function obtain_details($arrArgument){
        return $this->bll->obtain_details_BLL($arrArgument);
    }

    public function car_search($arrArgument){
        return $this->bll->car_search_BLL($arrArgument);
    }
}
