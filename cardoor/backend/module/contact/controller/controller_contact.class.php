<?php
	class controller_contact {
		function __construct(){
			$_SESSION['module'] = "contact";
		}
		
		function send_cont(){
				$arrArgument = array(
					'type' => 'contact',
					'token' => '',
					'inputName' => $_POST['fullname'],
					'inputEmail' => $_POST['correo'],
					'inputMessage' => $_POST['message']
				);

				try{
					$json = enviar_email($arrArgument);
					echo "true";
				} catch (Exception $e) {
					echo "false";
				}

				$arrArgument = array(
					'type' => 'admin',
					'token' => '',
					'inputName' => $_POST['fullname'],
					'inputEmail' => $_POST['correo'],
					'inputMessage' => $_POST['message']
				);

				try{
					$json = enviar_email($arrArgument);
				} catch (Exception $e) {
				}
		}

	}
