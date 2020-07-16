<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath."/../lib/database.php");
    

    class Product{
      
            private $db;
           

            public function __construct(){
                $this->db= new Database();
              
            }

            public function getproduct($pid){
                $query = "SELECT * FROM products where pid='$pid'";
                $result = $this->db->select($query);
                return $result;
            }

        
    }


?>