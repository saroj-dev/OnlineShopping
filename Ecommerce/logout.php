<?php

//logout.php
include('config.php');
$google_client->revokeToken($_SESSION[ 'access_token' ]); // commenter le vaneko
  // $google_client->revokeToken(); //yo web lesson le vaneko
session_destroy();
header('location:login.php');
?>
