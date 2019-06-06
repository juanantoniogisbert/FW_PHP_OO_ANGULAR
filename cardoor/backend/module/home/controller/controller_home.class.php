<?php
    //include("module/cars/model/DAOCars.php");
    class controller_home {

        function __construct() {
            $_SESSION['module'] = "home";
        }

        function more_cars() {
            $json = array();
            $json = loadModel(MODEL_HOME, "home_model", "more_cars_home");
            echo json_encode($json);
        }

        function select_name_car_auto() {
            $json = array();
            $json = loadModel(MODEL_HOME, "home_model", "select_name_car_auto", "");
            echo json_encode($json);
		}
	    

        function load_car_name(){
            $json = array();
            $json = loadModel(MODEL_HOME, "home_model", "load_car_name", $_GET['param']);
            echo json_encode($json);
        }

        function active_user(){
	    	$token = json_decode($_POST['token'],true);
    		loadModel(MODEL_HOME, "home_model", "active_user",$token['token']);
    		echo json_encode($token);
		}
        
        function list_details(){
			$json = array();
		 	$json = loadModel(MODEL_HOME, "home_model", "obtain_details",$_POST['id']);
		 	echo json_encode($json);
	    }
        
    }