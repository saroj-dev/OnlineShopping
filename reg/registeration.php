<?php
 session_start();
if(isset($_SESSION['is_login'])){
    if(isset($_SESSION['previous_location'])){
        header("Location:". $_SESSION['previous_location'] ." ");       
    }else{
    header("Location: ../index.php");
    }
}
    else{


include "connection.php";
if (isset($_REQUEST['submit'])) {
    if ($_REQUEST['username'] == "" || $_REQUEST['email'] == "" || $_REQUEST['password'] == "") {
        $error_mess = '<div class="warning">All feild are required</div> ';
    } else {
        if (!filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)) {
            $error_mess = '<div class="not">Please enter a valid Email </div> ';
        } else {
            if (!preg_match("/^[a-zA-Z'-]+$/", $_REQUEST['username'])) {
                $error_mess = '<div class="not">Please enter a valid  username (number,symbols & space not allowed) </div> ';
            } else {
                $emailcheck = " SELECT email FROM user_register WHERE email = '" . $_REQUEST['email'] . "' ";
                $result = $con->query($emailcheck);
                //for username
                $usercheck = " SELECT username FROM user_register WHERE username = '" . $_REQUEST['username'] . "' ";
                $result_user = $con->query($usercheck);
                if ($result->num_rows == 1) {
                    $error_mess = '<div class="not">Email Aleardy Registred. </div> ';
                    //str_replace(' ', '', $str) {used to remove the white space}
                    
                } else {
                    if ($result_user->num_rows == 1) {
                        $error_mess = '<div class="not">Username Already taken . </div> ';
                    } else {
                        //getting the variables and making them bullet proof:
                    //   🎯🎯🎯
                        $username =stripcslashes(str_replace(' ', '', ($_REQUEST['username']))) ;
                        $email = stripcslashes(str_replace(' ', '', ($_REQUEST['email'])));
                        $password =  stripcslashes( str_replace(' ', '', md5(($_REQUEST['password']))) );
                        $email = mysqli_real_escape_string($con, $email);  
                        $password = mysqli_real_escape_string($con, $password);
                        $username = mysqli_real_escape_string($con, $username);


                        $lenpass = strlen($password); //len of pass
                        $lenuser = strlen($username); //len of username
                        if ($lenpass > 8) {
                            if ($lenuser > 8) {
                                $insert = $con->prepare(" INSERT INTO user_register (`username`, `email`, `password`)VALUES(?,?,?)");
                                $insert->bind_param("sss",$username , $email , $password);
                                $sucess =$insert->execute(); //advanced php syntax to fire insert query
                                if ($sucess) {
                                   
                                    $error_mess = '<div class="sucess"> Created Sucessfully</div> ';
                                    $_SESSION['is_login'] = true;
                                    $_SESSION['email'] = $email;
                                    $_SESSION["userName"] = $username;

                                    if(isset($_SESSION['previous_location'])){
                                    //   echo " <script> location.href = ". $_SESSION['previous_location']  . " </script> ";
                                header("Location:../". $_SESSION['previous_location'] ." ");       
                                }else{
                                header("Location: ../index.php");  

                                    //   echo " <script> location.href = ../index.php ; </script> ";
                                    }


                                } else {
                                    $error_mess = '<div class="not">unable to create Account.</div> ';
                                }
                            } else {
                                $error_mess = '<div class="not">Username must be more than 8 chracter</div> ';
                            }
                        } else {
                            $error_mess = '<div class="not">May be you entered white space OR pass is less than 8 chracter</div> ';
                        }
                    }
                }
            }
        }
    }
}
    }
?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
  <meta charset="UTF-8">
  <meta name="google-signin-client_id" content="535148229856-m10rniu317a6q34uu6lebr91kfj1pcr7.apps.googleusercontent.com">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Register Here</title>
  <link rel="stylesheet" href="../css/login_register.css">

  <style>
  .not{
  font-size:13px;
  font-size:17px;
  text-align:center;
  margin-top:30px;
  background-color:#ffd599f6;
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
  .warning{
  background-color:#ffcccb;
  font-size:13px;
  font-size:17px;
  text-align:center;
  margin-top:30px;
  padding:10px ;
  }
  .centerlogin{
  text-align:center;
  }
  .hide{
  display:none;
  }
  </style>

  </head>
  <body>
    
  <div class="wrapper">
  
  <div class="form">
  <div class="title">Create an Account</div>

  <form   method="POST"   autocomplete="off">
  <div class="field">
  <input type="text"   name="username" required>
  <label>Username</label>
  </div>
  <div class="field">
  <input type="text" name="email" required>
  <label>Email</label>
  </div>
  <div class="field">
  <input type="password" name="password" required>
  <label>Create Password</label>
  </div>

  <div class="field">
  <input type="submit" value="Create  " name="submit">
  </div>

  <div class="or">OR</div>


  <div class="g-signin2" data-width="300px" data-height="50px" data-onsuccess="onSignIn"></div>
  <p class="signup-link">Already have an account? <a href="./login.php">Sign in</a></p>
  <p class="hide">
  <?php
if (isset($error_mess)) {
    echo "$error_mess";
}
?>
  <?php
if (isset($redirect)) {
    echo "$redirect";
}
?>

  </p>

  </form>
  
  </div>

  <div class="form__image">

  <img src="images/login.shopping.svg" alt="image" />

  </div>

  </div>


  <!-- <script src="https://apis.google.com/js/platform.js" async defer></script> -->

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
