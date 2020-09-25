<?php

// session_start();
// include "connection.php";

// echo "User Name :- ";
// echo $_SESSION["userName"];
// echo "<br>";
// echo "Email :- ";
// echo $_SESSION["email"];
// // echo "<br>";
// echo "<br>";

$to      = "cashforapp39@gmail.com"; // Send email to our user
$subject = 'Signup | Verification'; // Give the email a subject 
$message = '
 
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
  
'; // Our message above including the link
                     
$headers = 'From:noreply@yourwebsite.com' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); 



?>
