<?php 
use Controllers\ModuleController ;
use Includes\Flash\Flash;

$module =  new ModuleController();
$module->data =  array('a' => 5,'b'=> 9 );
$data = $module->sum();
echo '<pre>'; var_dump( $data ); echo '</pre>';  /***VAR_DUMP_DIE***/ 

$flash =  new Flash();
$errors =  $flash->display();
 ?>