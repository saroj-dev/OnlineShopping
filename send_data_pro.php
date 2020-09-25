<?php
session_start();
function send_data($data){
    include "connection.php";
    if(isset($_SESSION['is_login'])){ 
        $email = $_SESSION['email'];
        $send = $connection->prepare("INSERT INTO `userinfo`(`emailAddress`, `cart`) VALUES (? , ? )");
        $send->bind_param("ss", $email , $data);
        if($send->execute()){
            header("location: product/product.php". $_SESSION['previous_location_add_buy']);
        }
  else{
         echo "soory pls.. try again .. ";
    }
    }
 else{
     $_SESSION['previous_location'] = "product/product.php?keyword=".$data ;
     echo $_SESSION['previous_location'] ; 
    //  header("location:reg/login.php");
    
 }
}

send_data($_GET['keyword']);

?>