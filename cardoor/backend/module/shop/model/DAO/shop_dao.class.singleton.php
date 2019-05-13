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

		// function select_cars($matricula){
		// 	$sql = "SELECT * FROM coches WHERE matricula='$matricula'";
		// 	$res = $db->ejecutar($sql);
		// 	return $db->listar($res);
		// }

		// function select_cars_details($id){
		// 	$sql = "SELECT * FROM coches WHERE id='$id'";
		// 	$res = $db->ejecutar($sql);
		// 	return $db->listar($res);
		// }
	}