<?php
$conn = mysqli_connect("localhost","root","","tv_shop");

// Check connection
 if (mysqli_connect_errno())
   {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }

//mysqli_select_db($con,"shop");

# For default timezone setup
date_default_timezone_set('UTC');
?>