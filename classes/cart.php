<?php

    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath."/../lib/database.php");

   
    class Cart{
      
            private $db;
           

            public function __construct(){
                $this->db= new Database();
             

            }

        public function addToCart($pid, $quantity){
            $quantity = mysqli_real_escape_string($this->db->link, $quantity);
            $pid = mysqli_real_escape_string($this->db->link, $pid);
            $sid = session_id();
            $flag = 0;

            $sQuery = "SELECT * FROM cart where sid='$sid'";
            $sResult = $this->db->select($sQuery);
            if($sResult){
                while($cResult = $sResult->fetch_assoc()){
                    $pExists = $cResult['pid'];
                    if($pid == $pExists){
                        $flag = 1;
                        $logMessage = "Product already added!";
                        return $logMessage;
                    }
                }
            }
            if($flag){

            }else{
                $query = "INSERT INTO cart(pid, sid, quantity)values('$pid','$sid', '$quantity')";
                $inserted = $this->db->insertcart($query);
                if($inserted){
                header("Location:cartDetails.php");
                }

            }
                

        }
        public function addToCartDirect($pid, $quantity){
            $quantity = mysqli_real_escape_string($this->db->link, $quantity);
            $pid = mysqli_real_escape_string($this->db->link, $pid);
            $sid = session_id();
            $flag = 0;

            $sQuery = "SELECT * FROM cart where sid='$sid'";
            $sResult = $this->db->select($sQuery);
            if($sResult){
                while($cResult = $sResult->fetch_assoc()){
                    $pExists = $cResult['pid'];
                    if($pid == $pExists){
                        $flag = 1;
                        $logMessage = "Product already added!";
                        return $logMessage;
                    }
                }
            }
            if($flag){

            }else{
                $query = "INSERT INTO cart(pid, sid, quantity)values('$pid','$sid', '$quantity')";
                $inserted = $this->db->insertcart($query);
                if($inserted){
                    $logMessage = "Product added to the cart!";
                    return $logMessage;
                }

            }
                

        }
       
        public function getCartProduct($shefa){
            $queryCart= "SELECT * FROM products p, cart c where c.sid='$shefa' AND p.pid=c.pid";
            $totalCart=$this->db->select($queryCart);
            return $totalCart;
        }
        public function getOrderedProduct($shefa){
            $queryCart= "SELECT * FROM products p, orderProduct n where n.uId='$shefa' AND p.pid=n.pId";
            $totalCart=$this->db->select($queryCart);
            return $totalCart;
        }
        public function getOrderedProductNonUser($shefa){
            $queryCart= "SELECT * FROM products p, orderProductNonUser n where n.sId='$shefa' AND p.pid=n.pId";
            $totalCart=$this->db->select($queryCart);
            return $totalCart;
        }

        public function updateCart($pId, $pQuantity){
            $quantity = mysqli_real_escape_string($this->db->link, $pQuantity);
            $pid = mysqli_real_escape_string($this->db->link, $pId);
            $sid = session_id();
            $uQuery="UPDATE cart SET quantity = '$quantity' WHERE pid='$pid' AND sid = '$sid'";
            $uResult = $this->db->update($uQuery);
            if($uResult){
                $logMessage = "Quantity update successful";
                return $logMessage;
            }else{
                $logMessage = "Quantity update failed";
                return $logMessage;
            }



        }

        //Delete product method/function

        public function deleteProduct($dPId, $shefa){
            $dPId = mysqli_real_escape_string($this->db->link, $dPId);
            $shefa = mysqli_real_escape_string($this->db->link, $shefa);

            $dQuery = "DELETE FROM cart WHERE pid ='$dPId' AND sid = '$shefa'";
            $qResult = $this->db->delete($dQuery);

            if($qResult){
                $logMessage = "Product deleted successfully!";
                return $logMessage;
            }else{
                $logMessage = "Product delete failed!";
                return $logMessage;

            }
        }

        //Confirm order for user

        public function userConfirmOrder($shefa, $uId){
            $sId = mysqli_real_escape_string($this->db->link, $shefa);
            $userId = mysqli_real_escape_string($this->db->link, $uId);
            $orderId = rand(00000,99999);

            $query = "SELECT * FROM cart WHERE sid = '$sId'";
            $qResult = $this->db->select($query);
            if($qResult){
                while($result = $qResult->fetch_assoc()){
                    $pId = $result['pid'];
                    $quantity = $result['quantity'];
                    $insertQuery = "INSERT INTO orderProduct (pId, oQuantity, uId, orderId) Values('$pId', '$quantity', '$userId', '$orderId')";
                    $insertQResult = $this->db->insert($insertQuery);
                  


                } 
                    $deleteQuery = "DELETE FROM cart WHERE sid = '$sId'";
                    $deleteQResult = $this->db->delete($deleteQuery);
                    if($deleteQResult){
                        header("Location: ordersuccessful.php?orderId=$orderId");
                    }
                
            }





        }
        public function nonUserConfirmOrder($shefa, $uId){
            $sId = mysqli_real_escape_string($this->db->link, $shefa);
            $userId = mysqli_real_escape_string($this->db->link, $uId);
            $orderId = rand(00000,99999);

            $query = "SELECT * FROM cart WHERE sid = '$sId'";
            $qResult = $this->db->select($query);
            if($qResult){
                while($result = $qResult->fetch_assoc()){
                    $pId = $result['pid'];
                    $quantity = $result['quantity'];
                    $insertQuery = "INSERT INTO orderProductNonUser (pId, oQuantity, uId, sId, orderId) Values('$pId', '$quantity', '$userId','$sId', '$orderId')";
                    $insertQResult = $this->db->insert($insertQuery);
                  


                } 
                    $deleteQuery = "DELETE FROM cart WHERE sid = '$sId'";
                    $deleteQResult = $this->db->delete($deleteQuery);
                    if($deleteQResult){
                        header("Location: ordersuccessful.php?orderId=$orderId");
                    }
                
            }





        }
        //Admin queries
        public function orderProcced($uId){
            $userId = mysqli_real_escape_string($this->db->link, $uId);
           // $orderId = rand(00000,99999);

            $query = "SELECT * FROM orderProduct WHERE uId = '$userId'";
            $qResult = $this->db->select($query);
            if($qResult){
                while($result = $qResult->fetch_assoc()){
                    $pId = $result['pId'];
                    $quantity = $result['oQuantity'];
                    $orderId = $result['orderId'];
                    $insertQuery = "INSERT INTO orderProcced (pId, oQuantity, uId, orderId) Values('$pId', '$quantity', '$userId', '$orderId')";
                    $insertQResult = $this->db->insert($insertQuery);
                  


                } 
                    $deleteQuery = "DELETE FROM orderProduct WHERE uId = '$userId'";
                    $deleteQResult = $this->db->delete($deleteQuery);
                    if($deleteQResult){
                       return $deleteQResult;
                    }
                
            }
        }




    }


?>