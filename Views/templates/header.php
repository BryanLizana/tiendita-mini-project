<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootshop online Shopping cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<!--Less styles -->
   <!-- Other Less css file //different less files has different color scheam
	<link rel="stylesheet/less" type="text/css" href="<?php echo PATH_RESOURCE ?>assets/themes/less/simplex.less">
	<link rel="stylesheet/less" type="text/css" href="<?php echo PATH_RESOURCE ?>assets/themes/less/classified.less">
	<link rel="stylesheet/less" type="text/css" href="<?php echo PATH_RESOURCE ?>assets/themes/less/amelia.less">  MOVE DOWN TO activate
	-->
	<!--<link rel="stylesheet/less" type="text/css" href="<?php echo PATH_RESOURCE ?>assets/themes/less/bootshop.less">
	<script src="<?php echo PATH_RESOURCE ?>assets/themes/js/less.js" type="text/javascript"></script> -->
	
<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="<?php echo PATH_RESOURCE ?>assets/themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="<?php echo PATH_RESOURCE ?>assets/themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->	
	<link href="<?php echo PATH_RESOURCE ?>assets/themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="<?php echo PATH_RESOURCE ?>assets/themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="<?php echo PATH_RESOURCE ?>assets/themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo PATH_RESOURCE ?>assets/themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo PATH_RESOURCE ?>assets/themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo PATH_RESOURCE ?>assets/themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo PATH_RESOURCE ?>assets/themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo PATH_RESOURCE ?>assets/themes/images/ico/apple-touch-icon-57-precomposed.png">
	<style type="text/css" id="enject"></style>
     <?php fn_asset_css() ?>
  </head>



<body>
<div id="header">
<div class="container">
<div id="welcomeLine" class="row">
<div class="span6">	
<?php  if(isset($_SESSION['user']['us_name'])):  ?>
	Welcome! <strong> <?php echo $_SESSION['user']['us_name'] ?> , <?php echo $_SESSION['user']['us_last_name'] ?></strong>
<?php  endif;  ?>
</div>

	<div class="span6">
	<div class="pull-right">
	
		<a href="<?php echo ROOT_WEB ?>home/summary/"><div class="btn btn-mini btn-primary " >
		<i class="icon-shopping-cart icon-white"></i> <span class="id_items_list_car" >  [ 0 ] Itemes in your cart </span></div> </a> 
	</div>
	</div> 
</div>
<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="<?php echo MODULE_PATH_WEB ?>"><img src="<?php echo PATH_RESOURCE ?>assets/themes/images/logo.png" alt="Bootsshop"/></a>
		<form class="form-inline navbar-search" method="post" action="<?php echo MODULE_PATH_WEB ?>" >
		<input type="text" name="search" placeholder="Buscar un producto"/>
			<!--Tags list -->
			<?php 
				// use Controllers\ProductoController;
				// $ProductoController =  new ProductoController();
			 ?>
			<!--<select class="srchTxt">
				<option>All</option>
				<option>CLOTHES </option>
				<option>FOOD AND BEVERAGES </option>
				<option>HEALTH & BEAUTY </option>
				<option>SPORTS & LEISURE </option>
				<option>BOOKS & ENTERTAINMENTS </option>
			</select> -->
			<!--tag lis END-->
		  <button type="submit" id="submitButton" class="btn btn-primary">Go</button>
    </form>
    <ul id="topMenu" class="nav pull-right">

	 <?php  if(   isset($_SESSION['user']) &&  ($_SESSION['user']['us_type'] === "ROOT" || $_SESSION['user']['us_type'] === "ADMIN" )):  ?>
		  <li class=""><a href="<?php echo ROOT_WEB ?>admin/">Administración</a></li>
	 <?php  endif;  ?>
	 
	 <li class="">

	 <?php if (!isset($_SESSION['user']['us_name'])  ) :  ?> 
  	<!-- Login start====================================================================== -->
					<?php
					if (isset($data["error_login"])  && !empty($data["error_login"])){

						 fn_add_js('show-login');
					}
					?>


				<a href="<?php echo PATH_RESOURCE ?>assets/#login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Login</span></a>
				<div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
				<!--<div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" style="display: block;">		-->
						
						<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h3>Login Block</h3>
						</div>
						<div class="modal-body">
						<?php  if(isset($data['error_login'])  && !empty($data['error_login'])):  ?>
							<!--error show-->
									<div class="alert alert-warning">
									<strong>Warning!</strong><?php echo $data['error_login'] ?>
									</div>
						<?php  endif;  ?>
							<form class="form-horizontal loginFrm" method="POST" action="<?php echo MODULE_PATH_WEB ?>login/" >
								<input type="hidden" name="redirec_to" value="<?php echo MODULE_PATH_WEB . $_REQUEST['page']?>/">
								<div class="control-group">								
								<input type="text" id="inputEmail" placeholder="DNI" name="us_dni">
								</div>
								<div class="control-group">
								<input type="password" id="inputPassword" placeholder="Password" name="us_password" >
								</div>
								<div class="control-group">
								<label class="checkbox">
								<input type="checkbox"> Remember me
								</label>
								</div>
								<button type="submit" class="btn btn-success">Sign in</button>
								<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
							</form>		
						
						</div>
				</div>
 
	 <?php else :  ?>
		<form method="POST">
			<input type="hidden" name="page_pre_load" value="logout">
			<button type="submit" style="padding-right:10;margin-top:10px; border:none" ><span class="btn btn-large btn-success">Logout</span></button>
			<!--<a href=""  style="padding-right:0"><span class="btn btn-large btn-success">Logout</span></a>				-->
		</form>
				
	 <?php  endif;  ?>
      <!-- Login END====================================================================== -->
    
	</li>
    </ul>
  </div>
</div>
</div>
</div>
<input type="hidden" name="module_web_url" id="module_web_url" value="<?php echo ROOT_WEB ?>">
<!-- Header End====================================================================== -->