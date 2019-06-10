<?php
	class shop_DAO{
		static $_instance;
		private function __construct() {
		}
	  
		public static function getInstance() {
		  if(!(self::$_instance instanceof self)){
			self::$_instance = new self();
		  }
		  return self::$_instance;
		}

		function select_cars_shop($db){
			$sql = "SELECT * FROM coches";
			$res = $db->ejecutar($sql);
			return $db->listar($res);
		}

		public function select_user($db,$arrArgument) {
			$sql = "SELECT user FROM users WHERE tokenlog = '$arrArgument'";
			$res = $db->ejecutar($sql);
			return $db->listar($res);
			// return $sql;
		}

		public function insert_like($db,$arrArgument,$arrArgument2) {
			$token = md5(uniqid(rand(),true));
			$sql = "INSERT INTO like_car (token, user, mat_car) VALUES ('$token','$arrArgument','$arrArgument2')";
			return $db->ejecutar($sql);
		}

		public function select_details($db,$arrArgument) {
			$sql = "SELECT * FROM coches WHERE id = '$arrArgument'";
			$stmt = $db->ejecutar($sql);
			return $db->listar($stmt);
		}

		public function select_car($db,$arrArgument) {
			$sql = "SELECT * FROM coches WHERE marca = '$arrArgument'";
			$stmt = $db->ejecutar($sql);
			return $db->listar($stmt);
		}
	}