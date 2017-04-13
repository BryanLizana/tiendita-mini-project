<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('Load.php');
require_once('Functions.php');

$module = $_REQUEST['module'];
unset($_REQUEST['module']);


define('MODULE_PATH',VIEWS.$module.DIRECTORY_SEPARATOR ); //path module folder
define('MODULE_NAME',$module); // module name
define('MODULE_PATH_WEB',ROOT_WEB.$module.DIRECTORY_SEPARATOR ); // module name


//Start Page
// session_cache_limiter('private');
// $cache_limiter = session_cache_limiter();

// /* establecer la caducidad de la caché a 30 minutos - def 180min*/
// session_cache_expire(10);
// $cache_expire = session_cache_expire();
session_start();

//precarga de archivos especiales
    if ( isset($_REQUEST['page_pre_load']) &&  in_array($_REQUEST['page_pre_load'] ,  array('logout')) ) {
       
       include(MODULE_PATH.$_REQUEST['page_pre_load'].'.php');
       if ($_REQUEST['page_pre_load'] == 'logout') {
            $_SERVER['REQUEST_METHOD'] = 'GET';
            unset($_SESSION);
       }

       unset($_REQUEST['page_pre_load']);
       
    }

//falta la page no found
require_once(MODULE_PATH .'index.php');

