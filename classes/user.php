<?php
     $filepath = realpath(dirname(__FILE__));
     include_once ($filepath."/../lib/database.php");
     include_once ($filepath."/../helper/formate.php");

    class User{
      
            private $db;
            private $fm;

            public function __construct(){
                $this->db= new Database();
                $this->fm = new Formate();

            }

        
    }


?>