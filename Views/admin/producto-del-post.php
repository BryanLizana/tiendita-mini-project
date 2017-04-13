<?php 
use Controllers\ProductoController;

if (is_numeric($_POST['pro_id'])) {
    $ProductoController =  new ProductoController();
    $ProductoController->pro_id = $_POST['pro_id'];
    $ProductoController->delete_producto();
}


header('location:'.MODULE_PATH_WEB.'list_producto/');