<?php
      include "include/header.php";
      include "include/sidebar.php";

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Text Editors</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Text Editors</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-10">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Bootstrap WYSIHTML5
                <small>Simple and fast</small>
              </h3>
              <!-- tools box -->
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fas fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <form>
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Product Name</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                </div> 
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Size(gm)</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter product size">
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                      <label>Quantity</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter product quantity">
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Category</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter product category">
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                      <label>Product Type</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter product type">
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col -->
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Company Name</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter company name">
                </div>
                <div class="form-group">
                  <label for="">Description</label>
                
                    <textarea class="textarea" placeholder="Place some text here"
                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
                <div class="form-group">
                  <label for="">Specification</label>
                
                    <textarea class="textarea" placeholder="Place some text here"
                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="exampleInputFile">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                   
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Minimal</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter company name">
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                      <label>Disabled</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter company name">
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Multiple</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter company name">
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                      <label>Disabled Result</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter company name">
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col -->
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
            <!-- /.card-header -->
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
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
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Summernote -->
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
</body>
</html>
