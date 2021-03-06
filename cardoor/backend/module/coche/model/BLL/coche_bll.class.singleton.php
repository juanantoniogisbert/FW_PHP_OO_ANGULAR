<?php
	class coche_bll{
	   	private $dao;
	   	private $db;
		static $_instance;

		private function __construct() {
			$this->dao = coche_dao::getInstance();
			$this->db = db::getInstance();
		}

		public static function getInstance() {
			if (!(self::$_instance instanceof self)){
				self::$_instance = new self();
			}
			return self::$_instance;
		}
		
		public function insert_car_BLL($arrArgument){
			return $this->dao->insert_car_dao($this->db,$arrArgument);
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

		public function creador_BLL($arrArgument){
			return $this->dao->select_creador($this->db, $arrArgument);
		}

		public function car_up_BLL(){
			return $this->dao->select_car_up($this->db);
		}

		public function car_update_BLL($arrArgument){
			return $this->dao->select_car_update($this->db, $arrArgument);
		}

		public function modify_car_BLL($arrArgument){
			return $this->dao->update_car($this->db,$arrArgument);
		}

		public function obtain_details_BLL($arrArgument){
			return $this->dao->select_details($this->db,$arrArgument);
		}

		public function del_car_BLL($arrArgument){
			return $this->dao->del_car_dao($this->db,$arrArgument);
		}
    }