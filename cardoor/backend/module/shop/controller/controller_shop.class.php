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
        
    function list_details(){
        $json = array();
        $json = loadModel(MODEL_SHOP, "shop_model", "obtain_details",$_POST['id']);
        echo json_encode($json);
    }

    function like_car(){
        $info = json_decode($_POST["all_info"],true);
        $json = loadModel(MODEL_SHOP, "shop_model", "select_like",$info);
        echo json_encode($info);
    }

    function view_search(){
        $json = array();
        $json = loadModel(MODEL_SHOP, "shop_model", "car_search",$_GET['param']);
        echo json_encode($json);
    }
}