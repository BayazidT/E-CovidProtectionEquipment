<?php
  include "include/header.php";

  ?>
  

    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
            <div class="row" style="margin:20px;">
            <div class="card col-md-7 " >
                <div class="card-body">

                <p style="text-align:center;font-size:22xp;color:#444;">Order Details</p>
                <hr>
                <?php

                $orderId = $_GET['orderId'];


                ?>
                <p style="color:green;">Your order is successfully placed, order ID : <?php echo $orderId; ?></p>
                <small> <a href="orderDetails.php">See your order details here</a></small>
           
       
                </div>
            </div>    
            <div class="col-md-5">
            <div class="card" style="background:#28b8ae">
            <div class="card-body">
            <h2>Thanks for shopping with us</h2>
                    </div>
            </div>
            </div>
             <!-- /.col -->
             
             </div>
            </div>
            <!-- /.col -->
            
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
    <?php
   include "include/footer.php";
   ?>