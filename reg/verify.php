 
 
<?php
session_start();
include "../connection.php";
if(isset($_GET['hash'])){
   
    if($_GET['hash'] == $_SESSION['hash']){
        $insert = $connection->prepare(" INSERT INTO user_register (`username`, `email`, `password`)VALUES(?,?,?)");
        $insert->bind_param("sss",$_SESSION['username_t'] , $_SESSION["email_t"] , $_SESSION["password"]);
        $sucess =$insert->execute() or die($connection->mysqli_error); //advanced php syntax to fire insert query        
        if ($sucess) {
            
            $_SESSION['is_login'] = "true";
            $_SESSION['email'] = $_SESSION["email_t"];
            $_SESSION["userName"] = $_SESSION['username_t'];
            $_SESSION['hash'] = substr(sha1(time()), 0, 20);
            $_SESSION['verified'] ="true";
            if(isset($_SESSION['previous_location'])){
            //   echo " <script> location.href = ". $_SESSION['previous_location']  . " </script> ";
        header("Location:../". $_SESSION['previous_location'] ." ");
      }else{
        header("Location: ../index.php");
            //   echo " <script> location.href = ../index.php ; </script> ";
            }
        }
}}
?> 

 