<?php 
// Defines Vars
define('ROOT', __DIR__ . DIRECTORY_SEPARATOR);


/// define path root web
    $path_root_server =  str_replace("\\","/",$_SERVER['DOCUMENT_ROOT']) ;
    $path_root_project =  str_replace("\\","/",ROOT) ;
    $path_project_base =  str_replace($path_root_server,'',$path_root_project);

    
    $path_project_base =  sprintf(
        "%s://%s%s",
        isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
        $_SERVER['SERVER_NAME']. "/",
        $path_project_base
    );


  for ($i=1; $i < 4; $i++) { 
      
      if ($path_project_base[strlen($path_project_base) - 1]  == '/') {
            $path_project_base = substr($path_project_base,0,-1);
        }else {
        }

  }

define('ROOT_WEB',$path_project_base.'/');


// echo '<pre>'; var_dump( ROOT_WEB,ROOT ); echo '</pre>'; die; /***VAR_DUMP_DIE***/ 
    
//globals
$var_global_files_js  = array();
$var_global_files_css  = array();

//Use PSR-4s
spl_autoload_register(function ($class) {
    $file = ROOT . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});




//Path templates views
// if (file_exists(ROOT .'Views'.DIRECTORY_SEPARATOR.'Templates'.DIRECTORY_SEPARATOR)  ) {
//     define('TEMPLATES_PATH', ROOT . 'Views'.DIRECTORY_SEPARATOR.'Templates'.DIRECTORY_SEPARATOR);
//     define('VIEWS',ROOT.'Views'. DIRECTORY_SEPARATOR );
//     // define('VIEWS_WEB',ROOT_WEB.'Views/' );   
    
      

// }elseif (file_exists(ROOT .'views'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR)) {
//     define('TEMPLATES_PATH', ROOT . 'views'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR); 
//     define('VIEWS',ROOT.'views'. DIRECTORY_SEPARATOR );
//     // define('VIEWS_WEB',ROOT_WEB.'views/' );
    
    

// }else
if (file_exists(ROOT .'Views'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR)) {
    define('TEMPLATES_PATH', ROOT . 'Views'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR); 
    define('VIEWS',ROOT.'Views'. DIRECTORY_SEPARATOR );
    // define('VIEWS_WEB',ROOT_WEB.'Views/' );
    define('PATH_RESOURCE',ROOT_WEB.'public/' );
    
}

