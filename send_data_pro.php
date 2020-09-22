<?php
function send_data($data){
    include "connection.php";

    session_start();

    if(isset($_SESSION['is_login'])){ 
        $email = $_SESSION['email'];
        $send = $connection->prepare("INSERT INTO `userinfo`(`emailAddress`, `cart`) VALUES (? , ? )");
        $send->bind_param("ss", $email , $data);
        if($send->execute()){
            if(isset($_SESSION['previous_location'])){

            header("location: product/product.php". $_SESSION['previous_location_add_buy']);
            }
            else{
     header("location:reg/login.php");

            }
        }
  else{
         echo "soory pls.. try again .. ";
    }
    }
     

 else{
     header("location:reg/login.php");
    
 }
}

send_data($_GET['keyword']);

?>