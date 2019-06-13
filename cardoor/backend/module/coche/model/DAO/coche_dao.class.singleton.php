<?php
    class coche_dao {
        static $_instance;
        private function __construct() {
        }

        public static function getInstance() {
            if(!(self::$_instance instanceof self)){
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        public function select_creador($db,$arrArgument){
            $sql = "SELECT user FROM users WHERE tokenlog = '$arrArgument'";
            $res = $db->ejecutar($sql);
            return $db->listar($res);
        }
        
        public function insert_car_dao($db,$arrArgument) {
            $radiotipo = $arrArgument['radiotipo'];
            $matricula = $arrArgument['matricula'];
            $marca = $arrArgument['marca'];
            $modelo = $arrArgument['modelo'];
            $fabricante = $arrArgument['fabricante'];
            $color = $arrArgument['color'];
            $caballos = $arrArgument['caballos'];
            $paisC = $arrArgument['paisC'];
            $porvinC = $arrArgument['porvinC'];
            $poblaC = $arrArgument['poblaC'];
            $imagen = $arrArgument['avatar'];

            $sql = "INSERT INTO coches (tipo,matricula,marca,modelo,fabricante,color,caballos,pais,provincia,ciudad,imagen) 
            VALUES('$radiotipo','$matricula','$marca','$modelo','$fabricante','$color','$caballos','$paisC','$porvinC','$poblaC','$imagen')";
            $db->ejecutar($sql);
        }

        public function obtain_paises($url){
            $ch = curl_init();
            curl_setopt ($ch, CURLOPT_URL, $url);
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
            $file_contents = curl_exec($ch);
          
            $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            $accepted_response = array(200, 301, 302);
            if(!in_array($httpcode, $accepted_response)){
              return FALSE;
            }else{
              return ($file_contents) ? $file_contents : FALSE;
            }
        }

        public function obtain_provincias() {
            $json = array();
            $tmp = array();
    
            $provincias = simplexml_load_file(RESOURCES . "provinciasypoblaciones.xml");
            $result = $provincias->xpath("/lista/provincia/nombre | /lista/provincia/@id");
            for ($i = 0; $i < count($result); $i+=2) {
                $e = $i + 1;
                $provincia = $result[$e];
                $tmp = array(
                    'id' => (string) $result[$i], 'nombre' => (string) $provincia
                );
                array_push($json, $tmp);
            }
            return $json;
        }

        public function obtain_poblaciones($arrArgument) {
            $json = array();
            $tmp = array();
    
            $filter = (string) $arrArgument;
            $xml = simplexml_load_file(RESOURCES . 'provinciasypoblaciones.xml');
            $result = $xml->xpath("/lista/provincia[@id='$filter']/localidades");
    
            for ($i = 0; $i < count($result[0]); $i++) {
                $tmp = array(
                    'poblacion' => (string) $result[0]->localidad[$i]
                );
                array_push($json, $tmp);
            }
            return $json;
        }

		public function select_car_up($db,$arrArgument) {
			$sql = "SELECT * FROM coches WHERE id = '$arrArgument'";
			$res = $db->ejecutar($sql);
			return $db->listar($res);
		}
    }