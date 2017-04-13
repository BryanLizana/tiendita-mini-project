<?php 

function fn_header( $data = null,  $header_name = 'header')
{
    $file = TEMPLATES_PATH . $header_name . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
}

function fn_footer($data = null, $footer_name = 'footer')
{
    $file = TEMPLATES_PATH . $footer_name . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
}


// $var_global_files_js  = array();
// $var_global_files_css  = array();
function fn_add_js($path_asset = 'main',$module = MODULE_NAME)
{
    global $var_global_files_js ;
    $var_global_files_js[] = PATH_RESOURCE . $module.'/js/'.$path_asset.'.js';
}

function fn_add_css($path_asset = 'main',$module = MODULE_NAME)
{
    global $var_global_files_css ;
    $var_global_files_css[] = PATH_RESOURCE .$module. '/css/'.$path_asset.'.css';
}


function fn_asset_js()
{
    global $var_global_files_js;
        
       if (count($var_global_files_js) > 0) {
           foreach ($var_global_files_js as $js) {
               # code...
               ?> 
               <script src="<?php echo $js ?>"></script>
               <?php
           }
       }
       
}

function fn_asset_css()
{
    global $var_global_files_css;
        
       if (count($var_global_files_css) > 0) {
           foreach ($var_global_files_css as $css) {
               # code...
               ?> 
               <link rel="" type="css" href="<?php echo $css ?>">
               <?php
           }
       }
       
}

function valid_permisos()
{
   
}