<?php
class shop_bll{
    private $dao;
    private $db;
    static $_instance;

    private function __construct() {
        $this->dao = shop_DAO::getInstance();
        $this->db = Db::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function view_cars_shop_bll($arrArgument){
      return $this->dao->select_cars_shop($this->db, $arrArgument);
    }

    public function select_like_BLL($arrArgument){
        $arrArgument2 = $this->dao->select_user($this->db,$arrArgument['token']);
        return $this->dao->insert_like($this->db,$arrArgument2[0]['user'],$arrArgument["matricula"]);
        // return $this->dao->update_value($this->db,$arrArgument["chip"]);
    }
}
