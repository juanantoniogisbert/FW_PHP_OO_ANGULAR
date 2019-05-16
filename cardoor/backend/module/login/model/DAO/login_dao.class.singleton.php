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
            $password = crypt($arrArgument['rpasswd'], '$1$rasmusle$');
            $token = md5(uniqid(rand(),true));
            $tokenlog = md5(uniqid(rand(),true));
            $img = 'https://www.gravatar.com/avatar/' . md5($email) . '?s=80&d=identicon&r=g';

            $sql = "INSERT INTO users (user,email,password,type,avatar,activate,token,tokenlog,nombre,apellido,fnac) 
            VALUES('$user','$email','$password','user','$img',0,'$token','$tokenlog','','','')";
            $db->ejecutar($sql);
            return $token;
        }
    }
