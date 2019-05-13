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
        
            
        //     case 'like':
        //     $datos = json_decode($_POST['data']);
        //     $daoshop = new DAOShop();
        //     $rdo = $daoshop->insert($datos);
        //     if ($rdo == true){
        //         echo json_encode("TODO_OK");
        //         exit();
        //     }else{
        //         echo json_encode("error");
        //         exit();
        //     }
        //     break;
            
        //     case 'details':
        //     try {
        //         $daoshop = new DAOShop();
        //         $res = $daoshop->select_cars_details($_SESSION['id']);
        //         $datos = get_object_vars($res);
        //     } catch (Exception $e) {
        //         echo json_encode("error1");
        //     }
            
        //     if (!$res) {
        //         echo json_encode("error2");
        //     }else{
        //         echo json_encode($res);
        //         exit();
        //     }
        //     break;
            
        // case 'details2':
        // $_SESSION['id']=$_GET['id'];
        // include("module/shop/view/details_shop.html");
        // break;
}