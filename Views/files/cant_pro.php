<?php 
use Controllers\ProductoController;
$ProductoController = new ProductoController(); 

if (isset($_POST['more_one_producto'])) { //la cantidad a disminuir es uno, pero el valor será el ID del producto

    $pro_id = $_POST['more_one_producto'] ;


    if (isset($_SESSION['list_car'][$_POST['more_one_producto']]) ) {
       
        $ProductoController->pro_id = $pro_id;        
        if ( $ProductoController->less_item() !== false) {//disminuye en La DB -  si es correcto update session
             $_SESSION['list_car'][$_POST['more_one_producto']]['cant'] += 1;
        }
    }
        
    //valdiar si se procesp con el precio mayor 
        $ProductoController->pro_id = $pro_id ; 
        $detail_pro = $ProductoController->list_productos();

        if ($detail_pro[0]['pro_cant_pro_precio_mayor'] <=  $_SESSION['list_car'][$pro_id ]['cant'])  { // si la cantidad del usuario es igual o mayor que la cantidad
            //que se considera el precio por mayor, se aplica dicho precio

            //se aplica el precio por mayor
            $_SESSION['list_car'][$pro_id ]['price'] = $detail_pro[0]['pro_precio_mayor'];
        }else{

            $_SESSION['list_car'][$pro_id ]['price'] = $detail_pro[0]['pro_precio_unidad'];
        }

    $data['pro_id'] = $_POST['more_one_producto']; //cargar datos actualizados
    $data['detail'] = $_SESSION['list_car'][$_POST['more_one_producto']] ; //cargar datos actualizados

    $json= json_encode($data);
    echo $json;die;
    
//   die;
}

if (isset($_POST['less_one_producto'])) { //la cantidad a disminuir es uno, pero el valor será el ID del producto
  
    $pro_id = $_POST['less_one_producto'] ;
  
    if (isset($_SESSION['list_car'][$_POST['less_one_producto']])  && $_SESSION['list_car'][$_POST['less_one_producto']]['cant'] > 0 ) {
         $_SESSION['list_car'][$_POST['less_one_producto']]['cant'] -= 1;
          $ProductoController->pro_id = $pro_id;  
        $ProductoController->more_item();  //aumenta en La DB
    }
    
   //valdiar si se procesp con el precio mayor 
        $ProductoController->pro_id = $pro_id ; 
        $detail_pro = $ProductoController->list_productos();

        if ($detail_pro[0]['pro_cant_pro_precio_mayor'] <=  $_SESSION['list_car'][$pro_id ]['cant'])  { // si la cantidad del usuario es igual o mayor que la cantidad
            //que se considera el precio por mayor, se aplica dicho precio

            //se aplica el precio por mayor
            $_SESSION['list_car'][$pro_id ]['price'] = $detail_pro[0]['pro_precio_mayor'];
        }else{

            $_SESSION['list_car'][$pro_id ]['price'] = $detail_pro[0]['pro_precio_unidad'];
        }

    $data['pro_id'] = $_POST['less_one_producto']; //cargar datos actualizados
    $data['detail'] = $_SESSION['list_car'][$_POST['less_one_producto']] ; //cargar datos actualizados

    $json= json_encode($data);
    echo $json;die;
//   die;
}

