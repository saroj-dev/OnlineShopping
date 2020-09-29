<?php

include 'connection.php';
session_start();
// include "connection.php";
$q = $connection->prepare("DELETE  FROM `userinfo` WHERE emailAddress=? AND  cart=?");
$q->bind_param("ss", $_SESSION['email'], $_GET['keyword']);
$q->execute();



$Insert_order = $connection->prepare("INSERT INTO orders ( product_id, quantity, user_location, user_Phone_Number, user_gmail ) VALUES (?, ?, ?, ?, ?) ");
$Insert_order->bind_param("iisss" , $_GET['keyword'] , $_GET['qty'] , $_GET['usrloc'] , $_GET["phn"],$_GET["usreml"]);

if($Insert_order->execute()){
    header("location: product/product.php");
}
else{
    
} 
 


?>