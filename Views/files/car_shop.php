<?php 
use Controllers\ProductoController;
$ProductoController = new ProductoController();


if (isset($_POST['add_to_car'])  && !empty($_POST['add_to_car']) ) { //cargar productos al carrito
$_POST['producto'] = json_decode( $_POST['producto'],true );
$_POST['producto']['pro_id'] = json_decode( $_POST['producto']['pro_id'],true );

// $json= json_encode($_POST['producto']['pro_precio_unidad']);

    if (!isset($_SESSION['list_car'][$_POST['producto']['pro_id']])) {
        //se añade un producto por primera vez con cant 0
        $_SESSION['list_car'][$_POST['producto']['pro_id']]['cant'] = 0;
    }

    //se agraga la cantidad y se suma con la cantidad anterior

    //aquí validar el precio po mayor
    $_SESSION['list_car'][$_POST['producto']['pro_id']]['cant'] += 1 ; //   $_POST['producto']['pro_cant'];

    $_SESSION['list_car'][$_POST['producto']['pro_id']]['price'] = $_POST['producto']['pro_precio_unidad'];
    $_SESSION['list_car'][$_POST['producto']['pro_id']]['name'] = $_POST['producto']['pro_name'];

    
    //restar al stock temp
    $ProductoController->pro_id = $_POST['producto']['pro_id'];
    $ProductoController->less_item();

    //valdiar si se procesp con el precio mayor
    $ProductoController->pro_id = $_POST['producto']['pro_id'];
    $detail_pro = $ProductoController->list_productos();

    if ($detail_pro[0]['pro_cant_pro_precio_mayor'] <=  $_SESSION['list_car'][$_POST['producto']['pro_id']]['cant'])  {

        //se aplica el precio por mayor
        $_SESSION['list_car'][$_POST['producto']['pro_id']]['price'] = $_POST['producto']['pro_precio_mayor'];
    }else{

        $_SESSION['list_car'][$_POST['producto']['pro_id']]['price'] = $_POST['producto']['pro_precio_unidad'];
    }
    
    $_SESSION['list_car'][$_POST['producto']['pro_id']]['name'] = $_POST['producto']['pro_name'];
    
    $total = 0;
    foreach ($_SESSION['list_car'] as $id => $values) { //calcular el total de todos los productos
      $t = $values['cant'] * $values['price'];
      $total += $t;
    }

    $data['count'] =    count($_SESSION['list_car']) ; //cargar datos actualizados
    $data['total'] = $total;    
    $json= json_encode($data );


    echo $json;die;
}

if (isset($_POST['list_car_number'])  && !empty($_POST['list_car_number']) && isset($_SESSION['list_car'])  ) {//mostrar los datos del carrito
      
  $total = 0;
  foreach ($_SESSION['list_car'] as $id => $values) {
    $t = $values['cant'] * $values['price'];
    $total += $t;
  }

   $data['count'] =    count($_SESSION['list_car']) ;
   $data['total'] = $total;

   
  $json= json_encode($data );


  echo $json;die;

}

if (isset($_POST['list_car_all'])  && !empty($_POST['list_car_all'])) {
      
  $json= json_encode($_SESSION['list_car']);
  echo $json;die;

}

die('0');