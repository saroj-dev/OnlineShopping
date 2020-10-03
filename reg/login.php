<?php
 session_start();

if(isset($_SESSION['verified'])){
    if(isset($_SESSION['previous_location'])){
      header("Location:". $_SESSION['previous_location'] ." ");       
    }else{
    header("Location: ../index.php");  
}
}
else{
include "connection.php"; 
if(isset($_REQUEST['submit'])){
$email =  stripcslashes(trim ($_REQUEST['email']));
$password =  stripcslashes(trim(md5($_REQUEST['password'])) );
$email = mysqli_real_escape_string($con, $email);  
$password = mysqli_real_escape_string($con, $password);

if($_REQUEST['email'] == "" ||  $_REQUEST['password']==""){
  $error_mess = '<div class="not"> Please fill the form to login </div> ';
}else{
if($_REQUEST['email'] == "proudnepal.it@gmail.com" AND $_REQUEST['password'] == "2T@4[g{ck9B6aa251d8-d136-P-5tz/mGBY2p:S=68-a182-36815d6aa251d8-d136-4368-a182-36815dfa6be5;fa6be55Aa(Q;" ){
  
  $_SESSION['is_login'] = true;
  $_SESSION['email'] = $_REQUEST['email'];
  $_SESSION["userName"] = 'Admin';
  header("location: ../admin/index.php");
}
$select = "SELECT email, password , username FROM user_register WHERE email = ? AND password = ? limit 1 ";
$stmt = mysqli_stmt_init($con);
if(!mysqli_stmt_prepare($stmt, $select)){
  $error_mess = '<div class="not"> Unfortunately, an error happened </div> ';
}
else{
  mysqli_stmt_bind_param($stmt, 'ss', $email, $password);
  mysqli_stmt_execute($stmt);
  $fire_select = mysqli_stmt_get_result($stmt);

  if($fire_select->num_rows > 0){
    while($row = $fire_select->fetch_assoc()){
      $userName = $row["username"];
    }
    $_SESSION['is_login'] = true;
    $_SESSION['email'] = $email;
    $_SESSION["userName"] = $userName;
    if(isset($_SESSION['previous_location'])){
      header("Location: ../". $_SESSION['previous_location'] ." ");       
    }else{
    header("Location: ../index.php");  }
    exit;
  }else{
    $error_mess = '<div class="warning"> Please enter corret email and pasword</div> ';
  }

}


}

}}

  

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
  var profile = googleUser.getBasicProfile();
var link = "../index.php?Name="+profile.Name()+"&Email="+profile.getEmail()+"&Imageurl="+profile.getImageUrl;
window.location.href = link ;
  }
</script>
</body>
</html>