<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>SW Utilities</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Custom styles for this template -->
    <link href="css/product.css" rel="stylesheet">
    <link href="css/carousel.css" rel="stylesheet">
    <!-----CUSTOM STYLE SHEET-->
   <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>


  <body>

  <!--Navbar section-->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <h3 class="logo-size">South West Utilities Ltd </h3>
       <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>-->
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home </a><!--<span class="sr-only">(current)</span>-->
            </li>
            <li class="nav-item">
              <a class="nav-link" href="faq.php">FAQ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cart.php">
              <?php 
                    include ('dbCon.php');
                    $sql = "SELECT SUM(quantity) AS total_item FROM cart";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
              
                    if($row['total_item']!= NULL){
                      echo "<span style='color:white'> Cart (<b>".$row['total_item'].")</b></span>" ;
                    } else {
                      echo "<span style='color:whit'><b>Cart(0)</b><span style='color:whit'>";
                    }
                  ?>
              </a>
            </li>
          </ul>
          

        </div>
      </nav>
