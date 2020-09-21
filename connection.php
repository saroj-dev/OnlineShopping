<?php 

$database = "onlineshopping";
$hostName = "localhost";
$password = "";
$userName = "root";

$connection  = new mysqli( $hostName ,  $userName , $password , $database ) ;
if($connection->connect_error){
    die( $connection->connect_error );
}
 
 

?>
