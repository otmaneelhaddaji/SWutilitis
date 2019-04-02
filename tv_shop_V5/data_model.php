<?php

include_once "dbCon.php";


# Functions for product page (index page in cour case)

# ---------------------------------------------------#
#----------------------------------------------------#

function get_all_products(){
	global $conn;
	$sql = "SELECT * FROM product";
	$result = mysqli_query($conn, $sql);
	
		if (mysqli_num_rows($result) > 0) {
			// output data of each row
			$product_arr = [];
			while($row = mysqli_fetch_assoc($result)) {
				array_push($product_arr, $row);
			}

			return $product_arr;
		} else{
			return false;
		}
}


function get_product_info($product_id){

	global $conn;
	$sql= "SELECT * FROM PRODUCT WHERE product_id ='$product_id' ";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) > 0){
		$product_details = mysqli_fetch_assoc($result);
		return $product_details; 
	} else {
		return false;
	}
}

# If record for the product found in the database then 
# it will increase Quantity of that product by 1 else it will insert the a new row



function add_to_cart($product_id){
	global $conn;
	$sql = "SELECT * FROM cart WHERE product_id = '$product_id' ";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) >= 1 ){
		$sql = "UPDATE cart
		SET quantity = quantity + 1
		WHERE product_id = '$product_id' ";
		 mysqli_query($conn, $sql);
		 if(mysqli_affected_rows($conn)>0){
			return true;
		 } else {
		   return false;
		 }
		  

	}  else {
		$sql = "INSERT INTO cart(product_id, quantity)
				VALUES('$product_id',1)";
		mysqli_query($conn, $sql);
       if(mysqli_affected_rows($conn)>0){
		  return true;
	   } else {
		 return false;
	   }
		
				  
	}
}



# ---------------------END------------------------------#
#-------------------------------------------------------#




# Functions for cart page.

# ---------------------------------------------------#
#----------------------------------------------------#

function get_cart_details(){

	global $conn;
	$sql = "SELECT 
				product.product_name, 
				product.product_price,
				product.product_image,
				cart.product_id,
				cart.quantity, 
				(product.product_price * cart.quantity) as Total
		FROM cart, product
		WHERE product.product_id = cart.product_id";

	$result = mysqli_query($conn, $sql);
	
	
	$cart_arr = [];

	if(mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			array_push($cart_arr, $row);
		

		}

		return $cart_arr;
	}
}


function update_cart($product_id,$quantity){
	global $conn;
	$sql = "UPDATE cart
	SET quantity = '$quantity'
	WHERE product_id = '$product_id' ";
	mysqli_query($conn, $sql);

	if(mysqli_affected_rows($conn) > 0 ){
		return true;
	 } else {
	   return false;
	 }

}

function delete_item_from_cart($product_id){
	global $conn;

	
	$sql = "DELETE FROM cart
			WHERE product_id = '$product_id' ";
	mysqlI_query($conn, $sql);

	if(mysqli_affected_rows($conn)>0){
		return true;
	 } else {
	   return false;
	 }
}



?>
