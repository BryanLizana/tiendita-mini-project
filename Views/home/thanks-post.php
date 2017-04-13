<?php 
use Controllers\ProductoController;
$ProductoController = new ProductoController();

if (isset($_POST) && count($_POST) > 0 ) {

    if (isset($_POST['payment_status']) && $_POST['payment_status'] == "Completed" ) {
        //paypal complete         
           foreach ($_SESSION['list_car'] as $pro_id => $detail) {
               $ProductoController->pro_id = $pro_id;
               $ProductoController->item_pro = $detail['cant'];
               $ProductoController->update_stock_venta();
           }        

          unset($_SESSION['list_car']);
    } else if(isset($_POST['payment_status_card']) && $_POST['payment_status_card'] == "Completed" ) {

        //card by culqi complete              
           foreach ($_SESSION['list_car'] as $pro_id => $detail) {
               $ProductoController->pro_id = $pro_id;
               $ProductoController->item_pro = $detail['cant'];
               $ProductoController->update_stock_venta();
                           
           }  
        unset($_SESSION['list_car']);
        $json= json_encode(true);
        echo $json;die;  
        die;
    }   

//    echo '<pre>'; var_dump( $_POST ); echo '</pre>'; die; /***VAR_DUMP_DIE***/ 
}
 ?>
