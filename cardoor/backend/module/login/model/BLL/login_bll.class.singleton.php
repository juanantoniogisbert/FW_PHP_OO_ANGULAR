<?php
	class login_bll{
	    private $dao;
	    private $db;
	    static $_instance;

	    private function __construct() {
	        $this->dao = login_dao::getInstance();
	        $this->db = db::getInstance();
	    }

	    public static function getInstance() {
	        if (!(self::$_instance instanceof self)){
	            self::$_instance = new self();
	        }
	        return self::$_instance;
	    }
	    
	    public function insert_userp_BLL($arrArgument){
	      return $this->dao->insert_user_page($this->db,$arrArgument);
		}

		public function rid_social_BLL($arrArgument){
			return $this->dao->select_rid_social($this->db,$arrArgument);
		}
    }