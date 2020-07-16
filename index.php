<?php
      include "include/header.php"

      ?>
      <?php
      if(isset($_GET['id'])){
        $pid= preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['id']) ;
        $addCartDirect = $ct->addToCart($pid, 1);
      }

      $perPage = 3;
      if(isset($_GET['product'])){
          $product = $_GET['product'];
      }else{
          $product = 1;
      }
     
      $startFrom = ($product-1)*$perPage;
      ?>
      <?php
      

        $pQuery = "SELECT * FROM products WHERE pcategory = 'Mask' ";
        $qResult = $db->select($pQuery);
        $totalRows = mysqli_num_rows($qResult);
        $totalPage = ceil($totalRows/$perPage);

        //This is for second row
      /*  $pQuery1 = "SELECT * FROM products WHERE pcategory = 'Tablet'";
        $qResult1 = $db->select($pQuery1);
        $totalRows1 = mysqli_num_rows($qResult1);
        $totalPage1 = ceil($totalRows1/$perPage);*/
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

                        $pQuery = "SELECT DISTINCT pcategory FROM products ";
                        $qResult = $db->select($pQuery);
                        if($qResult){
                            while($result = $qResult->fetch_assoc()){
                                $category = $result['pcategory'];
                               
                                ?>

                    <a href="category.php?cat=<?php echo $category; ?>" style="color:#187F7F;"> <li class="list-group-item"><?php echo $category; ?>
                <span class="label label-primary pull-right"><?php   ?></span>
                        </li></a>
                       
                    </ul>
                    <?php
                            }
                        }
                        ?>



                </div>
                <!-- /.div -->
              
               
              
                <div style="margin-top:20px;">
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
                <div>
                    <ol class="breadcrumb">
                        <li><a href="#">Home /</a></li>
                        <li class="active">Masks</li>
                    </ol>
                </div>
                <!-- /.div -->
            
                <div class="row">
                    <?php

                    $pQuery = "SELECT * FROM products WHERE pcategory = 'Mask' LIMIT $startFrom, $perPage";
                    $qResult = $db->select($pQuery);
                    if($qResult){
                        while($result = $qResult->fetch_assoc()){
                            ?>

                    <div class="col-md-4 text-center col-sm-6 col-xs-6" style="margin-bottom:10px;">
                        <div class="card">
                            <div class="card-body">
                            <div class="thumbnail product-box">
                        <a href="productDetails.php?id=<?php echo $result['pid'];?>" style="color:#444;">
                            <img style="height:150px;width:200px;"src="Admin/pages/forms/image/<?php echo $result['pimage']; ?>" alt="" />
                            <hr>
                            
                            <div class="caption">
                           
                                <h5><?php echo $result['pname']; ?> </h5>
                                <p> <strong><?php echo $result['pprice']; ?> TK</strong> </p>
                                
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
                
                <ul class="pagination justify-content-end">
                <li class="page-item page-link"><?php
			   echo "<a href='index.php?product=1'>".'<<'."</a>";
			   ?></li>
			   <?php
			   for( $i=1;$i<=$totalPage;$i++){   
			?>
              <li class="page-item page-link"><?php  
			  echo "<a  href='index.php?product=".$i."'>".$i."</a>";?></li>
              <?php } ?>
			<li class="page-item page-link"><?php 
			echo "<a href='index.php?product=$totalPage'>".'>>'."</a>";
			?></li>
                </ul>
                           
                <!-- /.row -->
                <div>
                <ol class="breadcrumb">
                        <li><a href="#">Home/</a></li>
                        <li class="active">Medicine</li>
                    </ol>
                  
                </div>
                <!-- /.div -->
             
                <div class="row">
                    <?php

                    $pQuery = "SELECT * FROM products WHERE pcategory = 'Medicine' LIMIT $startFrom, $perPage";
                    $qResult = $db->select($pQuery);
                    if($qResult){
                        while($result = $qResult->fetch_assoc()){
                            ?>

                    <div class="col-md-4 text-center col-sm-6 col-xs-6" style="margin-bottom:10px;">
                        <div class="card">
                            <div class="card-body">
                        <div class="thumbnail product-box">
                        <a href="productDetails.php?id=<?php echo $result['pid'];?>" style="color:#444;">
                            <img style="height:150px;width:200px;"src="Admin/pages/forms/image/<?php echo $result['pimage']; ?>" alt="" />
                            <hr>
                            
                            <div class="caption">
                           
                                <h5><?php echo $result['pname']; ?> </h5>
                                <p>  <strong><?php echo $result['pprice']; ?> TK</strong> </p>
                                
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
                <div>
                <ol class="breadcrumb">
                        <li><a href="#">Home/</a></li>
                        <li class="active">Hand Sanitizer</li>
                    </ol>
                  
                </div>
                <!-- /.div -->
             
                <div class="row">
                    <?php

                    $pQuery = "SELECT * FROM products WHERE pcategory = 'Hand Sanitizer' LIMIT $startFrom, $perPage";
                    $qResult = $db->select($pQuery);
                    if($qResult){
                        while($result = $qResult->fetch_assoc()){
                            ?>

                    <div class="col-md-4 text-center col-sm-6 col-xs-6" style="margin-bottom:10px;">
                        <div class="card">
                            <div class="card-body">
                        <div class="thumbnail product-box">
                        <a href="productDetails.php?id=<?php echo $result['pid'];?>" style="color:#444;">
                            <img style="height:150px;width:200px;"src="Admin/pages/forms/image/<?php echo $result['pimage']; ?>" alt="" />
                            <hr>
                            
                            <div class="caption">
                           
                                <h5><?php echo $result['pname']; ?> </h5>
                                <p>  <strong><?php echo $result['pprice']; ?> TK</strong> </p>
                                
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
                <div>
                <ol class="breadcrumb">
                        <li><a href="#">Home/</a></li>
                        <li class="active">Protective Element</li>
                    </ol>
                </div>
                <!-- /.div -->
             
                <div class="row">
                    <?php

                    $pQuery = "SELECT * FROM products WHERE pcategory = 'Protective Element' LIMIT $startFrom, $perPage";
                    $qResult = $db->select($pQuery);
                    if($qResult){
                        while($result = $qResult->fetch_assoc()){
                            ?>

                    <div class="col-md-4 text-center col-sm-6 col-xs-6" style="margin-bottom:10px;">
                        <div class="card">
                            <div class="card-body">
                        <div class="thumbnail product-box">
                        <a href="productDetails.php?id=<?php echo $result['pid'];?>" style="color:#444;">
                            <img style="height:150px;width:200px;"src="Admin/pages/forms/image/<?php echo $result['pimage']; ?>" alt="" />
                            <hr>
                            
                            <div class="caption">
                           
                                <h5><?php echo $result['pname']; ?> </h5>
                                <p>  <strong><?php echo $result['pprice']; ?> TK</strong> </p>
                                
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
             
                <ul class="pagination justify-content-end">
               
                </ul>
               
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
   <?php
   include "include/footer.php";
   ?>