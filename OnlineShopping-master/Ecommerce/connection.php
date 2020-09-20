<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'service management system';

$con  = mysqli_connect($server,$username,$password,$database);

 if($con==false){
  echo "not done";
   
}  
?>