<?php
      include "include/header.php"
      

      ?>
<?php
$search = '';
       if($_SERVER['REQUEST_METHOD']=='POST'){
           $search = $_POST['searchItem'];
         
       }

       if(isset($_GET['id'])){
        $pid= preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['id']) ;
        $addCart = $ct->addToCart($pid, 1);
      }

?>

   
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="well well-lg offer-box text-center">


                   Today's Offer : &nbsp; <span class="glyphicon glyphicon-cog"></span>&nbsp;40 % off  on purchase of $ 2,000 and above till 24 dec !                
              
               
                </div>
                <div class="main box-border">
                   <!-- slider -->
                    
                </div>
                <br />
            </div>
            <!-- /.col -->
            
          <!--  <div class="col-md-3 text-center">
                <div class=" col-md-12 col-sm-6 col-xs-6 card" >
                    <div class="offer-text">
                        30% off here
                    </div>
                    <div class="thumbnail product-box">
                        <img src="assets/img/dummyimg.png" alt="" />
                        <div class="caption">
                            <h3><a href="#">Samsung Galaxy </a></h3>
                            <p><a href="#">Ptional dismiss button </a></p>
                        </div>
                    </div>
                </div>
               
            </div>   -->
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-3">
            <div>
                <a href="#" class="list-group-item " style="background:#187F7F;color:#fff;text-align:center;">Category
                    </a>
                    <ul class="list-group">
                    <?php

                        $pQuery = "SELECT DISTINCT pcategory, pquantity FROM products ";
                        $qResult = $db->select($pQuery);
                        if($qResult){
                            while($result = $qResult->fetch_assoc()){
                                $category = $result['pcategory'];
                                $quantity = $result['pquantity'];
                                ?>

                    <a href="?cat=<?php echo $category; ?>" style="color:#187F7F;"> <li class="list-group-item"><?php echo $category; ?>
                <span class="label label-primary pull-right"><?php echo $quantity; ?></span>
                        </li></a>
                       
                    </ul>
                    <?php
                            }
                        }
                        ?>



                </div>
             
               
              
                <div  style="margin-top:20px;">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-success"><a href="#">New Offer's Coming </a></li>
                        <li class="list-group-item list-group-item-info"><a href="#">New Products Added</a></li>
                        <li class="list-group-item list-group-item-warning"><a href="#">Ending Soon Offers</a></li>
                        <li class="list-group-item list-group-item-danger"><a href="#">Just Ended Offers</a></li>
                    </ul>
                </div>
                <!-- /.div -->
              
                <!-- /.div -->
            </div>
            
            <!-- /.col Product will start from here -->
            <div class="col-md-9">
            <?php
            if(isset($addCart)){
                echo $addCart;
            }

            ?>
                <div>
                    <ol class="breadcrumb">
                        <li><a href="#">Home / </a></li>
                        <li class="active"> Search Product</li>
                    </ol>
                </div>
                <!-- /.div -->
             
                <div class="row">
                    <?php

                   $searchQuery = "SELECT * FROM products WHERE (pname LIKE '%$search%')  OR (pdescription LIKE '%$search%') OR (pcategory LIKE '%$search%')";
                    $qResult = $db->select($searchQuery);
                    if($qResult){
                        while($result = $qResult->fetch_assoc()){
                            ?>

                    <div class="col-md-4 text-center col-sm-6 col-xs-6" style="margin-bottom:10px;">
                        <div class="card">
                            <div class="card-body">
                            <div class="thumbnail product-box">
                        <a href="productDetails.php?id=<?php echo $result['pid'];?>" style="color:#444;">
                            <img style="height:150px;width:100px;"src="Admin/pages/forms/image/<?php echo $result['pimage']; ?>" alt="" />
                            <hr>
                            
                            <div class="caption">
                           
                                <h3><?php echo $result['pname']; ?> </h3>
                                <p>250gm,  <strong><?php echo $result['pprice']; ?> TK</strong> </p>
                                
                               </a>
                                   
                                
                                <a href="?id=<?php echo $result['pid'];?>" class="btn btn-secondary btn-block">Add to Cart </a>
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