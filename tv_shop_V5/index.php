<?php
ob_start();
require_once "header.php";
include_once "data_model.php";
$product_arr = get_all_products();
?>




<div class="container">
      <!-------THIS IS THE BEGINING OF CAROUSEL------>
 <div id="myCarousel" class="carousel slide" data-ride="carousel">
   <ol class="carousel-indicators">
     <li data-target="#myCarousel" data-slide-to="0" ></li>
     <li data-target="#myCarousel" data-slide-to="1"class="active"></li>
     <li data-target="#myCarousel" data-slide-to="2"></li>
   </ol>
   <!--Slide 1-->
<div class="carousel-inner">
     <div class="carousel-item active">
       <img class="first-slide" src="images/Hitachi_3.jpg" alt="Hitachi-TV">
       <div class="container">
         <div class="carousel-caption text-left">
           <h1>Spring deals</h1>
           <p class="text-carousel">The Smart TV is the entertainment hub of most homes. Our television selection is sure to cover what you need in your front room, or any other room for that matter! Whether you're after value-for-money or state-of-the-art, we have the lot.</p>
         </div>
       </div>
     </div>
     <!--Slide 2-->
     <div class="carousel-item">
       <img class="second-slide" src="images/LG_50_1.jpg" alt="LG-TV">
       <div class="container">
         <div class="carousel-caption">
           <h1>Spring deals</h1>
           <p class="text-carousel">The Smart TV is the entertainment hub of most homes. Our television selection is sure to cover what you need in your front room, or any other room for that matter! Whether you're after value-for-money or state-of-the-art, we have the lot.</p>
         </div>
       </div>
     </div>
     <!--Slide 3-->
     <div class="carousel-item">
       <img class="third-slide " style="background-size:cover;"  src="images/Samsung_49_2.jpg" alt="Samsung-TV">
       <div class="container">
         <div class="carousel-caption text-right">
           <h1>One more for good measure.</h1>
           <p class="text-carousel">The Smart TV is the entertainment hub of most homes. Our television selection is sure to cover what you need in your front room, or any other room for that matter! Whether you're after value-for-money or state-of-the-art, we have the lot.</p>
         </div>
       </div>
     </div>
   </div>
   <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    </div><!-- ends container -->
    <!-------END OF CAROUSEL-------->




    <!----LIST OF PRODUCTS WITH IMAGES ---->

<div class="row benefits " style="width:95%; margin:0px auto;">
<?php
   if(!empty($product_arr)){
	   foreach($product_arr as $product){
?>

      <!------beginig of product_image div----->
  <div  class="col-lg-4 item-bg" style="padding: 20px; border:solid 1px white; ;"> <!--"-->
     
    <a href="product_info.php?product_id=<?php echo $product['product_id'] ?>">
      <div  style=" padding:20px;height:330px;" class="product-link">
        <div class="product_image">
		     <img style="width:200px; height: 200px;" src="images/<?= $product['product_image'] ?>">
	    </div> <!-- End of product_image div -->


      <!------DISPLAYING NAME AND PRICE------->

    <h4><?php echo $product['product_name'] ;?> </h4>
    <h3 class="price">£<?php echo $product['product_price'] ;?> </h3>
          
         
  </div>

</a>

<!-----FORM TO PUSH  product_id TO CART----->

<form method="post">
	<input type="hidden" name = "product_id" value="<?=$product['product_id']?>">
	<input type='submit'  class='btn_cart' name='btn_cart' value='Add to Cart'>
</form>
	

  <!----BEGINING OF CONFIRM SCRIPT---->
  <div class="confirm">
			<?php 
			if(isset($_GET['action']) && isset($_GET['product_id']) ){
				$action = $_GET['action'];
				$product_id = $_GET['product_id'];
				if($action =="success" && $product_id == $product['product_id']){
					echo "<div class='confirm-add'>Item added to the cart!</div>";
				} else if($action =="error_db" && $product_id == $product['product_id']){
					echo "<div class='confirm-error'>There is a problem adding to the cart!</div>";
				}
			}
			?>
	</div> <!-- End of confirm div -->
  </div>
      


  <?php 
		} // End of foreach loop
	} else {

		echo "<div class='error'> No Product Found in the Database!</div>";
		
	} // End of if else
?>
  </div>

  <?php

  # Here we handle form submit (the add to cart button click)
  
  if(isset($_POST['btn_cart'])){
  
  $product_id = $_POST['product_id'];
  
      if(add_to_cart($product_id)){
      $msg = "success";
      } else {
        $msg = "error_db";	
      }
  
      header("Location:index.php?action=$msg&product_id=$product_id");
  
  }
require_once "footer.php";
?>