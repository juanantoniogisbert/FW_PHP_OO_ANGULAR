<?php
//PROYECTO
define('PROJECT', '/www/FW_PHP_OO_ANGULAR/cardoor/backend/');

define('PROJECT_A', '/www/FW_PHP_OO_ANGULAR/cardoor/');
define('PROJECT_B', '/www/FW_PHP_OO_ANGULAR/');

//SITE_ROOT
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'] . PROJECT);

//SITE_ROOT
define('SITE_ROOT_A', $_SERVER['DOCUMENT_ROOT'] . PROJECT_A);

//SITE_PATH
define('SITE_PATH', 'http://' . $_SERVER['HTTP_HOST'] . PROJECT);

//SITE_PATH
define('SITE_PATH_B', 'http://' . $_SERVER['HTTP_HOST'] . PROJECT_B);

//CSS
define('CSS_PATH', SITE_PATH . 'view/assets/css/');
define('CSS_PATH_PLUG', SITE_PATH . 'view/assets/css/plugins/');

//JS
define('JS_PATH', SITE_PATH . 'view/assets/js/');

//JS PLUGINS
define('PLUGINS_JS_PATH', SITE_PATH . 'view/assets/js/plugins');

//IMG
define('IMG_PATH', SITE_PATH . 'view/assets/img/');
define('IMG_PATH_images', SITE_PATH . 'view/assets/img/images');

//log
define('USER_LOG_DIR', SITE_ROOT . 'log/user/Site_User_errors.log');
define('GENERAL_LOG_DIR', SITE_ROOT . 'log/general/Site_General_errors.log');

define('PRODUCTION', true);

//model
define('MODEL_PATH', SITE_ROOT . 'model/');
//view
define('VIEW_PATH_INC', SITE_ROOT_A . 'assets/inc/');
define('VIEW_PATH_INC_ERROR', SITE_ROOT . 'view/inc/templates_error/');
//modules
define('MODULE_PATH', SITE_ROOT . 'module/');
//resources
define('RESOURCES', SITE_ROOT . 'resources/');
//media
define('MEDIA_PATH', SITE_ROOT . 'media/');
//utils
define('UTILS', SITE_ROOT . 'utils/');

//toastr
define('TOASTR', SITE_PATH . 'view/toastr/');

//model home
define('FUNCTIONS_HOME', SITE_ROOT . 'module/home/utils/');
define('MODEL_PATH_HOME', SITE_ROOT . 'module/home/model/');
define('DAO_HOME', SITE_ROOT . 'module/home/model/DAO/');
define('BLL_HOME', SITE_ROOT . 'module/home/model/BLL/');
define('MODEL_HOME', SITE_ROOT . 'module/home/model/model/');
define('HOME_JS_PATH', SITE_PATH . 'module/home/view/js/');

//model login
define('FUNCTIONS_LOGIN', SITE_ROOT . 'module/login/utils/');
define('MODEL_PATH_LOGIN', SITE_ROOT . 'module/login/model/');
define('DAO_LOGIN', SITE_ROOT . 'module/login/model/DAO/');
define('BLL_LOGIN', SITE_ROOT . 'module/login/model/BLL/');
define('MODEL_LOGIN', SITE_ROOT . 'module/login/model/model/');
define('LOGIN_JS_PATH', SITE_PATH . 'module/login/view/js/');

//model shop
define('FUNCTIONS_SHOP', SITE_ROOT . 'module/shop/utils/');
define('MODEL_PATH_SHOP', SITE_ROOT . 'module/shop/model/');
define('DAO_SHOP', SITE_ROOT . 'module/shop/model/DAO/');
define('BLL_SHOP', SITE_ROOT . 'module/shop/model/BLL/');
define('MODEL_SHOP', SITE_ROOT . 'module/shop/model/model/');
define('SHOP_JS_PATH', SITE_PATH . 'module/shop/view/js/');

//model contact
// define('CONTACT_JS_PATH', SITE_PATH . 'module/contact/view/js/');

//amigables
define('URL_AMIGABLES', TRUE);
