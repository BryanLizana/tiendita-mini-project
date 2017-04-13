<?php 
use Controllers\UserController;
use Includes\Flash\Flash;

$UserController = new UserController();
$UserController->us_dni = $_POST['us_dni'];
$UserController->us_password = $_POST['us_password'];
$user = $UserController->login();

$flash =  new Flash();
if ($flash->hasErrors()) {
  $data['error_login']   = $flash->display('error',false) ;
}

header('location:'.$_POST['redirec_to']);