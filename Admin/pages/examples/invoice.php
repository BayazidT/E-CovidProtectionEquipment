<?php
      include "include/header.php";
      include "include/sidebar.php";
      date_default_timezone_set("Asia/Dhaka");
      $today = date("F j, Y, g:i a");

?>
<?php
      if(isset($_GET['deletePId'])){
        $pid = $_GET['deletePId'];
        $deleteQuery = "DELETE FROM products WHERE pid='$pid'";
        $deleteQueryResult = $db->delete($deleteQuery);
        if($deleteQueryResult){
          $deleteMessage = "Product deleted successfully!";
          
        }

      }
      if(isset($_GET['uId'])){
        $uId = $_GET['uId'];
      }
      if(isset($_GET['orderProcced'])){
        $userId = $_GET['orderProcced'];
        $orderProcced = $ct->orderProcced($userId);

        if($orderProcced){
         // header("Location:totalOrder.php");
         ?>
         <script>
             window.location.assign("../tables/totalOrder.php");
         </script>
         <?php
        }

      }
     

?>

  <!-- Main Sidebar Container -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
             Please Collect and check your products if any problem let us know! Thanks for shopping with us
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Admin
                    <small class="float-right"><?php echo $today; ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>BT Nirob</strong><br>
                    Khilkhet, Dhaka-1229<br>
                   
                    Phone: 01772242616<br>
                    Email: info@moricika.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <?php
              $customerQuery = "SELECT * FROM user where userId = '$uId'";
              $customerQResult =$db->select($customerQuery);
              if($customerQResult){
                $result = $customerQResult->fetch_assoc();
                  $customerName = $result['userName'];
                  $customerEmail = $result['userEmail'];
                  $customerAddress = $result['userAddress'];
                  echo "<strong>".$customerName."</strong><br>";
                  echo $customerEmail."<br>";
                  echo $customerAddress."<br>";

               
              }



?>
                  </address>
                </div>
                <?php
              $customerQuery = "SELECT orderId FROM orderProduct where uId = '$uId'";
              $customerQResult =$db->select($customerQuery);
              if($customerQResult){
                $result = $customerQResult->fetch_assoc();
                  $orderId = $result['orderId'];
              }
                  ?>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #007612</b><br>
                  <br>
                  <b>Order ID:</b> <?php echo $orderId; ?><br>
                  
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Serial #</th>
                      <th>Product</th>
                      <th>Size</th>
                      <th>Unit Price</th>
                      <th>Quantity</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $counter = 0;
                    $subtotal = 0;
               $pQuery = "SELECT * FROM orderProduct o, products p WHERE o.pId = p.pid AND o.uId = '$uId'";
               $qResult = $db->select($pQuery);
               if($qResult)
               {
                 while($result = $qResult->fetch_assoc()){
                   $counter++;
                 
                   $pname = $result['pname'];
                   $psize = $result['psize'];
                   $pprice = $result['pprice'];
                   
                   $quantity = $result['oQuantity'];
                   
                   $subtotal = $subtotal+$pprice;
                


                   echo "<tr>";
                   echo "<td>".$counter."</td>";

                   echo "<td>".$pname."</td>";
                   
                   echo "<td>".$psize."</td>";
                   
                   echo "<td>".$pprice."</td>";
                   echo "<td>".$quantity."</td>";
               
                   echo "</tr>";
 
                    }
                  }
                  $deliveryCharge = 30;
                  $totalFee = $subtotal+$deliveryCharge;

                  ?>
                  
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <img src="../../dist/img/credit/visa.png" alt="Visa">
                  <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                  <img src="../../dist/img/credit/american-express.png" alt="American Express">
                  <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    We currently do not allow this online payment sytem rather we accept case on delivery system, Hope you will start online payment soon
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                 
                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td><?php echo $subtotal; ?> TK</td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <td><?php echo $deliveryCharge; ?> TK</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td><?php echo $totalFee; ?> TK</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  
                  <a href="?orderProcced=<?php echo $uId; ?>" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Order proccessed
                  </a>
                  <button type="button" onclick="window.print()" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer no-print">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0-pre
    </div>
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
