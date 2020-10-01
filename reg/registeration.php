<?php
 session_start();
 $ok = "false";
if(isset($_SESSION['verified'])){
    if(isset($_SESSION['is_login'])){

    if(isset($_SESSION['previous_location'])){
        header("Location:". $_SESSION['previous_location'] ." ");       
    }else{
    header("Location: ../index.php");
    }
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
                            if ($lenuser > 5) {
                                $_SESSION["clicked_with_data_verification"] = "true";
                                $ok = "true";
                                $_SESSION['username_t']  = $username;
                                $_SESSION["email_t"] = $email;
                                $_SESSION["password"] = $password;
                                $error_mess = '<div class="sucess">Account Created successfully <br> Click The link thet we send to your <br> Provided mail address.</div> ';
                                } else {
                                    $error_mess = '<div class="sucess">error</div> ';
                                }
                            } else {
                                $error_mess = '<div class="not">Username must be more than 8 chracter</div> ';
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
  <input type="submit"  id="submit_check"value="Create  " name="submit">
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
  <script src="https://smtpjs.com/v3/smtp.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


  <script>
  if ( window.history.replaceState ) {
  x= window.location.href;
  window.history.replaceState( null, null, x );

  } 
  <?php 
  if($ok == "true"){
    $_SESSION['hash'] = substr(sha1(time()), 0, 20);
?>

Email.send({
          SecureToken: "0595beeb-b765-4993-87ac-cd91bf333730",
          To: "<?php echo $_SESSION['email_t'] ;?>",
          From: "proudnepal.it@gmail.com",
          Subject: "Proud Nepal It suppliers",
          Body:'<div class="container" style = "width:70%; margin:0 auto; "><h1 style="font-size:3em; color:rgba(51, 51, 51, 0.767); ">Email Verification</h1><p style="font-size:1.5em; color:rgba(51, 51, 51, 0.76)">Thank you, New user for the email registeration your email is registered successfully but before you continue you need to verify your email address<br>Click the button below to activate your account thank you.<br><br>&nbsp;&nbsp;&nbsp;<small style="color:#e46a23;">*Note : If you have any question than feel free to sen a mail in this address.</small></p><br><br><br><a href="localhost/GitHub/OnlineShopping/reg/verify.php?hash=<?php echo $_SESSION['hash']?>" style="text-decoration:none; color:#fff; background:#333; font-size:1.8em; padding:20px 40px; border-radius:5px; position:absolute; left:50%; transform:translate(-50% , 0)">Activate</a></div>' ,
           
        }).then(message => {
        });


<?php
  }
  ?>
  function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
var link = "../index.php?Name="+profile.Name()+"&Email="+profile.getEmail()+"&Imageurl="+profile.getImageUrl;
window.location.href = link ;
  }

  
  </script>
  </body>
  </html>
