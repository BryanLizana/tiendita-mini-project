  <?php
    use Controllers\UserController;
    use Includes\Flash\Flash;
   valid_permisos(); 
   
   ?>
  <?php 
  $status_pro = (isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])) ? 'Editar' : 'Crear';
  $us_id = (isset($_REQUEST['id']) &&is_numeric($_REQUEST['id'])) ? $_REQUEST['id'] : '';
                 
                   $data = array(                 
                        'us_id'  =>  null,              
                        'us_name'  =>  null,          
                        'us_last_name'  =>  null,
                        'us_dni'  =>  null,            
                        'us_password'  =>  null,  
                        'us_status'  =>  null,      
                        'us_type'  =>  null            
                        );

  if (is_numeric( $us_id )) {
    $UserController =  new UserController();
    
    $UserController->us_id = $us_id;
    $data = $UserController->list_usuarios();
    $data= $data[0];
  }else {
        //permite mantener los valores ingresados por el users 
     $data = array_replace_recursive($data,$_POST);
  }
   ?>
  <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-edit"></i> Usuario</h1>
            <p>Bootstrap default form componants</p>
          </div>
          <div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="row">
               <?php  if(!empty($_SESSION['flash_messages']['error'])):  ?>
              <!--Error-->

                <?php $flash = new Flash() ; $flash->display("error") ?>
              <?php  endif;  ?>
                 <fieldset>
                        <legend> <?php echo   $status_pro ?>  Usuario</legend>
                <div class="col-lg-4 col-lg-offset-1">
                  <form class="bs-component" method="POST" enctype="multipart/form-data" >
                  <input type="hidden" name="us_id" value="<?php echo  $us_id ?>">
                    <div class="form-group">
                                    <label class="control-label" for="focusedCode">ID</label>
                                    <input class="form-control" name="us_id" id="focusedCode" disabled type="text" placeholder="Code" value="<?php echo $data['us_id'] ?>">
                    </div>
                    <div class="form-group">
                                    <label class="control-label" for="focusedCode">DNI</label>
                                    <input class="form-control" name="us_dni" id="focusedCode"  type="text" placeholder="DNI" value="<?php echo $data['us_dni'] ?>">
                    </div>

                    <div class="form-group">
                                    <label class="control-label" for="focusedNombre">Nombre</label>
                                    <input class="form-control" name="us_name" id="focusedNombre" type="text" placeholder="Nombre"  value="<?php echo $data['us_name'] ?>">
                    </div>
                

                    <div class="form-group">
                                    <label class="control-label" for="focusedPrecioUnidad">Apellido</label>
                                    <input class="form-control" name="us_last_name" id="focusedPrecioUnidad" type="text" placeholder="Apellido"  value="<?php echo $data['us_last_name'] ?>">
                    </div>
                

                    <div class="form-group">
                                    <label class="control-label" for="focusedPrecioMayor">Password</label>
                                    <input class="form-control" name="us_password" id="focusedPrecioMayor" type="text" placeholder="password"  value="<?php echo $data['us_password'] ?>">
                    </div>
                

                    <div class="form-group">
                                    <label class="control-label" for="focusedCantMayorista">Type User (ROOT,ADMIN,CLIENTE)</label>
                                    <input class="form-control" name="us_type" id="focusedCantMayorista" type="text" placeholder="type"  value="<?php echo $data['us_type'] ?>">
                    </div>

                    <div class="col-lg-10 col-lg-offset-2">
                            <a class="btn btn-default" href="<?php echo MODULE_PATH_WEB ?>list_user/">Cancel</a>
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