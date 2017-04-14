<?php 
use Controllers\ProductoController;
$ProductoController =  new ProductoController();
 ?>
<div id="mainBody">
	<div class="container">
	<div class="row">

	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active"> SHOPPING CART</li>
    </ul>

<!--<span class="badge badge-warning pull-right total_cart_"  >$00.00</span></a></div>-->
	
<h3>SHOPPING CART [ <small  class="id_items_list_car"  >0 </small>]<a href="<?php echo MODULE_PATH_WEB ?>" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a></h3>	
<input type="hidden" id="title_"  value="">
<form method="POST">
	<input type="hidden" name="action" value="clear_list_car">
	<input type="submit" name="" value="Limpiar Lista de items">
</form>

	<hr class="soft"/>
			
	<table class="table table-bordered">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Description</th>
                  <th>Quantity/Update</th>
				 				 <th>Price</th>
                  <th>Total</th>
								</tr>
              </thead>
              <tbody >
							<?php $total_compra = 0; ?>
								<?php  if(isset($_SESSION['list_car']) && is_array($_SESSION['list_car']) ):  ?>
							
										  <?php foreach ($_SESSION['list_car'] as $pro_id => $producto_detail): ?>
											<?php //echo '<pre>'; var_dump( $_SESSION['list_car'] ); echo '</pre>'; die; /***VAR_DUMP_DIE***/  ?>
													<?php //img
														$ProductoController->pro_id = $pro_id ;
														$img = $ProductoController->list_imgs();
														?>
												 <tr>
													<?php  if(!empty($img[0]) ):  ?>
														<td> <img width="60" src="<?php echo PATH_RESOURCE ?>uploaded/<?php echo $img[0]['pro_img_path'] ?>" alt=""/></td>														
													<?php else: ?>
														<td> <img width="60" src="<?php echo PATH_RESOURCE ?>uploaded/no-image.jpg" alt=""/></td>
														
													<?php  endif;  ?>
													<td><?php echo $producto_detail['name'] ?></td>
													<td>
														<div class="input-append">
														<input class="span1" style="max-width:34px" placeholder="<?php echo $producto_detail['cant'] ?>" id="cant_pro_car_<?php  echo $pro_id ?>" size="16" type="text">
														<!--<input  value="<?php //echo $producto_detail['price'] ?>"   type="hidden">-->
														<button class="btn less_producto" data-proid="<?php echo $pro_id ?>" type="button"><i class="icon-minus"></i></button>
														<button class="btn more_producto" data-proid="<?php echo $pro_id ?>" type="button"><i class="icon-plus"></i></button>
														<!--<button class="btn btn-danger" type="button"><i class="icon-remove icon-white"></i></button>-->
														</div>
													</td>
													<td id="price_pro_<?php   echo $pro_id ?>" >$<?php echo $producto_detail['price'] ?></td>										


													<td id="price_total_show<?php echo $pro_id  ?>">$<?php echo ( $producto_detail['price'] * $producto_detail['cant']  ) ?></td>
											
												</tr>
												<input type="hidden" class="total_comp" id="total_compra_<?php  echo $pro_id ?>" value="<?php echo ( $producto_detail['price'] * $producto_detail['cant']  ) ?>">
												<?php  $total_compra += $producto_detail['price'] * $producto_detail['cant'] ?>
												
											<?php endforeach ?>
								<?php  endif;  ?>
               
				 <tr>
                  <td colspan="6" style="text-align:right"><strong>TOTAL </strong></td>
                  <td class="label label-important"  style="display:block" id="price_total_all" > <strong>$<?php echo $total_compra ?> </strong></td>
									<input type="hidden" name="t" id="total_" value="<?php echo $total_compra * 100 ?>">
                </tr>
				</tbody>
            </table>

	<a href="<?php echo MODULE_PATH_WEB ?>" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>
	<!--<a href="login.html">Next <i class="icon-arrow-right"></i></a>-->
	
	<form  method="post"  class=" btn-large pull-right">
	<input type="image" src="http://www.paypal.com/en_US/i/btn/x-click-but01.gif" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
	</form>

	<input type="image"  class=" btn-large pull-right" src="https://paybis.com/images/1478541033-Credit-Card.png" id="pay_visa" alt="Make payments with PayPal - it's fast, free and secure!">
	
		
</div>
</div></div>
</div>
<!-- Incluyendo .js de Culqi Checkout-->
<!--<script src="https://checkout.culqi.com/v2"></script>-->
<!-- MainBody End ============================= -->
