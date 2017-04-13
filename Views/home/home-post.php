<?php 
use Controllers\ProductoController;
$ProductoController = new ProductoController();

$search_text = (isset($_POST['search'])) ? $_POST['search'] : '' ; 

     $where_sql_data['sql_where'] = "pro_name like :search_text";
     $where_sql_data['sql_where_data']  = array('search_text' => "%".$_POST['search']."%" );

    $ProductoController->where_sql_data = $where_sql_data ;
	$list_pro_all =  $ProductoController->list_productos();

