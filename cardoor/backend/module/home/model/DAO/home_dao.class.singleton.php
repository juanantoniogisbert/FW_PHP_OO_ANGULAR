<?php
class home_DAO {
  static $_instance;
  private function __construct() {
  }

  public static function getInstance() {
    if(!(self::$_instance instanceof self)){
      self::$_instance = new self();
    }
    return self::$_instance;
  }

  public function obtenertipo($db){
    $sql = "SELECT DISTINCT tipo FROM coches";
    $res = $db->ejecutar($sql);
    return $db->listar($res);
  }

  public function obtenergama($db, $tipo) {
    $sql = "SELECT DISTINCT gama FROM coches WHERE tipo = '$tipo'";
    $res = $db->ejecutar($sql);
    return $db->listar($res);
  }

  public function autocomplete($db, $tipo, $gama, $marca){
    $search = $_POST['service'];
    $sql = "SELECT tipo, gama, marca, id FROM coches WHERE tipo = '$tipo' AND gama='$gama' AND marca LIKE '".$search."%' GROUP BY id";
    $res = $db->ejecutar($sql);
    return $db->listar($res);
  }

  public function listautocomplete($db, $tipo, $gama, $marca){
    $sql = "SELECT DISTINCT * FROM coches WHERE tipo= '$tipo' AND gama= '$gama' AND marca= '$marca'";
    $res = $db->ejecutar($sql);
    return $db->listar($res);
  }
    
  public function select_all_cars_DAO($db){
    $sql = "SELECT * FROM coches";
    $res = $db->ejecutar($sql);
    return $db->listar($res);
  }

  public function select_cars($db, $matricula){
    $sql = "SELECT * FROM coches WHERE matricula='$matricula'";
    $res = $db->ejecutar($sql);
    return $db->listar($res);
  }

  public function select_more_cars($db, $arrArgument) {
    $sql = "SELECT * FROM coches";
    $res = $db->ejecutar($sql);
    return $db->listar($res);
  }

  public function select_load_car_name($db) {
    $sql = "SELECT DISTINCT marca FROM coches";
    $res = $db->ejecutar($sql);
    return $db->listar($res);
  }

  public function select_name_car_auto($db,$arrArgument) {
    $sql = "SELECT DISTINCT marca FROM coches";
    $res = $db->ejecutar($sql);
    return $db->listar($res);
  }
}