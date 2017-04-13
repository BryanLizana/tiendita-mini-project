<?php 
use Controllers\ProductoController;
if ( !isset($list_pro_all)  || empty($list_pro_all)) {
	
	$ProductoController = new ProductoController();
	$list_pro_all =  $ProductoController->list_productos_venta();
}
 ?>

<div id="carouselBlk">

</div>
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
	<div id="sidebar" class="span3">
		<div class="well well-small"><a id="myCart" href="<?php echo MODULE_PATH_WEB ?>summary/">
		<img src="<?php echo PATH_RESOURCE ?>assets/themes/images/ico-cart.png" alt="cart"><span  class="id_items_list_car">0 Items in your cart</span>   
		<span class="badge badge-warning pull-right total_cart_"  >$00.00</span></a></div>
	

			<div class="thumbnail">
				<img src="<?php echo PATH_RESOURCE ?>assets/themes/images/payment_methods.png" title="Bootshop Payment Methods" alt="Payments Methods">
				<div class="caption">
				  <h5>Payment Methods</h5>
				</div>
			</div>
	</div>
		<h4>  &nbsp;&nbsp;&nbsp;Latest Products </h4>
			  <ul class="thumbnails">
				<?php //echo '<pre>'; var_dump( $list_pro_all ); echo '</pre>'; die; /***VAR_DUMP_DIE***/  ?>
				<?php foreach ($list_pro_all as $row_pro): ?>
				<?php 
				$ProductoController->pro_id =  $row_pro['pro_id'];
				$img = $ProductoController->list_imgs();
				 ?>
					<li class="span3">
						<div class="thumbnail">
						
						<?php  if(isset($img[0]['pro_img_path'])):  ?>
							<a  href=""><img src="<?php echo PATH_RESOURCE ?>uploaded/<?php echo $img[0]['pro_img_path'] ?>" alt=""/></a>
						<?php else: ?>
							<a  href=""><img src="<?php echo PATH_RESOURCE ?>uploaded/no-image.jpg" alt=""/></a>
						<?php  endif;  ?>
						<div class="caption">
							<h5><?php echo $row_pro['pro_name'] ?></h5>
							<p> 
							<?php echo $row_pro['pro_description'] ?>
							</p>
							<h4 style="text-align:center">
							<!--<a class="btn" href="<?php echo PATH_RESOURCE ?>assets/product_details.html"> <i class="icon-zoom-in"></i></a> -->
							<?php 
							$data  = array();
							$data['producto'] =  json_encode( $row_pro  );

							$data['add_to_car'] = "true";
							$data = json_encode( $data );
							 ?>
							<a class="add_to_car btn"  data-prodetail='<?php echo $data ?>' >Add to <i class="icon-shopping-cart"></i></a>

							 <a class="btn btn-primary" >$<?php echo $row_pro['pro_precio_unidad'] ?></a></h4>
							 <!--<a class="btn btn-primary" href="<?php echo PATH_RESOURCE ?>assets/#">$<?php echo $row_pro['pro_precio_mayor'] ?></a></h4>-->
							 

						</div>
						</div>
					</li>
				<?php endforeach ?>
			
			  </ul>	

		</div>
		</div>
	</div>
</div>
