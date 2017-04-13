<?php 
use Controllers\UserController;
use Includes\Flash\Flash;
use Includes\Validate\Validate;
$UserController =  new UserController();

  $valid = new Validate();
        $valid->data=$_POST;
        $valid->table="usuarios";

        // echo '<pre>'; var_dump( $valid->validate() ); echo '</pre>'; die; /***VAR_DUMP_DIE***/ 
        $re_val =  $valid->validate();
if ( $re_val === 1 ) {
    $UserController->us_id = $_POST['us_id'];                   
    $UserController->us_name = $_POST['us_name'];                 
    $UserController->us_last_name = $_POST['us_last_name'];          
    $UserController->us_dni = $_POST['us_dni'];        
    $UserController->us_password = $_POST['us_password'];         
    $UserController->us_type = $_POST['us_type'];        


    if (is_numeric( $_POST['us_id'])) {
       $id =  $UserController->update_usuario();
       
        
    }else {
         $id =   $UserController->crear_usuario();
         
        
    }
}else {
        //flash
    $flash = new FLash();
    $flash->add("error", $re_val);
    $error_active = 1;
}


    //si fue exitoso, redirect a Panel inicio