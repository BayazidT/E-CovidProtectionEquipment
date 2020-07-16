<?php
    include "inc/header.php";
?>
<?php
		
		
		include "lib/database.php";
		 include "config/config.php";
		   include "helper/formate.php";
		
?>
<?php
		$db=new Database();
		$fm = new Formate();
?>
<body class="bg-white">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Post For Tuition</div>
      <div class="card-body">
	  <?php
		         if($_SERVER["REQUEST_METHOD"]=="POST"){
             $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name    = $_FILES['image']['name'];
            $file_size    = $_FILES['image']['size'];
            $file_tmpname = $_FILES['image']['tmp_name'];

            $div = explode('.',$file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()),0, 10).'.'.$file_ext;
            $uploaded_image = $unique_image;
            if (empty($file_name)) {
               echo "<span class='error'>Please Select any Image !</span>";
              }elseif (in_array($file_ext, $permited) == false) {
               echo "<span class='error'>You can upload only:-"
               .implode(', ', $permited)."</span>";
              } else{
           move_uploaded_file($file_tmpname,"image/".$uploaded_image);
            //move_uploaded_file($file_tmpname,  $uploaded_image);

            /*$query     = "INSERT INTO  tbl_image(image) values('$uploaded_image')";
            $inserted_rows =$db->insert($query);

            if($inserted_rows){
              echo "<span class='success'>Image inserted succefully</span>";
            }else{
               echo "<span class='error'>Image is not inserted succefully</span>";
            }*/

              }
			
		}
		?>
		<?php
		if(isset($_POST['post'])){
			
			
			  $title = mysqli_real_escape_string($db->link, $_POST['title']);
			  $name = mysqli_real_escape_string($db->link, $_POST['name']);
		      $institute = mysqli_real_escape_string($db->link, $_POST['institute']);
			  $mobile = mysqli_real_escape_string($db->link, $_POST['mobile']);
		      $description = mysqli_real_escape_string($db->link, $_POST['editor1']);
		      $location = mysqli_real_escape_string($db->link, $_POST['location']);
		      $gender = mysqli_real_escape_string($db->link, $_POST['gender']);
		      $userid = mysqli_real_escape_string($db->link, $_POST['userid']);
	

		   if($name==''|| $title==''|| $institute==''|| $description==''|| $location==''|| $mobile==''|| $gender==''){
			   $error = "Field must not be empty";
		   }
		        
		   else{
			   $query= "INSERT INTO user_post(title,name,institute,description,location,image,mobile,gender,userid) Values('$title', '$name', '$institute', '$description', '$location', '$uploaded_image', '$mobile', '$gender','$userid')";
				$create = $db->insertpost($query);
				
		   
		   }
		   
		   }
		 function validate($data){
		   $data = trim($data);
		   $data = stripcslashes($data);
		   $data = htmlspecialchars($data);  
			return $data;
	   }
		
		?>


        <form action="post.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
		  <label for="inputTitle">Title</label>
            
              <input type="text" id="inputTitle" class="form-control" name="title" required="required">
            
          </div>
		  <div class="form-group">
		  <label for="inputTitle"> Your Name</label>
            
              <input type="text" id="inputTitle" class="form-control" name="name" required="required">
              <input type="hidden"  name="userid" value = "<?php echo session::get('userid'); ?>" class="form-control"/>
            
          </div>
		  <div class="form-group">
		  <label for="inputTitle">Current Institute</label>
            
              <input type="text" id="inputTitle" class="form-control" name="institute" required="required">
              
            
          </div>
		  <div class="form-group">
		  <label for="inputTitle">Mobile Number</label>
            
              <input type="text" id="inputTitle" class="form-control" name="mobile" required="required">
              
            
          </div>
		   <div class="form-group">
		   <label>Description</label>
           <textarea name="editor1" class="myeiditor"></textarea>
							<script>
									CKEDITOR.replace( 'editor1' );
							</script>
            
          </div>
		   <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
			  <label >Your Location</label>
                <div class="form-label-group">
                  
                     <select name="location"  class="form-control" >
								<option placeholder="none">Select</option>
								<option placeholder="Bashundhara">Bashundhara</option>
								<option placeholder="Khilkhet">Khilkhet</option>
								<option placeholder="Uttara">Uttara</option>
								<option placeholder="Gulshan">Gulshan</option>
								<option placeholder="Baridhara">Baridhara</option>
								<option placeholder="Badda">Badda</option>
								<option placeholder="Aftabnogor">Aftabnogor</option>
								<option placeholder="Bonosri">Bonosri</option>
								<option placeholder="Rampura">Rampura</option>
								<option placeholder="Dhanmondi">Dhanmondi</option>
								<option placeholder="Mowchak">Mowchak</option>
								<option placeholder="Santinogor">Santinogor</option>
								<option placeholder="Khilgaon">Khilgaon</option>
								<option placeholder="Bashabo">Bashabo</option>
								<option placeholder="Komlapur">Komlapur</option>
								<option placeholder="Motijeel">Motijeel</option>
								<option placeholder="Sayedabad">Sayedabad</option>
								<option placeholder="Jatrabari">Jatrabari</option>
								<option placeholder="Ajimpur">Ajimpur</option>
								<option placeholder="Lalmatia">Lalmatia</option>
								<option placeholder="Mohammadpur">Mohammadpur</option>
								<option placeholder="Mirpur">Mirpur</option>
								<option placeholder="Brahmanbaria">Brahmanbaria</option>
								
						</select>
                </div>
              </div>
              <div class="col-md-6">
			  <label >Your Gender</label>
                <div class="form-label-group">
                  <input type="radio" name="gender" value="female">Female
			      <input type="radio" name="gender" value="male">Male *
                </div>
              </div>
            </div>
          </div>
		  <div class="form-group">
				<label for="picture">Upload your picture.</label><br>
				<input type="file" name="image"  />
			</div>
          
          <button type="submit" name="post" class= "btn btn-primary btn-block">Submit</button>
        </form>
		<br>
        <div class="text-center">
    
          <a class= "btn btn-success" href="indexusr.php">Go back</a>
        </div>
		
      </div>
    </div>
  </div>
  <div>
		..
		</div>

</div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>
  
  <script src="js/vendor/modernizr-3.7.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>
   <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set','transport','beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async defer></script>

</body>

</html>

