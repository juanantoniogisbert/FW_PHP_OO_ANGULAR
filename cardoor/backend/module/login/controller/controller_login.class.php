<?php
    class controller_login {

        function __construct() {
            $_SESSION['module'] = "login";
            include(FUNCTIONS_LOGIN . "functions_login.inc.php");
        }

		function validate_register(){
			$info_data = json_decode($_POST['total_data'],true);
			$response = validate_data($info_data,'register');

			if ($response['result']) {
				$result['token'] = loadModel(MODEL_LOGIN,'login_model','insert_userp',$info_data);
				if ($result) {
					$result['type'] = 'alta';
					$result['inputEmail'] = $info_data['rmail'];
					$result['inputMessage'] = 'Para activar tu cuenta en cardoor pulse en el siguiente enlace';
					$result['success'] = true;
					enviar_email($result);
				}
				echo json_encode($result);
			}else{
				$jsondata['success'] = false;
		 		$jsondata['error'] = $response['error'];
 				header('HTTP/1.0 400 Bad error');
				echo json_encode($jsondata);
			}
		}

		function validate_login(){
			$info_data = json_decode($_POST['total_data'],true);
			$response = validate_data($info_data,'login');
			if ($response['result'] === true) {
				$data = loadModel(MODEL_LOGIN,'login_model','token_user',$info_data['lusername']);
				$data = $data[0];
				$data['success'] = true;
				echo json_encode($data);
			}else{
				$jsondata['success'] = false;
		 		$jsondata['error'] = $response['error'];
				echo json_encode($jsondata);
			}
		}

		function mail_rec_passwd(){
			$user_rpass = json_decode($_POST['recuser'],true);
			$result = validate_data($user_rpass,'rec_pass');
			if ($result['result']) {
				$result = loadModel(MODEL_LOGIN,'login_model','mail_rec_pass',$user_rpass);
				$result = $result[0];
				$result['token'] = $result['token'];
				$result['inputEmail'] = $result['email'];
				if ($result) {
					$result['type'] = 'modificacion';
					$result['inputMessage'] = 'Para recuperar tu contraseña en cardoor pulse en el siguiente enlace';
					enviar_email($result);
					$result['success'] = true;
					echo json_encode($result);
				}else{
					echo "error";
				}
			}else{
				$jsondata['success'] = false;
		 		$jsondata['error'] = $result['error'];
				echo json_encode($jsondata);
			}
		}

		function u_passwd(){
			$pass_data = json_decode($_POST['rec_pass'],true);
			if ($pass_data) {
				$result = loadModel(MODEL_LOGIN,'login_model','update_pass',$pass_data);
				echo json_encode($result);
			}else{
				$jsondata = false;
				echo json_encode($jsondata);	
			}
		}

		
		function social_login(){
			$usersocial = social_user();
			echo json_encode($usersocial);
			exit;
		}

		function print_user(){
			$dogs = array();
			$result = loadModel(MODEL_LOGIN,'login_model','print_user',$_GET['param']);
			// $result['dog'] = loadModel(MODEL_LOGIN,'login_model','print_dog',$result[0]['IDuser']);
			// $chips = loadModel(MODEL_LOGIN,'login_model','print_adoption',$result[0]['IDuser']);
			// foreach ($chips as $value) {
			// 	$dog = loadModel(MODEL_LOGIN,'login_model','print_dog',$value['dog']);
			// 	array_push($dogs, $dog[0]);
			// }
			$result['adoptions'] = $dogs;
			echo json_encode($result);
		}

		function datasocial() {
			$hola = data_social_user();
			$data = json_decode(json_encode($hola), true);
			$id = explode("|", $data[sub]);

			$red = $id[0];
			$id = $id[1];
			$array = exist_user('S_'.$data[nickname]);
			$_SESSION['avatar']=$data['picture'];
			if(!$array) {
				if($red === "github") {
					$arrArgument = array(
						'id'=> $id,
						'email'=>$data['name'],
						'user'=>'S_'.$data['nickname'],
						'avatar'=>$data['picture']
					);
					$result = loadModel(MODEL_LOGIN,'login_model','insert_social',$arrArgument);
					$tokenlog = loadModel(MODEL_LOGIN,'login_model','token_user','S_'.$data[nickname]);
					$url = SITE_PATH_B . "#/home/$tokenlog";
					redirect($url);
				}else{
					$arrArgument = array(
						'id'=> $id,
						'email'=>$data['name'],
						'user'=>$data['nickname'].'@gmail.com',
						'avatar'=>$data['picture']
					);
					$result = loadModel(MODEL_LOGIN,'login_model','insert_social',$arrArgument);
					$tokenlog = loadModel(MODEL_LOGIN,'login_model','token_user','S_'.$data[nickname]);
					$url = SITE_PATH_B . "#/home/$tokenlog";
					redirect($url);
				}
			}else{
				$tokenlog = loadModel(MODEL_LOGIN,'login_model','token_user','S_'.$data[nickname]);
				$tokenlog = $tokenlog[0][tokenlog];
				$caca =  $tokenlog;
				$url = SITE_PATH_B . "#/home/$caca";
				redirect($url);
				
			}
		}

		function user_log(){
			$result = loadModel(MODEL_LOGIN,'login_model','userType',$_GET['param']);
			if ($result) {
				echo json_encode($result[0]);
			}else{
				echo json_encode(false);
			}
		}

		function change_profile(){
			$prof_data = json_decode($_POST['prof_data'],true);
			$result = validate_data($prof_data,'uprofile');
			$foto = "http://localhost/www/FW_PHP_OO_ANGULAR/".substr($_SESSION['avatar']['data'],67);
			if ($result['result']) {
				$arrArgument = array(
					'nombreP'=> $prof_data['nombreP'],
					'apellidoP'=>$prof_data['apellidoP'],
					'user'=>$prof_data['user'],
					'paisP'=>$prof_data['paisP'],
					'porvinP'=>$prof_data['porvinP'],
					'poblaP'=>$prof_data['poblaP'],
					'avatar'=>$foto
				);
				echo json_encode($arrArgument);
				exit;
				$result = loadModel(MODEL_LOGIN,'login_model','modify_user',$arrArgument);
				$jsondata['success'] = $result;
				echo json_encode($jsondata);
			}else{
				$jsondata['success'] = false;
		 		$jsondata['error'] = $result['error'];
				echo json_encode($jsondata);	
			}
		}

		function upload_avatar(){
			$res_avatar = upload_files();
			$_SESSION['avatar'] = $res_avatar;
			echo json_encode($res_avatar);
	  	}

	  	function delete_avatar(){
			unset($_SESSION['avatar']);
			$result = remove_files();
			if($result === true){
				echo json_encode(array("res" => true));
			}else{
				echo json_encode(array("res" => false));
			}
		}
		  
		function change_avatar(){
        	if (isset($_SESSION['avatar'])) {
				$url['data'] = substr($_SESSION['avatar']['data'],13);
        		$url['user'] = $_POST['auser'];
        		unset($_SESSION['avatar']);
        		$result = loadModel(MODEL_LOGIN,'login_model','u_avatar',$url);
        		echo $result;
        	}
        }

		function load_pais_p() {
			if ((isset($_GET["param"])) && ($_GET["param"] == true)) {
				$json = array();
				$url = 'http://localhost/www/FW_PHP_OO_ANGULAR/cardoor/backend/resources/ListOfCountryNamesByName.json';
				
				try {
					$json = loadModel(MODEL_LOGIN, 'login_model', 'get_paises', $url);
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

					$json = loadModel(MODEL_LOGIN, 'login_model', 'get_provincias');
	
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
					$json = loadModel(MODEL_LOGIN, 'login_model', 'get_poblaciones', $_POST['idPoblac']);
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
    }
