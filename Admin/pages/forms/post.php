<?php
    include "../../../lib/database.php";
    include "../../../config/config.php";

    $db=new Database();

?>

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
		if(isset($_POST['postProduct'])){
			
			
			  $pname = mysqli_real_escape_string($db->link, $_POST['pname']);
			  $psize = mysqli_real_escape_string($db->link, $_POST['psize']);
		      $pquantity = mysqli_real_escape_string($db->link, $_POST['pquantity']);
			  $pcategory = mysqli_real_escape_string($db->link, $_POST['pcategory']);
		      $pdescription = mysqli_real_escape_string($db->link, $_POST['pdescription']);
		      $pspecification = mysqli_real_escape_string($db->link, $_POST['pspecification']);
		      $ptype = mysqli_real_escape_string($db->link, $_POST['ptype']);
		    
	

		   if($pname==''|| $psize==''|| $pquantity==''|| $pcategory==''|| $pdescription==''|| $pspecification==''){
			   $error = "Field must not be empty";
		   }
		        
		   else{
			   $query= "INSERT INTO products(pname,psize,pquantity,pcategory,pdescription,pspecification,pprice,pimage) Values('$pname', '$psize', '$pquantity', '$pcategory', '$pdescription', '$pspecification', '$ptype', '$uploaded_image')";
				 $create = $db->insert($query);
				 if($create){
					 header("Location:../../index.php");
				 }
				
		   
		   }
		   
		   }
		 function validate($data){
		   $data = trim($data);
		   $data = stripcslashes($data);
		   $data = htmlspecialchars($data);  
			return $data;
	   }
		
		?>