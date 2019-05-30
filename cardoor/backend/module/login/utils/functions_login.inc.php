<?php
	// require 'http://localhost/www/FW_PHP_OO_ANGULAR/cardoor/backend/module/login/utils/auth0/vendor/autoload.php';
	require SITE_ROOT . 'module/login/utils/auth0/vendor/autoload.php';
	use Auth0\SDK\Auth0;

	function validate_data($data,$value){
		$error = array();
	    $valid = true;

		if ($value === 'login') {
			$filter = array(
		        'lusername' => array(
		            'filter' => FILTER_VALIDATE_REGEXP,
		            'options' => array('regexp' => '/[a-zA-z_.]{3,21}/')
		        ),
		        'lpasswd' => array(
		            'filter' => FILTER_VALIDATE_REGEXP,
		            'options' => array('regexp' => '/[a-zA-z0-9@-_.,~ñ]{6,50}/')
		        ),
		    );
		    $result = filter_var_array($data, $filter);
		    $data = exist_user($result['lusername']);
	    	$data = $data[0];
	    	$activate = $data['activate'];
	    	$password = $data['password'];
		    if ($result != null && $result){
		        if(!$result['lusername']){
		            $error['lusername'] = "El formato del usuario es incorrecto";
		            $valid = false;
		        }
		        elseif(!$data){
		            $error['lusername'] = "El usuario añadido no coincide con nuestros datos";
		            $valid = false;
		        }
				elseif(!password_verify($result['lpasswd'],$password)){
		            $error['lpasswd'] = "Contraseña incorrecta";
		            $valid = false;
		        }
		        if($activate != 0){
		            $error['lusername'] = "Tienes que verificar el correo";
		            $valid = false;
		        }
		    } else {
		        $valid = false;
		    }
		    return $return = array('result' => $valid,'error' => $error, 'data' => $result);
		    
		}elseif($value === 'register'){
			$filter = array(
		        'rusername' => array(
		            'filter' => FILTER_VALIDATE_REGEXP,
		            'options' => array('regexp' => '/[a-zA-z_.]{3,21}/')
		        ),
		        'rmail' => array(
		            'filter' => FILTER_VALIDATE_REGEXP,
		            'options' => array('regexp' => '/^^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/')
		        ),
		        'rpasswd' => array(
		            'filter' => FILTER_VALIDATE_REGEXP,
		            'options' => array('regexp' => '/[a-zA-z0-9@-_.,~ñ]{6,50}/')
		        )
		    );
		    $result = filter_var_array($data, $filter);
		    if ($result != null && $result){
		        if(!$result['rusername']){
		            $error['rusername'] = "El usuario tiene que estar entre 2 y 20 caracteres";
		            $valid = false;
		        }
		        if(!$result['rmail']){
		            $error['rmail'] = "El formato del email es incorrecto";
		            $valid = false;
		        }
		        if(!$result['rpasswd']){
		            $error['rpasswd'] = "El formato de la contraseña es incorrecta";
		            $valid = false;
		        }
		       	if(exist_user($result['rusername'])){
		            $error['rusername'] = "El usuario ya existe";
		            $valid = false;
		        }
		    } else {
		        $valid = false;
		    };
		    return $return = array('result' => $valid,'error' => $error, 'data' => $result);
			
		}elseif($value === 'uprofile'){
			$filter = array(
		        'nombreP' => array(
		            'filter' => FILTER_VALIDATE_REGEXP,
		            'options' => array('regexp' => '/[a-zA-z]{3,21}/')
		        ),
		        'apellidoP' => array(
		            'filter' => FILTER_VALIDATE_REGEXP,
		            'options' => array('regexp' => '/[a-zA-z ]{3,21}/')
		        ),
		        'fnacP' => array(
		            'filter' => FILTER_VALIDATE_REGEXP,
		            'options' => array('regexp' => '/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/')
		        ),
		    );
		    $result = filter_var_array($data, $filter);
		    if ($result != null && $result){
		        if(!$result['nombreP']){
		            $error['nombreP'] = "El nombre tiene que estar entre 2 y 20 caracteres";
		            $valid = false;
		        }
		        if(!$result['apellidoP']){
		            $error['apellidoP'] = "El apellido tiene que estar entre 2 y 20 caracteres";
		            $valid = false;
		        }
		        if(validate_birth($result['fnacP'])){
		            $error['fnacP'] = "Tienes que ser mayor de 18 años";
		            $valid = false;
		        }
		    } else {
		        $valid = false;
		    };
		    return $return = array('result' => $valid,'error' => $error, 'data' => $result);

		}elseif($value === 'rec_pass'){
		        if(!exist_user($data)){
		            $error['recuser'] = "El usuario no existe";
		            $valid = false;
		        }
		    return $return = array('result' => $valid,'error' => $error, 'data' => $result);
		    
		}elseif($value === 'rec_passwd'){
			$filter = array(
		        'recpass' => array(
		            'filter' => FILTER_VALIDATE_REGEXP,
		            'options' => array('regexp' => '/[a-zA-z0-9@-_.,~ñ]{6,50}/')
		        ),
		        'recpassr' => array(
		            'filter' => FILTER_VALIDATE_REGEXP,
		            'options' => array('regexp' => '/[a-zA-z0-9@-_.,~ñ]{6,50}/')
		        ),
		    );
		    
		    $result = filter_var_array($data, $filter);
		    if ($result != null && $result){
		        if(!$result['recpass']){
		            $error['recpass'] = "El formato de la contraseña es incorrecta";
		            $valid = false;
		        }
		        if(!$result['recpassr']){
		            $error['recpassr'] = "El formato de la contraseña es incorrecta";
		            $valid = false;
		        }
		        if($result['recpass'] != $result['recpassr']){
		            $error['recpassr'] = "Las contraseñas no coinciden";
		            $valid = false;
		        }
		    } else {
		        $valid = false;
		    };
		    return $return = array('result' => $valid,'error' => $error, 'data' => $result);
		}
	}

	function exist_user($user){
		return loadModel(MODEL_LOGIN,'login_model','exist_user',$user);
	}

	function validate_birth($date){
		$thisdate = getdate();
		$resultado = strtotime($thisdate['mon'] . "/" . $thisdate['mday'] . "/" . $thisdate['year']) - strtotime($date);
		$oper=$resultado/(60*60*24);
		if($oper < 5844){
			return  true;
		} else{
			return false;
		}
	}

	function generate_Token_secure($longitud){
        if ($longitud < 10) {
            $longitud = 10;
        }
        return bin2hex(openssl_random_pseudo_bytes(($longitud - ($longitud % 2)) / 2));
	}
	
	function social_user(){
		$domain        = 'juagisla.eu.auth0.com';
		$client_id     = 'sfxhvAtO4jsHzk80Ct5HGspSKlfvR6Kh';
		$client_secret = 'Zujut4ck5ehhy4A8J4vHUSujniSXWPmcjEG4J27Nr1XYixptIaBiwxiKpVmSYM56';
		$redirect_uri  = 'http://localhost/www/FW_PHP_OO_ANGULAR/cardoor/backend/index.php?module=login&function=datasocial';
		$audience      = 'https://' . 'juagisla.eu.auth0.com' . '/userinfo';

		$auth0 = new Auth0([
			'domain' => $domain,
			'client_id' => $client_id,
			'client_secret' => $client_secret,
			'redirect_uri' => $redirect_uri,
			'audience' => $audience,
			'scope' => 'openid profile',
			'persist_id_token' => true,
			'persist_access_token' => true,
			'persist_refresh_token' => true
		]);

		$auth0->login();
	}

	function data_social_user(){
		$domain        = 'juagisla.eu.auth0.com';
		$client_id     = 'sfxhvAtO4jsHzk80Ct5HGspSKlfvR6Kh';
		$client_secret = 'Zujut4ck5ehhy4A8J4vHUSujniSXWPmcjEG4J27Nr1XYixptIaBiwxiKpVmSYM56';
		$redirect_uri  = 'http://localhost/www/FW_PHP_OO_ANGULAR/cardoor/backend/index.php?module=login&function=datasocial';
		$audience      = 'https://' . 'juagisla.eu.auth0.com' . '/userinfo';

		$auth0 = new Auth0([
			'domain' => $domain,
			'client_id' => $client_id,
			'client_secret' => $client_secret,
			'redirect_uri' => $redirect_uri,
			'audience' => $audience,
			'scope' => 'openid profile',
			'persist_id_token' => true,
			'persist_access_token' => true,
			'persist_refresh_token' => true
		]);
		
		$userInfo = $auth0->getUser();
		return $userInfo;
	}

	require_once "JWT.php";
	function JWT_encode($user){

		$header = '{"typ":"JWT", "alg":"HS256"}';
		$secret = 'hamirezyclarinwinfornite';

		$payload = '{
			"iat":"'.time().'", 
			"exp":"'.time() + (60*60).'",
			"name":'.$user.'
		}';

		$JWT = new JWT;
		$token = $JWT->encode($header, $payload, $secret);
		// $json = $JWT->decode($token, $secret);
		// echo 'JWT juanan: '.$token."\n\n"; echo '<br>';
		// echo 'JWT Decoded juanan: '.$json."\n\n"; echo '<br>'; echo '<br>';
		return $token;
	}
