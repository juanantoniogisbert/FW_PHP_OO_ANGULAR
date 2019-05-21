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
			if ($response['result']) {
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
		
		function social_login(){
			$data_social = json_decode($_POST['data_social_net'],true);
			$result = loadModel(MODEL_LOGIN,'login_model','rid_social',$data_social['id_user']);
			if (!$result) {
				$json = loadModel(MODEL_LOGIN,'login_model','data_social',$data_social);
			}else{
				$json = 'Registrado';
			}
			$data = loadModel(MODEL_LOGIN,'login_model','select_token',$data_social['id_user']);
			$data = $data[0];
			echo json_encode($data['tokenlog']);
		}
    }
