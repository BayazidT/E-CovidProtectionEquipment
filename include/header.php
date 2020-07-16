<?php
 include "lib/database.php";
 include "config/config.php";
 include "lib/session.php";
 include "classes/product.php";
 include "classes/cart.php";

 $pd = new Product();
 $db=new Database();
 $ct = new Cart();
 Session::init();

 if(isset($_GET['action'])&&$_GET['action'] == "logout"){
    Session::destroy();
}else{
    
}

 ?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Moricika</title>
    <!-- Bootstrap core CSS -->
   <!-- <link href="assets/css/bootstrap.css" rel="stylesheet">  -->
    <link href="assets/bs/css/bootstrap.css" rel="stylesheet">
    <!-- Fontawesome core CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!--GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!--Slide Show Css -->
    <link href="assets/ItemSlider/css/main-style.css" rel="stylesheet" />
    <!-- custom CSS here -->
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body>
<div class="" style="height: 100px;">
        <div class="topmost">
            <div class="d-flex justify-content-center">
       <ul class="row">
       <?php

$logInfo = Session::get("userLogin");
if($logInfo){
    ?>
    <li><a href="profile.php">My Account</a></li>
    <li>|</li>
           <li><a href="?action=logout">Logout</a></li>


<?php
}else{

  ?>
  <li><a href="login.php">Login</a></li>
  <li>|</li>
           <li><a href="registration.php">Register</a></li>
  <?php

}


?>
          
         
</ul>
</div>

</div>
<div class="topnav">
    <div class="row">
        <div class="col-md-4">
            Home
        </div>
        <div class="col-md-4">
        <form action="search.php" method="POST">
            <div class="input-group" style="margin-top: 20px;">
                <input type="text" class="form-control" name="searchItem" placeholder="Write something..." required>
                <div class="input-group-append">
                  <button class="btn btn-info" type="submit">Search</button> 
                </div>
                </form>
              </div>
        </div>
        <div class="col-md-4">
           Others
        </div>

    </div>
</div>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="index.php">Moricika</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#">Latest</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Offers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">New</a>
            </li>    
            <li class="nav-item">
                <a class="nav-link" href="cartDetails.php">Cart</a>
              </li>  
              <li class="nav-item">
                <a class="nav-link" href="#">Wishlist</a>
              </li>  
              <li class="nav-item">
                <a class="nav-link" href="registration.php">Sign Up</a>
              </li>  
             
          </ul>
        </div>  
      </nav>