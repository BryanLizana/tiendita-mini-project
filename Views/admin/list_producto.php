<?php 
valid_permisos();
use Controllers\ProductoController;
use Includes\Flash\Flash;

$ProductoController =  new ProductoController();
$data_list = $ProductoController->list_productos();
  ?>
	 <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1>List Productos</h1>
            <ul class="breadcrumb side">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li>Tables</li>
              <li class="active"><a href="#">Data Table</a></li>
            </ul>
          </div>
          <div><a class="btn btn-primary btn-flat" href="<?php echo ROOT_WEB.MODULE_NAME ?>/producto/"><i class="fa fa-lg fa-plus"></i></a>
          <a class="btn btn-info btn-flat" href="<?php echo ROOT_WEB.MODULE_NAME ?>/list_producto/"><i class="fa fa-lg fa-refresh"></i></a>
          <!--<a class="btn btn-warning btn-flat" href="#"><i class="fa fa-lg fa-trash"></i></a>-->
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                    <th></th>
                    <th></th>                    
                      <th>ID</th>                    
                      <th>Pro Code</th>
                      <th>Nombre</th>
                      <th>Price/Uni</th>
                      <th>Price/Mayor</th>
                      <th>Cant/Mayor</th>
                      <th>StockGeneral</th>
                      <th>StockVenta</th>
                      <th>StockAlmacen</th>
                      <th>StockTemp</th>
                    </tr>
                  </thead>
                  <tbody>
										<?php if (count($data_list) > 0) :  ?> 
												<?php foreach ($data_list as $row): ?>
													<tr>
                          <td><a href="<?php echo  ROOT_WEB.MODULE_NAME ?>/producto/<?php echo $row['pro_id'] ?>/">Edit</a></td>
                          <td><a href="<?php echo  ROOT_WEB.MODULE_NAME ?>/producto-del/<?php echo $row['pro_id'] ?>/">Delete</a></td>
                          
                            <td><?php echo $row['pro_id'] ?></td>
                            <td><?php echo $row['pro_code'] ?></td>                            
                            <td><?php echo $row['pro_name'] ?></td>                            
                            <td><?php echo $row['pro_precio_unidad'] ?></td>
                            <td><?php echo $row['pro_precio_mayor'] ?></td>
                            <td><?php echo $row['pro_cant_pro_precio_mayor'] ?></td>
                            <td><?php echo $row['pro_stock_general'] ?></td>
                            <td><?php echo $row['pro_stock_venta'] ?></td>
                            <td><?php echo $row['pro_stock_almacen'] ?></td>
                            <td><?php echo $row['pro_stock_temp'] ?></td>                            
													</tr>
												<?php endforeach ?>
										<?php else :  ?>
												<tr>No hay data¡¡</tr>
										<?php  endif;  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>