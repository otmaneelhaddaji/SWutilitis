<?php
ob_start();
require_once "header.php";
include_once "data_model.php";

if(isset($_GET['product_id'])){

  $product_id = $_GET['product_id'];
  $product_details = get_product_info($product_id);
}


?>


    

    <!----PRODUCT DESCRIPTION---->

<div class="row benefits" style="width:95%; margin:0px auto;">
<?php
   if(!empty($product_details)){	   
?>
<!--====Container====-->
<div class="container-fluid mt-5">
  <div class="row">	
	 <div class="col-md-3 offset-md-2">
   <!--====Image====-->
      <img style="min-width:170px;max-width:100%" class="img-thumbnail" src="images/<?= $product_details['product_image'] ?>">
    </div>
     <div class="col-md-5">
      <h3><?php echo $product_details['product_name'] ;?> </h3><br><hr noshade>          
      <p><?php echo $product_details['product_description'] ;?> </p>
      <h3>£<?php echo $product_details['product_price'] ;?> </h3>

   <!---FORM BEGINING--->     
       <form method="post">
      	<input type="hidden" name = "product_id" value="<?=$product_details['product_id']?>">
      	<input type='submit'  class='btn_cart' name='btn_cart' value='Add to Cart'>
	    </form>

      <div class="confirm">
			<?php 
			if(isset($_GET['action']) && isset($_GET['product_id']) ){
				$action = $_GET['action'];
				$product_id = $_GET['product_id'];
				if($action =="success" && $product_id == $product_details['product_id']){
					echo "<div class='confirm-add'>Item added to the cart!</div>";
				} else if($action =="error_db" && $product_id == $product_details['product_id']){
					echo "<div class='confirm-error'>There is a problem adding to the cart!</div>";
				}
			}
			?>
	</div> <!-- End of confirm div -->
          
</div>
</div>
</div><!-- ends container -->

 <!-- <div style="border: 1px solid blue; height:650px; padding: 20px; margin:10px auto;" class="col-lg-12">     
    
    <div style="border: 1px solid green; padding:20px;height:605px;" class="product-link">
      <div class="product_image">

      
	    </div>
        End of product_image div -->

          
     </div>

  
  </div>
    
    
</div> 
      


  <?php 
		 // End of foreach loop
	} else {

		echo "<div class='error'> No Product Found in the Database!</div>";
		
	} // End of if else
?>
  </div>


<!--SUCCESS MESSAGE---->

  <?php

if(isset($_POST['btn_cart'])){
  
  $product_id = $_POST['product_id'];
  
      if(add_to_cart($product_id)){
      $msg = "success";
      } else {
        $msg = "error_db";	
      }
  
      header("Location:product_info.php?action=$msg&product_id=$product_id");
  
  }
require_once "footer.php";
?>