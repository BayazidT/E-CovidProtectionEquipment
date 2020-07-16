<?php
 include "../lib/database.php";
 include "../config/config.php";
 include "../lib/session.php";


 $db=new Database();

   if($_SERVER['REQUEST_METHOD']== 'POST'){

    $adminEmail = mysqli_real_escape_string($db->link, $_POST['adminEmail']);
    $adminPassword = mysqli_real_escape_string($db->link, $_POST['adminPassword']);
      if(empty($adminEmail) || empty($adminPassword)){
          $logMessage = "Field must not be empty!";
          return $logMessage;
      }else{
          $query = " SELECT * FROM admin where email = '$adminEmail' AND password = '$adminPassword'";
          $result = $db->select($query);
          if($result != false){
              $value = $result->fetch_assoc();

              Session::init();
              Session::set("adminLogin", true);
              Session::set("adminId", $value['aid']);
              Session::set("adminEmail", $value['email']);
              Session::set("adminSecurity", $value['security']);
              header("Location:index.php");
          }else{
            header("Location:login.php");
          }

      }

  }