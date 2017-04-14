  <?php
    use Controllers\ProductoController;
 
   valid_permisos(); 
   
   ?>
  <?php 
  $status_pro = (isset($_REQUEST['id']) &&  is_numeric($_REQUEST['id'])) ? 'Editar' : 'Crear';
  $pro_id = (isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])) ? $_REQUEST['id'] : '';
  $data = array(                 
                  'pro_code' => null   ,                 
                  'pro_name' => null   ,                 
                  'pro_description' => null   ,          
                  'pro_precio_unidad' => null   ,        
                  'pro_precio_mayor' => null   ,         
                  'pro_cant_pro_precio_mayor' => null   ,
                  'pro_stock_general' => null   ,        
                  'pro_stock_venta' => null   ,          
                  'pro_stock_almacen' => null   ,        
                  'pro_stock_temp' => null                
                  );


  if (is_numeric( $pro_id ) && (  !isset($error_active) || $error_active != 1  ) ) {
    $ProductoControllers =  new ProductoController();
    
    $ProductoControllers->pro_id = $pro_id;
    $data = $ProductoControllers->list_productos();
    $data = $data[0];
  }else {
    //permite mantener los valores ingresados por el users 
    $data = array_replace_recursive($data,$_POST);
   
  }
   ?>
  <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-edit"></i> Producto</h1>
            <p>Bootstrap default form componants</p>
          </div>
          <div>
            <!--<ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li>Forms</li>
              <li><a href="#">Form Componants</a></li>
            </ul>-->
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="row">
              <?php  if(isset($error_active) &&  $error_active == 1):  ?>
              <!--Error-->
             
                  <div class="alert alert-warning">
                    <strong>Warning!</strong>    <?php $flash->display("error") ?>
                  </div>
              <?php  endif;  ?>

                 <fieldset>
                        <legend> <?php echo   $status_pro ?>  Producto</legend>
                <div class="col-lg-4 col-lg-offset-1">
                  <form class="bs-component" method="POST" enctype="multipart/form-data" >
                  <input type="hidden" name="pro_id" value="<?php echo  $pro_id ?>">
                    <div class="form-group">
                                    <label class="control-label" for="focusedCode">Code</label>
                                    <input class="form-control" name="pro_code" id="focusedCode" disabled type="text" placeholder="Code" value="<?php echo $data['pro_code'] ?>">
                    </div>
                

                    <div class="form-group">
                                    <label class="control-label" for="focusedNombre">Nombre</label>
                                    <input class="form-control" name="pro_name" id="focusedNombre" type="text" placeholder="Nombre"  value="<?php echo $data['pro_name'] ?>">
                    </div>
                

                    <div class="form-group">
                                    <label class="control-label" for="focusedPrecioUnidad">Precio por Unidad</label>
                                    <input class="form-control" name="pro_precio_unidad" id="focusedPrecioUnidad" type="text" placeholder="PrecioUnidad"  value="<?php echo $data['pro_precio_unidad'] ?>">
                    </div>
                

                    <div class="form-group">
                                    <label class="control-label" for="focusedPrecioMayor">Preciopor Mayor</label>
                                    <input class="form-control" name="pro_precio_mayor" id="focusedPrecioMayor" type="text" placeholder="PrecioMayor"  value="<?php echo $data['pro_precio_mayor'] ?>">
                    </div>
                

                    <div class="form-group">
                                    <label class="control-label" for="focusedCantMayorista">Cant que se considera el precio por Mayor</label>
                                    <input class="form-control" name="pro_cant_pro_precio_mayor" id="focusedCantMayorista" type="text" placeholder="CantMayorista"  value="<?php echo $data['pro_cant_pro_precio_mayor'] ?>">
                    </div>
                

                    <div class="form-group">
                                    <label class="control-label" for="focusedStockGeneral">StockGeneral</label>
                                    <input class="form-control" name="pro_stock_general" id="focusedStockGeneral" type="text" placeholder="StockGeneral"  value="<?php echo $data['pro_stock_general'] ?>">
                    </div>
                

                    <div class="form-group">
                                    <label class="control-label" for="focusedStockVenta">StockVenta</label>
                                    <input class="form-control" name="pro_stock_venta" id="focusedStockVenta" type="text" placeholder="StockVenta"  value="<?php echo $data['pro_stock_venta'] ?>">
                    </div>
                

                    <div class="form-group">
                                    <label class="control-label" for="focusedStockAlmacen">StockAlmacen</label>
                                    <input class="form-control" name="pro_stock_almacen" id="focusedStockAlmacen" type="text" placeholder="StockAlmacen" disabled value="<?php echo $data['pro_stock_almacen'] ?>">
                    </div>
                

                    <div class="form-group">
                         <label class="control-label" for="focusedStockTemp">StockTemp</label>                           
                         <input class="form-control" name="pro_stock_temp" id="focusedStockTemp" type="text" placeholder="StockTemp" disabled  value="<?php echo $data['pro_stock_temp'] ?>">                            
                    
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="textArea">Description</label>
                      <div >
                        <textarea class="form-control" id="textArea" name="pro_description" rows="3"><?php echo $data['pro_description'] ?></textarea>
                        <!--<span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                      </div>
                    </div>
                 <div class="form-group">
                              Images list;
                    <input name="file_1" type="file"  > 
                    </div>     

                         <div class="col-lg-10 col-lg-offset-2">
                           <a href="<?php echo MODULE_PATH_WEB ?>list_producto/" class="btn btn-default" type="reset">Cancel</a>
                            <button class="btn btn-primary" type="submit">Submit</button>
                          </div>

                  </form>
                </div>
                </fieldset>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>