<?php
      include "include/header.php";
      include "include/sidebar.php";

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

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Total Orders!</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Orders</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Total Products List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php
              if(isset($deleteMessage)){
                echo "<p style='text-align:center;color:green'>".$deleteMessage."</p>";
              }


?>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Product Name</th>
                    <th>Company Name</th>
                    <th>Size</th>
                    <th>Category(s)</th>
                    <th>Price</th>
                    
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
  <?php
               $pQuery = "SELECT DISTINCT  u.userId, u.userName, u.userEmail,u.userAddress,o.orderId FROM orderProduct o, user u, products p WHERE o.pid = p.pid AND o.uId = u.userId";
               $qResult = $db->select($pQuery);
               if($qResult)
               {
                 while($result = $qResult->fetch_assoc()){
                  $uId = $result['userId'];
                   $pname = $result['userName'];
                   $pcompany = $result['userEmail'];
                   $psize = $result['userAddress'];
                   $pcategory = $result['orderId'];
                   $pprice = $result['userId'];
                 


                   echo "<tr>";

                   echo "<td>".$pname."</td>";
                   echo "<td>".$pcompany."</td>";
                   echo "<td>".$psize."</td>";
                   echo "<td>".$pcategory."</td>";
                   echo "<td>".$pprice."</td>";
                   ?>

                     <td> <a href="../../pages/examples/invoice.php?uId=<?php echo $uId; ?>" >Details </a>||<a style="color:red;" onclick="return confirm('Are you sure to delete ?')"href="?deletePId=<?php echo $pid; ?>" > Delete</a></td>
<?php


               
                   echo "</tr>";
 
                    }
                  }

                  ?>
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Product Name</th>
                    <th>Company Name</th>
                    <th>Size</th>
                    <th>Category(s)</th>
                    <th>Price</th>
                    
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
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
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
