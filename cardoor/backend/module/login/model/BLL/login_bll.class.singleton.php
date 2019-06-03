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
		
		public function token_user_BLL($arrArgument){
			// $this->dao->update_token($this->db,$arrArgument);
			return $this->dao->select_token($this->db,$arrArgument);
		}

		public function exist_user_BLL($arrArgument){
			return $this->dao->select_exist_user($this->db,$arrArgument);
		}
		public function update_token_BLL($arrArgument){
			return $this->dao->update_token($this->db,$arrArgument);
		}

		public function mail_rec_pass_BLL($arrArgument){
			return $this->dao->select_mail_rec_pass($this->db,$arrArgument);
		}

		public function update_pass_BLL($arrArgument){
			return $this->dao->update_password($this->db,$arrArgument);
		}

		public function print_user_BLL($arrArgument){
			return $this->dao->select_print_user($this->db,$arrArgument);
		}

		public function insert_social_BLL($arrArgument){
            return $this->dao->insert_user_social($this->db,$arrArgument);
		}
		
		public function userType_BLL($arrArgument){
			return $this->dao->select_userType($this->db,$arrArgument);
		}

		public function modify_user_BLL($arrArgument){
			return $this->dao->update_user($this->db,$arrArgument);
		}

		public function get_paises_BLL($url) {
            return $this->dao->obtain_paises($url);
		}
		
		public function get_provincias_BLL($url) {
            return $this->dao->obtain_provincias($url);
		}
		
		public function get_poblaciones_BLL($url) {
            return $this->dao->obtain_poblaciones($url);
		}
		
		public function u_avatar_BLL($arrArgument){
			return $this->dao->update_avatar($this->db,$arrArgument);
		}
    }