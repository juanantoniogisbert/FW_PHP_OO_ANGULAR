<?php
    function enviar_email($arr) {
        $html = '';
        $subject = '';
        $body = '';
        $ruta = '';
        $return = '';
        
        switch ($arr['type']) {
            
            case 'alta':
                $subject = 'Tu alta en Cardoor';
                $ruta = '<a href="http://' . $_SERVER['HTTP_HOST'] . '/www/FW_PHP_OO_ANGULAR/#/home/active_user/'. $arr['token'] .'">aqu&iacute;</a>';
                $body = 'Gracias por unirte a nuestra aplicaci&oacute;n<br> Para finalizar el registro, pulsa ' . $ruta;
            break;
    
            case 'modificacion':
                $subject = 'Tu Nuevo Password en Cardoor<br>';
                $ruta = '<a href="http://' . $_SERVER['HTTP_HOST'] . '/www/FW_PHP_OO_ANGULAR/#/login/passwdChange/'. $arr['token'] .'">aqu&iacute;</a>';
                $body = 'Para recordar tu password pulsa ' . $ruta;
            break;
                
            case 'contact':
                $subject = 'Tu Petici&oacute;n a Cardoor ha sido enviada<br>';
                $ruta = '<a href=' . 'http://localhost/www/FW_PHP_OO_ANGULAR/cardoor/'. '>aqu&iacute;</a>';
                $body = 'Para visitar nuestra web, pulsa ' . $ruta;
            break;
    
            case 'admin':
                $subject = $arr['inputSubject'];
                $body = 'inputName: ' . $arr['inputName']. '<br>' .
                'inputEmail: ' . $arr['inputEmail']. '<br>' .
                'inputMessage: ' . $arr['inputMessage'];
            break;
        }
        
        $html .= "<html>";
        $html .= "<body>";
	       $html .= "<h4>". $subject ."</h4>";
	       $html .= $body;
	       $html .= "<br><br>";
	       $html .= "<p>Sent by Cardoor</p>";
		$html .= "</body>";
		$html .= "</html>";

        // set_error_handler('ErrorHandler');
        try{
            if ($arr['type'] === 'admin')
                $address = 'juagisla@gmail.com';
            else
                $address = $arr['inputEmail'];
                $result = send_mailgun('juagisla@gmail.com', $address, $subject, $html);    
        } catch (Exception $e) {
			$return = 0;
		}
		// restore_error_handler();
        return $result;
    }
    
    function send_mailgun($from, $email, $subject, $html){
        	$config = array();
        	$config['api_key'] = "key-ac00a72d99257fdca24c6828228041f0"; //API Key
        	$config['api_url'] = "https://api.mailgun.net/v3/sandbox00e41e967c6046108da0d062540575a7.mailgun.org/messages"; //API Base URL
            
            $message = array();
            $message['from'] = $from;
            $message['to'] = $email;
            $message['h:Reply-To'] = "juagisla@gmail.com";
            $message['subject'] = $subject;
            $message['html'] = $html;
         
        	$ch = curl_init();
        	curl_setopt($ch, CURLOPT_URL, $config['api_url']);
        	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        	curl_setopt($ch, CURLOPT_USERPWD, "api:{$config['api_key']}");
        	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        	curl_setopt($ch, CURLOPT_POST, true); 
        	curl_setopt($ch, CURLOPT_POSTFIELDS,$message);
        	$result = curl_exec($ch);
        	curl_close($ch);
        	return $result;
        }
        