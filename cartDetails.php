<?php
  include "include/header.php";

  ?>
  <?php
 if(isset($_POST['update'])){
    $quantity = $_POST['quantity'];
    $pId = $_POST['pid'];
    if($quantity<=0){
        ?>
        <script> alert("You have to select any quantity! Thanks");</script>
      <?php

    }else{
      $updateCart = $ct->updateCart($pId, $quantity);

    }

  

}
      if(isset($_GET['deleteProductId'])){
        $dPId= preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['deleteProductId']) ;

        $shefa=session_id();
        
        $deleteProduct = $ct->deleteProduct($dPId, $shefa);



      }
 ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
            <div class="card col-md-12 " style="margin:20px;">
                <div class="card-body">

                <p style="text-align:center;font-size:22xp;color:#444;">Cart Details</p>
                <hr>
            <span class="text-center" >    <?php

               if(isset($updateCart)){
                   echo "<p style='text-align:center;color:green;'>".$updateCart."</p>";
                  
               }
               if(isset($deleteProduct)){
                echo "<p style='text-align:center;color:green;'>".$deleteProduct."</p>";
               
            }
?></span>

<?php
     $flag = 0;
     $shefa=session_id();
	$cartProduct=$ct->getCartProduct($shefa);
    if($cartProduct){
        $flag = 1;
    }

    if($flag == 0){
        echo "<p style='text-align:center;font-size:20xp;color:#444;'>Your cart is empty! please add something</p>";
    }else{

   
    ?>

                <table class="table table-striped">
    <thead>
      <tr>
        <th>Product Name</th>
        <th>Image</th>
        <th>Quantity</th>
        <th>Remove</th>
      </tr>
    </thead>
    <tbody>
    <?php
					$total=0;
                    $counter=0;
                    $vat=0;
                    $ttotal = 0;
                    $shefa=session_id();
		              	$cartProduct=$ct->getCartProduct($shefa);
			if($cartProduct){
				while($result = $cartProduct->fetch_assoc()){

                    $price = $result['pprice'];
                    $quantity = $result['quantity'];
                    $individual = $price * $quantity;
                    $total=$total+ $individual;
                    $vat = $total*.15;
                    $ttotal = $total+$vat;
					$counter++;
		

	?>
      <tr>
        <td><?php echo $result['pname']; ?></td>
        <td><img style="height:50px;width:40px;"src="Admin/pages/forms/image/<?php echo $result['pimage']; ?>" alt="" /></td>
        <td><form action="" method="POST"><input type="hidden" name="pid" value="<?php echo $result['pid'];?>" ><input type="number" name="quantity" min="1"style="width:35px;" value="<?php echo $result['quantity']; ?>"><input type="submit" name="update" value="Update"></form> </td>
        <td ><a onclick="return confirm('Are you sure');" href="?deleteProductId=<?php echo $result['pid'];?>">X</a></td>
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
          <a href="orderConfirm.php" class="btn btn-info btn-block">Order</a>
       
    </div>
        </div>
        <?php
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