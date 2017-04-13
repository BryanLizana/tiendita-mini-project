<?php 
use Controllers\ProductoController;
$ProductoController = new ProductoController();
if ($_REQUEST['clave']== "123456") {
    $ProductoController->update_stock_venta(); //actualizará los stock de venta - así si un user añade items
    // pero luego se retira este archivo (se ejecuta de manera manual) que se supone que se ejecuta al comienzo del día, 
    // para que se iguale el stock temp y el stock venta
}