<?php
	// require 'http://localhost/www/FW_PHP_OO_ANGULAR/cardoor/backend/module/login/utils/auth0/vendor/autoload.php';
	require SITE_ROOT . 'module/login/utils/auth0/vendor/autoload.php';
	use Auth0\SDK\Auth0;

	function validate_data_create($data){
		$error = array();
	    $valid = true;
		$filter = array(
			'matricula' => array(
				'filter' => FILTER_VALIDATE_REGEXP,
				'options' => array('regexp' => '/[a-zA-z_.]{3,21}/')
				// \d{4}-[\D\w]{3}
			),
			'marca' => array(
				'filter' => FILTER_VALIDATE_REGEXP,
				'options' => array('regexp' => '/[a-zA-z_.]{3,21}/')
			),
			'modelo' => array(
				'filter' => FILTER_VALIDATE_REGEXP,
				'options' => array('regexp' => '/[a-zA-z_.]{3,21}/')
			),
			'fabricante' => array(
				'filter' => FILTER_VALIDATE_REGEXP,
				'options' => array('regexp' => '/[a-zA-z_.]{3,21}/')
			),
			'color' => array(
				'filter' => FILTER_VALIDATE_REGEXP,
				'options' => array('regexp' => '/[a-zA-z_.]{3,21}/')
			),
			'caballos' => array(
				'filter' => FILTER_VALIDATE_REGEXP,
				'options' => array('regexp' => '/[0-9]{3,21}/')
			),
		);
		$result = filter_var_array($data, $filter);

		$result['radiotipo'] = $data['radiotipo'];
    	$result['paisC'] = $data['paisC'];
	    $result['porvinC'] = $data['porvinC'];
	    $result['poblaC'] = $data['poblaC'];

		// $data = $data[0];

		if ($result != null && $result){
			if(!$result['marca']){
				$error['marca'] = "El formato de la marca no es correcto";
				$valid = false;
			}
			if(!$result['modelo']){
				$error['modelo'] = "El formato del modelo no es correcto";
				$valid = false;
			}
			if(!$result['fabricante']){
				$error['fabricante'] = "El formato del fabricante no es correcto";
				$valid = false;
			}
			if(!$result['color']){
				$error['color'] = "El formato del color no es correcto";
				$valid = false;
			}
			if(!$result['caballos']){
				$error['caballos'] = "El formato de los caballos no son correctos";
				$valid = false;
			}
		} else {
			$valid = false;
		}
		return $return = array('result' => $valid,'error' => $error, 'data' => $result);    
		
	}