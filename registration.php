<?php
      include "include/header.php"

      ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
            <div class="card col-md-6 " style="margin:20px;">
                <div class="card-body">

                <p style="text-align:center;font-size:22xp;color:#444;">User Registration</p>

                <?php
                if($_SERVER['REQUEST_METHOD']== 'POST'){

                    $userName = mysqli_real_escape_string($db->link, $_POST['userName']);
                    $userEmail = mysqli_real_escape_string($db->link, $_POST['userEmail']);
                    $userAddress = mysqli_real_escape_string($db->link, $_POST['userAddress']);
                    $userPassword = mysqli_real_escape_string($db->link, $_POST['userPassword']);
                      if(empty($userName)|| empty($userEmail) || empty($userPassword) ){
                          $logMessage = "Field must not be empty!";
                          echo "<p style='text-align:center;color:red'>".$logMessage."</p>";
                      }else{
                          $query = " INSERT INTO user (userName, userEmail, userAddress, userPassword) VALUES('$userName', '$userEmail', '$userAddress', '$userPassword')";
                          $result = $db->insertUser($query);
                          if($result != false){
        
                              header("Location:login.php?logMessage=Registration is successful!");
                          }
                
                      }
                
                  }

                ?>
            <form action="registration.php" method="POST" >


                            <div class="form-group">
                            <label>Name</label>
                                <input type="text" name="userName" class="form-control"  placeholder="Write your name...">
                            </div>
                   
                            <div class="form-group">
                            <label>Email</label>
                                <input type="email" name="userEmail" class="form-control"  placeholder="Write your email...">
                            </div>
                            <div class="form-group">
                            <label>Address :</label>
                                <input type="text" name="userAddress" class="form-control"  placeholder="Write your address...">
                            </div>
                        
                       
                            <div class="form-group">
                            <label>Password</label>
                                <input type="password" name="userPassword" class="form-control"  placeholder="Write your password...">
                            </div>
                       <input type="submit" class="btn btn-info btn-block" value="Register"/>
                    
                </form>
                <p> Already have an account?
               <a href="login.php">Login here</a></p>
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