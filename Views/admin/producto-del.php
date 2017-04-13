<?php   $pro_id = (isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])) ? $_REQUEST['id'] : ''; ?>
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

                 <fieldset>
                        <legend> Eliminar Producto</legend>
                <div class="col-lg-4 col-lg-offset-1">
                  <form class="bs-component" method="POST" enctype="multipart/form-data" >
                    <div class="form-group">
                                    <p>Estás seguro que deseas eliminar este producto?</p>
                    </div>
                         <div class="col-lg-10 col-lg-offset-2">
                            <input type="hidden" name="pro_id" value="<?php echo $pro_id ?>">
                            <a href="<?php echo MODULE_PATH_WEB ?>list_producto/" class="btn btn-default" type="reset">Cancel</a>
                            <button class="btn btn-primary" type="submit">OK</button>
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