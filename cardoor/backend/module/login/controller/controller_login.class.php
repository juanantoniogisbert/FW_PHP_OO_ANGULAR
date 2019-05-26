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
				$data['token_valid'] = loadModel(MODEL_LOGIN,'login_model','token_user', 'update_token',$info_data['lusername']);
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

		function datasocial(){
			$data = data_social_user();
			echo json_encode($data);
			exit;
		}
    }
