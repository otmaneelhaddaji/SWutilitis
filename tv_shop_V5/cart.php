<?php
ob_start();

include_once "header.php";
include_once "data_model.php";

$cart_arr =get_cart_details();
$grand_total = null;

	if(!empty($cart_arr)){
	foreach($cart_arr as $cart_product){
	$grand_total += $cart_product['Total'];
		
?>

<!------BEGINING OF DIV WITH IMG AND INFO ABOUT PRODUCT, AND QUANTITY------>
<!--====Container====-->
<div class="container-fluid mt-5">
  <div class="row"  style="margin-top:30px; paddind:30px;">
	<div class="col-md-3 offset-md-2 item-bg">
	 <!--====Image====-->
		<img style="min-width:170px;max-width:100%" class="img-thumbnail" src="images/<?=$cart_product['product_image']?>"/>
	</div> <!-- End of cart_product_image div -->
	<div class="col-md-5 item-bg">
		<p><br>Product : <?=$cart_product['product_name']?></p>
		<p>Price Per Item : &pound; <?=$cart_product['product_price']?></p>
			<form method='post'>
			<p>Quantity : <input type="number" style="height:25px;" name="quantity" min="1" max="10" value="<?=$cart_product['quantity']?>">
				<input type="hidden" name="cart_product_id" value="<?=$cart_product['product_id']?>">
				&nbsp; &nbsp;<input type="submit"  class="btn_update" name="update" value="Update Quantity"></p>
			</form><br><hr><br>
		<b>Subtotal : &pound; <?= $cart_product['Total']?></b><br><br>
					
					<form method="post">
					<input type="hidden" name="delete_product_id" value="<?=$cart_product['product_id']?>">
					<input type="submit"  class="btn_delete" name="delete" value="Delete Item">
					</form><br>
	</div> <!-- End of cart_product_details div -->

 </div><!-- End of cart_product div -->


  <?php
	  }	# End of foreach loop
	} else {
		echo "<div class='error'>You do not have any item in the basket!<a href='index.php'> Shop Now! </a></div>";
	} # End of if else 
	

	# Grand Total Section 

	if(!empty($grand_total)){?>

<div class="row" style="text-align: right; height: 150px; "><!--margin-left:400px; margin-right: 400px;
	<div class="col-lg-8">
	</div>-->

    <div class="col-lg-10">
		Grand Total: &pound <?=$grand_total?><br><br>
		<a href="checkout.php">
		<button  class="btn_checkout">Go to Checkout </button>
		</a>
    </div>

</div> <!-- End of grand_total div -->

<?php } ?>
</div>

<?php
# Update button submit section.

if(isset($_POST['update'])){

		$product_id = $_POST['cart_product_id'];
		$quantity = $_POST['quantity'];

		if(update_cart($product_id,$quantity)){
			header("Location:cart.php");
		}

}


# Delete button submit section.

if(isset($_POST['delete'])){
	
		$product_id = $_POST['delete_product_id'];

		if(delete_item_from_cart($product_id)){
			header("Location:cart.php");
		}

}


  
include_once('footer.php');
 ?>
