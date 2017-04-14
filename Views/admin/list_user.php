<?php 
valid_permisos();
use Controllers\UserController;
use Includes\Flash\Flash;

$UserController =  new UserController();
$data_list = $UserController->list_usuarios();
  ?>
	 <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1>List usuarios</h1>
            <ul class="breadcrumb side">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li>Tables</li>
              <li class="active"><a href="#">Data Table</a></li>
            </ul>
          </div>
          <div><a class="btn btn-primary btn-flat" href="<?php echo ROOT_WEB.MODULE_NAME ?>/user/"><i class="fa fa-lg fa-plus"></i></a>
          <a class="btn btn-info btn-flat" href="<?php echo ROOT_WEB.MODULE_NAME ?>/list_user/"><i class="fa fa-lg fa-refresh"></i></a>
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
                      <th>ID</th>      
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>DNI</th>
                      <th>Typo</th>
                      <th>STATUS</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (count($data_list) > 0) :  ?> 
                            <?php foreach ($data_list as $row): ?>
                                <tr>
                          <td><a href="<?php echo  ROOT_WEB.MODULE_NAME ?>/user/<?php echo $row['us_id'] ?>/">Edit</a></td>
                       
                            <td><?php echo $row['us_id'] ?></td>
                            <td><?php echo $row['us_name'] ?></td>                            
                            <td><?php echo $row['us_last_name'] ?></td>                            
                            <td><?php echo $row['us_dni'] ?></td>
                            <td><?php echo $row['us_type'] ?></td>
                            <td><?php echo $row['us_status'] ?></td>                         
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