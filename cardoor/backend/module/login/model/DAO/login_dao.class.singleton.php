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
            $tokenlog = generate_Token_secure(20);
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

        public function update_token($db,$arrArgument) {
            $tokenlog = generate_Token_secure(20);
            $sql = "UPDATE users SET tokenlog = '$tokenlog' WHERE id = '$arrArgument'";
            return $db->ejecutar($sql);
        }

        public function select_token($db,$arrArgument) {
            $sql = "SELECT tokenlog FROM users WHERE id = '$arrArgument'";
            $res = $db->ejecutar($sql);
            return $db->listar($res);
        }
    }
