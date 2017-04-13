<?php $page_this = "ADMIN"; ?>

<?php 
//vali permisos
if ( !isset($_SESSION['user'] ) && $_SESSION['user']['us_type'] != "ADMIN" || $_SESSION['user']['us_type'] != "ROOT" ) {
    header('location: '. ROOT_WEB . 'home/');
  
}
    if (empty($_REQUEST['page']) ) {
       $_REQUEST['page'] = "list_producto";
    }

    if (file_exists(MODULE_PATH.$_REQUEST['page'].'.php')) {
        //Page
        $data =  null;
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			include(MODULE_PATH.$_REQUEST['page'].'-post.php');
		}        
        fn_header($data,'header-admin'); //header page
        // fn_add_js();
        // fn_add_css();
			include(MODULE_PATH.$_REQUEST['page'].'.php');
        
        fn_footer(null,'footer-admin');//footer page

    }else {
        
        include('404.php');
    }
 