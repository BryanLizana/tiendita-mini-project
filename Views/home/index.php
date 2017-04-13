<?php $page_this = "HOME"; ?>

<?php 

        if (empty($_REQUEST['page']) ) {
             $_REQUEST['page'] = "home";
        }

    if (file_exists(MODULE_PATH.$_REQUEST['page'].'.php')) {
        //Page
        $data =  null;
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			include(MODULE_PATH.$_REQUEST['page'].'-post.php');
		}        
        fn_header($data); //header page
        fn_add_js('add_to_car');
        fn_add_js('cant_producto');
        fn_add_js('culqi');
        fn_add_js('card_pay');
        

        // fn_add_css();
			include(MODULE_PATH.$_REQUEST['page'].'.php');
        
        fn_footer();//footer page

    }else {
        
        include('404.php');
    }
 