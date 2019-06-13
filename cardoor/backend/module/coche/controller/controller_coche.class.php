<?php
    class controller_coche {

        function __construct() {
            $_SESSION['module'] = "coche";
            include(FUNCTIONS_COCHE . "functions_coche.inc.php");
        }

        function create_coche(){
			// $info_data = json_decode($_POST['total_data'],true);
			// $response = validate_data_create($info_data,'create');

			$jsondata = array();
			$result=validate_data_create(json_decode($_POST['total_data'], true));

		  	$token = json_decode($_POST['total_data'],true);
		  	$id_user = loadModel(MODEL_COCHE,'coche_model', "creador", $token['token']);
		  
			// if (empty($_SESSION['result_dogpic'])){
			// 	$_SESSION['result_dogpic'] = array('result' => true, 'error' => "", "data" => "/1_Fw_PHP_OO_MVC_jQuery_AngularJS/AngularJS/4_adopt_dogs/backend/media/default_avatar.svg");
			// 	$result_dogpic = $_SESSION['result_dogpic'];
			// }else{
			// 	$result_dogpic = $_SESSION['result_dogpic'];
			// 	$result_dogpic['data'] = substr($_SESSION['result_dogpic']['data'],13);
			// }

			// && $result_dogpic['result'] posar en el if
			
			if($result['result']) {
				$arrArgument = array(
					'radiotipo' => $result['data']['radiotipo'],
					'matricula' => $result['data']['matricula'],
					'marca' => $result['data']['marca'],
					'modelo' => $result['data']['modelo'],
					'fabricante' => $result['data']['fabricante'],
					'color' => $result['data']['color'],
					'caballos' => $result['data']['caballos'],
					'paisC' => $result['data']['paisC'],
					'porvinC' => $result['data']['porvinC'],
					'poblaC' => $result['data']['poblaC'],
					// 'dogpic' => $result_dogpic['data'],
					// 'user' =>$id_user[0]['user']
				);
		
				$arrValue = false;
				$arrValue = loadModel(MODEL_COCHE,'coche_model', "insert_car", $arrArgument);
				if ($arrValue){
					$message = "El coche ha sido registrado correctamente";
				}else{
					$message = "El coche no se ha podido registar en base de datos";
				}
		
				$jsondata['coche'] = $arrArgument;
				$_SESSION['message'] = $message;
			  	$jsondata['success'] = true;
			  	// $jsondata['redirect']="../../dogs/result_dogs/";
		
				// unset($_SESSION['result_dogpic']);
				echo json_encode($jsondata);
			   	exit();
			}else{
				$jsondata['success'] = false;
				$jsondata['error'] = $result['error'];
				// $jsondata['error_pic'] = $result_dogpic['error'];
				echo json_encode($jsondata);
			}
        }

        function load_pais_p() {
			if ((isset($_GET["param"])) && ($_GET["param"] == true)) {
				$json = array();
				$url = 'http://localhost/www/FW_PHP_OO_ANGULAR/cardoor/backend/resources/ListOfCountryNamesByName.json';
				
				try {
					$json = loadModel(MODEL_COCHE,'coche_model', 'get_paises', $url);
				} catch (Exception $e) {
					$json = false;
				}

				if ($json) {
					echo $json;
					exit;
				} else {
					$json = "error";
					echo $json;
					exit;
				}
			}
		}

		function load_provincias() {
			// if ((isset($_GET["param"])) && ($_GET["param"] == true)) {
				$jsondata = array();
				$json = array();

					$json = loadModel(MODEL_COCHE,'coche_model', 'get_provincias');
	
				if ($json) {
					$jsondata["provincias"] = $json;
					echo json_encode($jsondata);
					exit;
				} else {
					$jsondata["provincias"] = "error";
					echo json_encode($jsondata);
					exit;
				}
			// }
		}

		function load_poblaciones() {
			if (isset($_POST['idPoblac'])) {
				$jsondata = array();
				$json = array();
	
				try {
					$json = loadModel(MODEL_COCHE,'coche_model', 'get_poblaciones', $_POST['idPoblac']);
				} catch (Exception $e) {
					$json = false;
				}
	
				if ($json) {
					$jsondata["poblaciones"] = $json;
					echo json_encode($jsondata);
					exit;
				} else {
					$jsondata["poblaciones"] = $_POST['idPoblac'];
					echo json_encode($jsondata);
					exit;
				}
			}
		}

		function select_car() {
			echo json_encode("hola");
		}

		function load_car_up() {
			$json = array();
			$json = loadModel(MODEL_COCHE,'coche_model', "car_up",$_GET['param']);
			echo json_encode($json);
		}
    }