<?php
include "connection.php";
session_start();
if(isset($_COOKIE['setthecookie'])){
  echo ' <script> alert("Please login first.."); </script> ';
  header("Location:loginredirect.php");

}else{
  echo "  ";
}
if(isset($_REQUEST['submit'])){
$email =  trim ($_REQUEST['email']);
$password =  trim  (md5($_REQUEST['password']) );
// echo md5($password);
if($_REQUEST['email'] == "" ||  $_REQUEST['password']==""){
  $error_mess = '<div class="not"> Please fill the form to login </div> ';
}else{

$select = "SELECT email, password FROM user_register WHERE email = '".$email."' AND password = '".$password."'limit 1 ";
$fire_select = $con->query($select);

if($fire_select->num_rows > 0){
  // $_SESSION['is_login'] = true;
  // $_SESSION['email'] = $email;
  setcookie("setthecookie","$email",time()+(86400)*30);
  echo " <script> location.href = 'loginredirect.php'; </script> ";
  // echo "Login sucessfully";
  exit;
}else{
  $error_mess = '<div class="warning"> Please enter corret email and pasword</div> ';
   
}
}

}

  

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="google-signin-client_id" content="535148229856-m10rniu317a6q34uu6lebr91kfj1pcr7.apps.googleusercontent.com">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/login_register.css">
    <style>
    .warning{
  background-color:#ffcccb;
  font-size:13px;
    font-size:17px;
    text-align:center;
    margin-top:30px;
    padding:10px ;

}
.sucess{
    font-size:13px;
    font-size:17px;
    text-align:center;
    margin-top:30px;
    background-color:#b5ebb5;
    padding:10px ;
}
.not{
    font-size:13px;
    font-size:17px;
    text-align:center;
    margin-top:30px;
    background-color:#ffd599f6;
}
     .back{
 
      background: linear-gradient(-135deg, #c850c0, #4158d0);
      border:0;
      outline:0;
      color:#fff;
      padding:10px 7px;
      font-size:15px;
      font-weight:500;
      border-radius:20px;
      cursor:pointer;
}
    </style>
</head>
 
     
      <body>
        <div class="wrapper">
					<div class="form">
          <div class="title">  Login Here  </div>
   				 <form method="POST">
            <div class="field">
              <input type="text"   name="email" required>
              <label>Email</label>
            </div>
    				<div class="field">
              <input type="password"  name="password" required>
              <label>Password</label>
            </div>
     
    				<div class="field">
              <input type="submit" value="Login" name="submit">
            </div>

						<div class="or">OR</div>
            
  
    				<div class="g-signin2" data-width="300px" data-height="50px" data-onsuccess="onSignIn"></div>
						<p class="signup-link">Don't have an account? <a href="./registeration.php">Create one</a></p>
            <?php if(isset($error_mess)) { echo "$error_mess";}?>

    			 </form>
					 </div>

					<div class="form__image">

						<img src="images/secure.login.svg" alt="image" />

					</div>
    		</div>
   

 
    </html>
<script src="https://apis.google.com/js/platform.js" async defer></script>

    <script>
    if ( window.history.replaceState ) {
      x= window.location.href;
        window.history.replaceState( null, null, x );
          
    }


    function onSignIn(googleUser) {
      alert("sure")

  var profile = googleUser.getBasicProfile();
 alert('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  alert('Name: ' + profile.getName());
  alert('Image URL: ' + profile.getImageUrl());
  alert('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
}


</script>
</body>
</html>