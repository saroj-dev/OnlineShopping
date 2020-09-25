<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'onlineshopping';

$con  = mysqli_connect($server,$username,$password,$database);

 if($con==false){
  echo "not done";
   
}  
?>