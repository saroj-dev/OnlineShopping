<?php 
session_start();
include "connection.php";


$q = $connection->prepare("DELETE  FROM `userinfo` WHERE emailAddress=? AND  cart=?");


$q->bind_param("ss", $_SESSION['email'] , $_GET['keyword']);
        if($q->execute()){
            if(!isset($_GET['send'])){
                header("location:show_cart.php");
            }
            else{
                header("location: ./user_profile.php");
            }
        }
     
 
?>