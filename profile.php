<?php
  include "include/header.php";

  ?>
  
    <div class="container">
    <div class="row">
         <div class="col-md-12 d-flex justify-content-center">
            <div class="card col-md-12 " style="margin:20px;">
                <div class="card-body ">
                <h3 class="text-center"> Welcome to your profile</h3>
                <p>Name : <?php echo $_SESSION['userName']; ?></p>
                <small>Email : <?php echo $_SESSION['userEmail']; ?></small>
                <div class="d-flex justify-content-end">
                <a href="#">Edit</a>

                </div>
                </div>
            </div>
        </div>        
       
        
            <div class="col-md-12 d-flex justify-content-center">
            <div class="card col-md-12 " style="margin:20px;">
                <div class="card-body">

                <p style="text-align:center;font-size:22xp;color:#444;">Order Details</p>
                <hr>
           

                <table class="table table-striped">
    <thead>
      <tr>
        <th>Product Name</th>
        <th>Image</th>
        
        <th>Quantity</th>
        <th>Price</th>
       
      </tr>
    </thead>
    <tbody>
    <?php
    $logInfo = Session::get("userLogin");
    if($logInfo){

        $counter=0;
        $shefa=Session::get("userId");
       
$orderProduct=$ct->getOrderedProduct($shefa);
if($orderProduct){
    while($result = $orderProduct->fetch_assoc()){
        $orderId = $result['orderId'];

        $counter++;
        ?>
        <tr>
          <td><?php echo $result['pname']; ?></td>
          <td><img style="height:50px;width:40px;"src="Admin/pages/forms/image/<?php echo $result['pimage']; ?>" alt="" /></td>
          <td><?php echo $result['oQuantity']; ?></td>
          <td ><?php echo $result['pprice']; ?></td>
         
        </tr>
        <?php
                  }
              }
              ?>
      </tbody>
    </table>
    
          <?php
            echo "The order id is ".$orderId;

    }else{

   
				
            $counter=0;
            $shefa=session_id();
			$orderProductNonUser=$ct->getOrderedProductNonUser($shefa);
			if($orderProductNonUser){
				while($result = $orderProductNonUser->fetch_assoc()){

                    $orderId = $result['orderId'];

					$counter++;
		

	?>
      <tr>
        <td><?php echo $result['pname']; ?></td>
        <td><img style="height:50px;width:40px;"src="Admin/pages/forms/image/<?php echo $result['pimage']; ?>" alt="" /></td>
        <td><?php echo $result['oQuantity']; ?></td>
        <td ><?php echo $result['pprice']; ?></td>
       
      </tr>
      <?php
                }
            }
           
          
            ?>
    </tbody>
  </table>
  <hr>
  
        <?php
          echo "The order id is ".$orderId;
        
  }
  ?>
                </div>
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