<?php
if(!isset( $_COOKIE['setthecookie']  )){
    header("Location:login.php");
  }else{
    echo  $_COOKIE['setthecookie'] ;
  }
?>