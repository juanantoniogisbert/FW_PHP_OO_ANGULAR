<?php
class home_bll{
    private $dao;
    private $db;
    static $_instance;

    private function __construct() {
        $this->dao = home_DAO::getInstance();
        $this->db = Db::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function home_bll($arrArgument){
      return $this->dao->home_dao($this->db, $arrArgument);
    }

    public function select_all_cars_BLL(){
      return $this->dao->select_all_cars_DAO($this->db);
    }

    public function more_cars_home_BLL($arrArgument){
      return $this->dao->select_more_cars($this->db,$arrArgument);
    }

    public function load_car_name_BLL(){
      return $this->dao->select_load_car_name($this->db);
    }
    public function select_name_car_auto_BLL($arrArgument){
      return $this->dao->select_name_car_auto($this->db,$arrArgument);
    }
}
