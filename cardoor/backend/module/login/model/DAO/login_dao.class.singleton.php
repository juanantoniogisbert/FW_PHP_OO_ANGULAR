<?php
    class login_dao {
        static $_instance;
        private function __construct() {
        }

        public static function getInstance() {
            if(!(self::$_instance instanceof self)){
                self::$_instance = new self();
            }
            return self::$_instance;
        }
        
        public function insert_user_page($db,$arrArgument) {
            $user = $arrArgument['rusername'];
            $email = $arrArgument['rmail'];
            $password = password_hash($arrArgument['rpasswd'], PASSWORD_DEFAULT);
            $token = generate_Token_secure(20);
            $tokenlog = JWT_encode($user);
            $img = 'https://www.gravatar.com/avatar/' . md5($email) . '?s=80&d=identicon&r=g';

            $sql = "INSERT INTO users (user,email,password,type,avatar,activate,token,tokenlog,nombre,apellido,fnac) 
            VALUES('$user','$email','$password','user','$img',0,'$token','$tokenlog','','','')";
            $db->ejecutar($sql);
            return $token;
        }

        public function select_exist_user($db,$arrArgument) {
            $sql = "SELECT user, password FROM users WHERE user = '$arrArgument'";
            $res = $db->ejecutar($sql);
            return $db->listar($res);
        }

        // public function update_token_dao($db,$arrArgument) {
        //     $tokenlog = JWT_encode($arrArgument);
        //     $sql = "UPDATE users SET tokenlog = '$arrArgument' WHERE user = 'yomogan'";
        //     return $db->ejecutar($arrArgument);
        // }

        public function select_token($db,$arrArgument) {
            $tokenlog = JWT_encode($arrArgument);
            $sql = "UPDATE users SET tokenlog = '$tokenlog' WHERE user = '$arrArgument'";
            $res1 = $db->ejecutar($sql);
            
            $sql = "SELECT tokenlog FROM users WHERE user = '$arrArgument'";
            $res = $db->ejecutar($sql);
            return $db->listar($res);

        }

        public function select_mail_rec_pass($db,$arrArgument) {
            $sql = "SELECT email,token FROM users WHERE user = '$arrArgument'";
            $stmt = $db->ejecutar($sql);
            return $db->listar($stmt);
        }

        public function update_password($db,$arrArgument) {
            $pass = crypt($arrArgument['recpass'], '$1$rasmusle$');
            $token = $arrArgument['token'];
            $sql = "UPDATE users SET password = '$pass' WHERE token = '$token'";
            return $db->ejecutar($sql);
        }

        public function select_print_user($db,$arrArgument) {
            $sql = "SELECT user, email, avatar, nombre, apellido, fnac FROM users WHERE tokenlog = '$arrArgument'";
            $stmt = $db->ejecutar($sql);
            return $db->listar($stmt);
        }

        public function insert_user_social($db,$arrArgument) {
            $id = $arrArgument['id'];
            $email = $arrArgument['email'];
            $user = $arrArgument['user'];
            $avatar = $arrArgument['avatar'];

            $tokenlog = JWT_encode($user);

            $sql = "INSERT INTO users (user,email,type,avatar,activate,tokenlog,nombre,apellido,fnac) 
            VALUES('$user','$email','user','$avatar',1,'$tokenlog','','','')";
            $db->ejecutar($sql);
            return ($sql);
        }

        public function select_userType($db,$arrArgument) {
            $sql = "SELECT type FROM users WHERE tokenlog = '$arrArgument'";
            $stmt = $db->ejecutar($sql);
            return $db->listar($stmt);
        }

        public function update_user($db,$arrArgument) {
            $user = $arrArgument['user'];
            $nombreP = $arrArgument['nombreP'];
            $apellidoP = $arrArgument['apellidoP'];
            // $fnacP = $arrArgument['fnacP'];
            $paisP = $arrArgument['paisP'];
            $porvinP = $arrArgument['porvinP'];
            $poblaP = $arrArgument['poblaP'];
            $avatar = $arrArgument['avatar'];
            $sql = "UPDATE users SET nombre = '$nombreP', apellido = '$apellidoP', pais = '$paisP', provincia = '$porvinP', ciudad = '$poblaP', avatar = '$avatar' WHERE user = '$user'";
            return $db->ejecutar($sql);
        }

        public function update_avatar($db,$arrArgument) {
            $url = $arrArgument['data'];
            $user = $arrArgument['user'];
            $sql = "UPDATE users SET avatar = '$url' WHERE user = '$user'";
            return $db->ejecutar($sql);
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

        public function select_like($db,$arrArgument) {
            $sql = "SELECT token FROM like_car WHERE user = '$arrArgument'";
            $res = $db->ejecutar($sql);
            return $db->listar($res);
        }

        public function select_car($db,$arrArgument) {
            $sql = "SELECT DISTINCT c.* FROM users u, like_car l, coches c WHERE u.`user` = (SELECT user FROM users WHERE tokenlog = '$arrArgument') AND l.`mat_car` = c.`matricula`";
            $stmt = $db->ejecutar($sql);
            return $db->listar($stmt);
        }

        public function select_data_details($db,$arrArgument) {
            $sql = "SELECT * FROM coches WHERE matricula = '$arrArgument'";
            $stmt = $db->ejecutar($sql);
            return $db->listar($stmt);
        }

        public function select_details($db,$arrArgument) {
            $sql = "SELECT * FROM coches WHERE id = '$arrArgument'";
            $stmt = $db->ejecutar($sql);
            return $db->listar($stmt);
        }

    }