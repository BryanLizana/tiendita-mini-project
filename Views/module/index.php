<?php $page_this = "MODULE"; ?>

<?php 

    if (file_exists(MODULE_PATH.$_REQUEST['page'].'.php')) {
        //Page
        fn_header(); //header page
        fn_add_js();
        fn_add_css();
        

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			include(MODULE_PATH.$_REQUEST['page'].'-post.php');
		}
			include(MODULE_PATH.$_REQUEST['page'].'.php');
        
        fn_footer();//footer page

    }else {
        
        include('404.php');
    }
 