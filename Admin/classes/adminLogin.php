<?php
      include "../lib/session.php";
      include_once "../lib/database.php";
      include_once "helper/formate.php";

     // Session::checkSession();
    class adminLogin{
        private $db;
        private $fm;
        public function _construct(){
            $this->db = new Database();
            $this->fm = new Formate();


        }
        public function adminLoginCheck($email, $password){
            $adminEmail = $this->fm->validate($email);
            $adminPassword = $this->fm->validate($password);
            $adminEmail = mysqli_real_escape_string($this->db->link, $adminEmail);
            $adminPassword = mysqli_real_escape_string($this->db->link, $adminPassword);

            if(empty($adminEmail) || empty($adminPassword)){
                $logMessage = "Field must not be empty!";
                return $logMessage;
            }else{
                $query = " SELECT * FROM admin where email = '$adminEmail' AND password = '$adminPassword'";
                $result = $this->db->select($query);
                if($result != false){
                    $value = $result->fetch_assoc();

                    Session::set("adminLogin", true);
                    Session::set("adminId", $value['aid']);
                    Session::set("adminEmail", $value['email']);
                    header("Location:index.php");
                }else{
                    $logMessage = "Information doesn't match!";
                    return $logMessage;
                }

            }

        }
    }


