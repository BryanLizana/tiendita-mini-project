<?php 
use Controllers\ProductoController;
use Includes\Flash\Flash;
use Includes\Validate\Validate;

  $valid = new Validate();
        $valid->data=$_POST;
        $valid->table="productos";

        // echo '<pre>'; var_dump( $valid->validate() ); echo '</pre>'; die; /***VAR_DUMP_DIE***/ 
        $re_val =  $valid->validate();
if ( $re_val === 1 ) {
  $ProductoController =  new ProductoController();


    $ProductoController->pro_id = $_POST['pro_id'];                   
    // $ProductoController->pro_code = $_POST['pro_code'];                 
    $ProductoController->pro_name = $_POST['pro_name'];                 
    $ProductoController->pro_description = $_POST['pro_description'];          
    $ProductoController->pro_precio_unidad = $_POST['pro_precio_unidad'];        
    $ProductoController->pro_precio_mayor = $_POST['pro_precio_mayor'];         
    $ProductoController->pro_cant_pro_precio_mayor = $_POST['pro_cant_pro_precio_mayor'];
    $ProductoController->pro_stock_general = $_POST['pro_stock_general'];        
    $ProductoController->pro_stock_venta = $_POST['pro_stock_venta'];          
    // $ProductoController->pro_stock_almacen = $_POST['pro_stock_almacen'];        
    // $ProductoController->pro_stock_temp = $_POST['pro_stock_temp'];           


    if (is_numeric( $_POST['pro_id'])) {
       $id =  $ProductoController->update_producto();
       
        
    }else {
         $id =   $ProductoController->crear_producto();
         
        
    }
    if ( is_numeric($id) && isset($_FILES) && $id != 0) {
            $files_names = array('file_1','file_2','file_3');
            foreach ($files_names as  $file_name) {
               if ( !empty($_FILES[$file_name]['name']) ) {
                        $ProductoController->type = $_FILES[$file_name]["type"]; 
                        $ProductoController->temp = $_FILES[$file_name]["tmp_name"];
                        $ProductoController->img_name = $_FILES[$file_name]["name"];
                        
                        $ProductoController->pro_id = $id;
                        $ProductoController->save_pro_imgs();
               }
            }
  
    }
    //si fue exitoso, redirect a list products
}else {
    //flash
    $flash = new FLash();
    $flash->add("error", $re_val);
    $error_active = 1;
        
}
