<?php
      include "include/header.php"

      ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
            <div class="card col-md-4 " style="margin:20px;">
                <div class="card-body">

                <p style="text-align:center;font-size:22xp;color:#444;">User Login</p>

                <?php
                if(isset($_GET['logMessage'])){
                    $message = $_GET['logMessage'];
                    echo "<p style='text-align:center; color:green;'>".$message."</p>";
                }


?>
<hr>
                <?php
                if($_SERVER['REQUEST_METHOD']== 'POST'){

                    $userEmail = mysqli_real_escape_string($db->link, $_POST['userEmail']);
                    $userPassword = mysqli_real_escape_string($db->link, $_POST['userPassword']);
                      if(empty($userEmail) || empty($userPassword)){
                          $logMessage = "Field must not be empty!";
                          echo "<p style='color:red'>".$logMessage."</p>";
                      }else{
                          $query = " SELECT * FROM user where userEmail = '$userEmail' AND userPassword = '$userPassword'";
                          $result = $db->select($query);
                          if($result != false){
                              $value = $result->fetch_assoc();
                
                              Session::init();
                              Session::set("userLogin", true);
                            
                              Session::set("userId", $value['userId']);
                              $_SESSION['userName'] = $value['userName'];
                              $_SESSION['userEmail'] = $value['userEmail'];
                           //   Session::set("userEmail", $value['userEmail']);
                           //   Session::set("userName", $value['userName']);
                              header("Location:index.php");
                          }else{
                            $logMessage = "Email or password doesn't match!";
                          echo "<p style='color:red'>".$logMessage."</p>";
                          }
                
                      }
                
                  }

                ?>
            <form action="login.php" method="POST" >
                   
                            <div class="form-group">
                                <input type="email" name="userEmail" class="form-control" required="required" placeholder="email">
                            </div>
                        
                       
                            <div class="form-group">
                                <input type="password" name="userPassword" class="form-control" required="required" placeholder="Password">
                            </div>
                       <input type="submit" class="btn btn-primary btn-block" value="Login"/>
                    
                </form>
               <small> <a href="registration.php">Create new account?</a>
               <a href="forgetPassword.php">Forget password</a></small>
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