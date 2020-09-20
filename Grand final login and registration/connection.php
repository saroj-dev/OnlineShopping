<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'registration_shopping';

$con  = mysqli_connect($server,$username,$password,$database);

 if($con==false){
  echo "not done";
   
}  
?>