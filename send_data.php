<?php
function send_data($data , $prev){
    include "connection.php";

    session_start();

    if(isset($_SESSION['is_login'])){
        if(isset($_SESSION['previous_location'])){
            header("Location:". $_SESSION['previous_location'] ." ");       
        }else{
        header("Location: ../index.php");
        }
     
        $email = $_SESSION['email'];
        $send = $connection->prepare("INSERT INTO `userinfo`(`emailAddress`, `cart`) VALUES (? , ? )");
        $send->bind_param("ss", $email , $data);
        if($send->execute()){
        if($prev == "i"){
            header("location:./index.php");
           }
           if($prev == "p"){
               header("location:product/product.php");
           }  
      }
  else{
         
    }
    }
     

 else{
     header("location:reg/login.php");
    
 }
}

send_data($_GET['addtocart'], $_GET['from']);

?>