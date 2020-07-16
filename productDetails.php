<?php


   include "include/header.php";

 if(isset($_GET['action'])&&$_GET['action'] == "logout"){
    Session::destroy();
}else{
    
}

if(!isset($_GET['id'])|| $_GET['id']==NULL){
    echo "<script>window.location = index.php;</script>";
}else{
  $pid= preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['id']) ;

}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $quantity = $_POST['quantity'];
    if($quantity<=0){
        ?>
        <script> alert("You have to select any quantity! Thanks");</script>
      <?php

    }else{
      $addCart = $ct->addToCart($pid, $quantity);

    }

  

}
 ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="well well-lg offer-box text-center">


                   Today's Offer : &nbsp; <span class="glyphicon glyphicon-cog"></span>&nbsp;40 % off  on purchase of $ 2,000 and above till 24 dec !                
              
               
                </div>
                <div class="row">
                <?php
	  
	   $getpid=$pd->getproduct($pid);
	   if($getpid)
		{
			while($result=$getpid->fetch_assoc()){
                $pcategory = $result['pcategory'];

	?>
                    


         <div class="col-md-7 ">
                <div class=" col-md-12 col-sm-8 col-xs-9" >
                    <div class="offer-text">
                        30% off here
                    </div>
                    <img style="height:450px;width:450px;"src="Admin/pages/forms/image/<?php echo $result['pimage']; ?>" alt="" />
                </div>
                
            </div>
            <div class="col-md-5 ">
                <div class=" col-md-12 col-sm-6 col-xs-6 card" >
                    <div class="offer-text">
                        30% off here
                    </div>
                  <div class="card-body" style="margin-top:40px;">
                            <h2><?php echo $result['pname']; ?> </h2>
                            <p><a href="#"><?php echo $result['pcategory']; ?> </a></p>
                       
                    <hr>
                           
                            <p><?php echo $result['pdescription']; ?></p>
                            <hr>
                           
                            <div style="background:#187F7F;font-size:20px;color:#fff;text-align:center;padding:6px;margin-top:15px;border-radius:5px;">
                            <p style="margin:5px;">Price : <?php echo $result['pprice']; ?> TK</p>
        </div>
                           <div style="margin:10px;">
                         
                           <form method="POST" action="">
		<label>Quantity</label>
		<input type="number" min="1" step="1" style="width:40px;" id="check" name="quantity" value="1"/>
        <br/>
        <span style="color:red">
        <?php
                 if(isset($addCart)){
                    echo $addCart;
                }
                ?>
                </span>
                <br>
		<button type="submit" class="btn btn-secondary" name="cart">Add to Cart</button>
		
                </form>
               
				
                            <button class="btn btn-danger">Add To Wishlist</button>   
        </div>


                    </div>    
                </div>
                
            </div>
            
                </div>
                <br />
               
            </div>
            <!-- /.col -->
            
            
           
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
        <div class="col-md-12">
                <div class="well well-lg offer-box text-center">


                   Today's Offer : &nbsp; <span class="glyphicon glyphicon-cog"></span>&nbsp;40 % off  on purchase of $ 2,000 and above till 24 dec !                
              
               
                </div>
                <div class="main box-border">
                <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home">Specification</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1">Description</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu2">Data Sheets</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
     
      <p><?php echo $result['pspecification']; ?></p>
    </div>
    <div id="menu1" class="container tab-pane fade"><br>
   
      <p><?php echo $result['pdescription']; ?></p>
    </div>
    <div id="menu2" class="container tab-pane fade"><br>
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
  </div>


                          
                </div>
            </div>    

            <?php

}
}
?>
            <div class="col-md-3" style="margin-top:20px;">
               
                <!-- /.div -->
             
                <!-- /.div -->
                <div>
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-success"><a href="#">New Offer's Coming </a></li>
                        <li class="list-group-item list-group-item-info"><a href="#">New Products Added</a></li>
                        <li class="list-group-item list-group-item-warning"><a href="#">Ending Soon Offers</a></li>
                        <li class="list-group-item list-group-item-danger"><a href="#">Just Ended Offers</a></li>
                    </ul>
                </div>
                <!-- /.div -->
                <div class="well well-lg offer-box offer-colors">


                    <span class="glyphicon glyphicon-star-empty"></span>25 % off  , GRAB IT                 
              
                   <br />
                    <br />
                    <div class="progress progress-striped">
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                            style="width: 70%">
                            <span class="sr-only">70% Complete (success)</span>
                            2hr 35 mins left
                        </div>
                    </div>
                    <a href="#">click here to know more </a>
                </div>
                <!-- /.div -->
            </div>
            <!-- /.col -->
            <div class="col-md-9" style="margin-top:20px;">
                <div>
                    <ol class="breadcrumb">
                        <li><a href="#">Related Products</a></li>
                      
                    </ol>
                </div>
              
                <!-- /.row -->
                <div class="row">
                <?php

$pQuery = "SELECT * FROM products WHERE pcategory = '$pcategory' AND pid != '$pid' LIMIT 3";
$qResult = $db->select($pQuery);
if($qResult){
    while($result = $qResult->fetch_assoc()){
        ?>

<div class="col-md-4 text-center col-sm-6 col-xs-6" style="margin-bottom:10px;">
    <div class="card">
        <div class="card-body">
    <div class="thumbnail product-box">
        <img style="height:150px;width:100px;"src="Admin/pages/forms/image/<?php echo $result['pimage']; ?>" alt="" />
        <div class="caption">
            <h3><a href="#"><?php echo $result['pname']; ?> </a></h3>
            <p>Price : <strong><?php echo $result['pprice']; ?></strong>  </p>
            
            <p>
                <a href="#" class="btn btn-success" role="button">Add To Cart</a>
                <a href="productDetails.php?id=<?php echo $result['pid'];?>" class="btn btn-secondary btn-block stretched-link">See Details </a>
            </p>
        </div>
    </div>
</div>
</div>
</div>

<?php
    }
}


?>

                    <!-- /.col -->
                   
                </div>
                <!-- /.row -->
          
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
    <?php
   include "include/footer.php";
   ?>