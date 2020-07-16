<?php
  include "include/header.php";

  ?>
  <?php

  if(isset($_GET['orderId'])){
      $sId = session_id();
      $userid = Session::get('userId');
      $userOrder = $ct->userConfirmOrder($sId,$userid);
  }
  if(isset($_GET['orderIdNonUser'])){
    $sId = session_id();
    $nonQuery="SELECT * FROM nonUser WHERE sId='$sId' LIMIT 1";
    $nonQueryResult = $db->select($nonQuery);
    if($nonQueryResult){
        while($result = $nonQueryResult->fetch_assoc()){
            $nonId=$result['nonId'];
        }
    }
   
    $nonUserOrder = $ct->nonUserConfirmOrder($sId,$nonId);
}


        if(isset($_POST['nonUser'])){

            $name = $_POST['userName'];
            $phone = $_POST['userPhone'];
            $address = $_POST['userAddress'];
            $sId = session_id();
          

            $nQuery = "INSERT INTO nonUser(name, phone, address, sId) VALUES('$name', '$phone', '$address', '$sId')";
            $qResult = $db->insertUser($nQuery);
           
            

        }
  ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
            <div class="row" style="margin:20px;">
            <div class="card col-md-7 " >
                <div class="card-body">

                <p style="text-align:center;font-size:22xp;color:#444;">Order Details</p>
                <hr>
                <table class="table table-striped">
    <thead>
      <tr>
        <th>Product Name</th>
        <th>Image</th>
        <th>Quantity</th>
       
      </tr>
    </thead>
    <tbody>
    <?php
					$total=0;
                    $counter=0;
                    $ttotal = 0;
                    $vat = 0;
                    $shefa=session_id();
                    $cartProduct=$ct->getCartProduct($shefa);
                if($cartProduct){
                  while($result = $cartProduct->fetch_assoc()){

                    $total=$total+($result['pprice']*$result['quantity']);
                    $vat = $total*.15;
                    $ttotal = $vat+$total;
                    $counter++;
                    $quantity = $result['quantity'];
                   
		

	?>
      <tr>
        <td><?php echo $result['pname']; ?></td>
        <td><img style="height:50px;width:40px;"src="Admin/pages/forms/image/<?php echo $result['pimage']; ?>" alt="" /></td>
        <td><?php echo $result['quantity']; ?> </td>
       
      </tr>
      <?php
                }
            }
            ?>
    </tbody>
  </table>
          <div class="d-flex justify-content-end">
              <div>
        
         
            <p> Sub Total : <?php echo $total; ?></p>
           <hr>
              <p>Vat : <?php echo $vat; ?></p>
              <hr>
              <h3>Total : <?php echo $ttotal; ?> </h3>
              <?php
              $logInfo = Session::get("userLogin");
          if($logInfo){

         ?>
              <a href="?orderId"  class="btn btn-info btn-block">Order!</a>
           <?php
          }else{
            $sId=session_id();

            $nonQuery="SELECT * FROM nonUser WHERE sId='$sId' LIMIT 1";
            $nonQueryResult = $db->select($nonQuery);
            if($nonQueryResult){
                while($result = $nonQueryResult->fetch_assoc()){
                    $name=$result['name'];
                    $phone=$result['phone'];
                    $address=$result['address'];

                 ?>
                   <a href="?orderIdNonUser"  class="btn btn-info btn-block">Order</a>

                 <?php

                }
              
            }else{
                echo "Login or fill up the form!";
            }
          }
              ?>
        </div>
        </div>
                </div>
            </div>    
            <div class="col-md-5">
            <div class="card" style="background:#28b8ae">
            <?php
          $logInfo = Session::get("userLogin");
          if($logInfo){
            $logId = Session::get("userId");
           
           $uQuery= "SELECT * FROM user WHERE userId = '$logId' limit 1";
            $qResult = $db->select($uQuery);
            if($qResult){
                while($result = $qResult->fetch_assoc()){
                    $userName = $result['userName'];
                    $userEmail = $result['userEmail'];
                    $userAddress = $result['userAddress'];
               

           

?>
                  <div class="card-body">
                     <h5>Name: <?php  echo $userName;?></h5>
                     <p>Email: <?php  echo $userEmail;?></p>
                     <p> Address: <?php  echo $userAddress;?></p>

                   
                  </div>
                  <?php
                   }
                }

          }else{
              $sId=session_id();

            $nonQuery="SELECT * FROM nonUser WHERE sId='$sId' LIMIT 1";
            $nonQueryResult = $db->select($nonQuery);
            if($nonQueryResult){
                while($result = $nonQueryResult->fetch_assoc()){
                    $name=$result['name'];
                    $phone=$result['phone'];
                    $address=$result['address'];
                   // Session::set("nonUserId", $result['nonId']);
                 ?>
                  <div class="card-body">
                     <h5>Name: <?php  echo $name;?></h5>
                     <p>Phone No: <?php  echo $phone;?></p>
                     <p> <?php  echo $address;?></p>

                   
                  </div>

                 <?php

                }
              
            }else{
                ?>
                 <div class="card-body">
                  <form action="orderConfirm.php" method="POST" >
                   
                   <div class="form-group">
                       <input type="text" name="userName" class="form-control" required="required" placeholder="Name">
                   </div>
                   
                  
                   <div class="form-group">
                       <input type="text" name="userPhone" class="form-control" required="required" placeholder="Phone No">
                   </div>
              
                   <div class="form-group">
                       <textarea type="text" name="userAddress" class="form-control" required="required" placeholder="Address"></textarea>
                   </div>
              <input type="submit" name="nonUser" class="btn btn-primary btn-block" value="Submit"/>
           
       </form>
                   
                  </div>


                <?php
            }
?>
                 
                  <?php
          }
          ?>
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