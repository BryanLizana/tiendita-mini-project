<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo PATH_RESOURCE ?>assets/templates/css/main.css">
    <title>Vali Admin</title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->
  </head>
  <body class="sidebar-mini fixed">
    <div class="wrapper">
      <!-- Navbar-->
      <header class="main-header hidden-print"><a class="logo" href="<?php echo ROOT_WEB ?>home/">Tiendita Store Mini</a>
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button--><a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
          <!-- Navbar Right Menu-->
          <div class="navbar-custom-menu">
            <ul class="top-nav">
              <!-- User Menu-->
              <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu">
                  <!--<li><a href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
                  <li><a href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>-->
                  <li>
                  <form method="POST">
                  <!--<a href="page-login.html"><i class="fa fa-sign-out fa-lg"></i> Logout</a>-->
                    <input type="hidden" name="page_pre_load" value="logout">
                    <button type="submit" style="text-decoration: none;" ><span class="fa fa-sign-out fa-lg">Logout</span></button>
                    <!--<a href=""  style="padding-right:0"><span class="btn btn-large btn-success">Logout</span></a>				-->
                  </form>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Side-Nav-->
      <aside class="main-sidebar hidden-print">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image"><img class="img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image"></div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['user']['us_name'] .' '. $_SESSION['user']['us_last_name']?></p>
              <p class="designation"><?php echo $_SESSION['user']['us_type'] ?></p>
            </div>
          </div>
          <!-- Sidebar Menu-->
          <ul class="sidebar-menu">

            <li class="<?php echo $re =($_REQUEST['page'] == 'home')? 'active':'' ?>"><a href="<?php echo MODULE_PATH_WEB ?>"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
            <li class="treeview  <?php echo $re =($_REQUEST['page'] == 'producto' || $_REQUEST['page'] == 'list_producto')? 'active':'' ?>"><a href="#"><i class="fa fa-laptop"></i><span>Productos</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo MODULE_PATH_WEB ?>list_producto/"><i class="fa fa-circle-o"></i>Listar Productos</a></li>
                <li><a href="<?php echo MODULE_PATH_WEB ?>producto/"><i class="fa fa-circle-o"></i>Crear Producto</a></li>
              </ul>
            </li>
            <li class="treeview <?php echo $re =($_REQUEST['page'] == 'user' || $_REQUEST['page'] == 'list_user')? 'active':'' ?>"><a href="#"><i class="fa fa-edit"></i><span>Usuarios</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo MODULE_PATH_WEB ?>list_user/"><i class="fa fa-circle-o"></i>Listar Usuarios</a></li>
                <li><a href="<?php echo MODULE_PATH_WEB ?>user/"><i class="fa fa-circle-o"></i> Crear Usuario</a></li>
              </ul>
            </li>

          </ul>
        </section>
      </aside>