<?php
class controller_shop {

    function __construct() {
        $_SESSION['module'] = "shop";
    }

    function view_cars_shop() {
        $json = array();
        $json = loadModel(MODEL_SHOP, "shop_model", "view_cars_shop");
        echo json_encode($json);
    }
        
    // function search_shop(){

    // }

    function like_car(){
        $info = json_decode($_POST["all_info"],true);
        $json = loadModel(MODEL_SHOP, "shop_model", "select_like",$info);
        echo json_encode($info);
    }
  
}