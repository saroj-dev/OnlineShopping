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
                                $error_mess = '<div class="sucess">Account Created successfully <br> Click The link thet we send to your <br> Provided mail address. <a target="_blank" href="https://mail.google.com/mail/u/0/#spam">Go to mail.</a></div> ';
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
          Body: '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><title></title><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta name="viewport" content="width=device-width"><style type="text/css">body, html {margin: 0px;padding: 0px;-webkit-font-smoothing: antialiased;text-size-adjust: none;width: 100% !important;}table td, table {}#outlook a {padding: 0px;}.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;}.ExternalClass {width: 100%;}@media only screen and (max-width: 480px) {table tr td table.edsocialfollowcontainer {width: auto !important;}table, table tr td, table td {width: 100% !important;}img {width: inherit;}.layer_2 {max-width: 100% !important;}.edsocialfollowcontainer table {max-width: 25% !important;}.edsocialfollowcontainer table td {padding: 10px !important;}}</style><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"><link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.css"></head><body style="padding:0; margin: 0;background: #efefef"><table style="height: 100%; width: 100%; background-color: #efefef;" align="center"><tbody><tr><td valign="top" id="dbody" data-version="2.31" style="width: 100%; height: 100%; padding-top: 27px; padding-bottom: 27px; background-color: #efefef;"><!--[if (gte mso 9)|(IE)]><table align="center" style="max-width:600px" width="600" cellpadding="0" cellspacing="0" border="0"><tr><td valign="top"><![endif]--><table class="layer_1" align="center" border="0" cellpadding="0" cellspacing="0" style="border-style: solid; max-width: 600px; box-sizing: border-box; width: 100%; margin: 0px auto;"><tbody><tr><td class="drow" valign="top" align="center" style="background-color: #ffffff; box-sizing: border-box; font-size: 0px; text-align: center;"><!--[if (gte mso 9)|(IE)]><table width="100%" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td valign="top"><![endif]--><div class="layer_2" style="max-width: 600px; display: inline-block; vertical-align: top; width: 100%;"><table border="0" cellspacing="0" cellpadding="0" class="edcontent" style="border-collapse: collapse;width:100%"><tbody><tr><td valign="top" class="emptycell" style="padding: 10px;"></td></tr></tbody></table></div><!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]--></td></tr><tr><td class="drow" valign="top" align="center" style="background-color: #ffffff; box-sizing: border-box; font-size: 0px; text-align: center;"><!--[if (gte mso 9)|(IE)]><table width="100%" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td valign="top"><![endif]--><div class="layer_2" style="max-width: 600px; display: inline-block; vertical-align: top; width: 100%;"><table border="0" cellspacing="0" cellpadding="0" class="edcontent" style="border-collapse: collapse;width:100%"><tbody><tr><td valign="top" class="edimg" style="padding: 0px; box-sizing: border-box; text-align: center;"><img src="../img/geometric_divider1.png" alt="Image" width="575.992" style="border-width: 0px; border-style: none; max-width: 575.992px; width: 100%;"></td></tr></tbody></table></div><!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]--></td></tr><tr><td class="drow" valign="top" align="center" style="background-color: #ffffff; box-sizing: border-box; font-size: 0px; text-align: center;"><!--[if (gte mso 9)|(IE)]><table width="100%" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td valign="top"><![endif]--><div class="layer_2" style="max-width: 600px; display: inline-block; vertical-align: top; width: 100%;"><table border="0" cellspacing="0" cellpadding="0" class="edcontent" style="border-collapse: collapse;width:100%"><tbody><tr><td valign="top" class="emptycell" style="padding: 20px;"></td></tr></tbody></table></div><!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]--></td></tr><tr><td class="drow" valign="top" align="center" style="background-color: #ffffff; box-sizing: border-box; font-size: 0px; text-align: center;"><!--[if (gte mso 9)|(IE)]><table width="100%" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td valign="top"><![endif]--><div class="layer_2" style="max-width: 600px; display: inline-block; vertical-align: top; width: 100%;"><table border="0" cellspacing="0" class="edcontent" style="border-collapse: collapse;width:100%"><tbody><tr><td valign="top" class="edtext" style="padding: 20px; text-align: left; color: #5f5f5f; font-size: 14px; font-family: Helvetica, Arial, sans-serif; word-break: break-word; direction: ltr; box-sizing: border-box;"><p class="style1 text-center" style="text-align: center; margin: 0px; padding: 0px; color: #f24656; font-size: 36px; font-family: Helvetica, Arial, sans-serif;"><strong>THANK YOU</strong></p><p class="text-center" style="text-align: center; margin: 0px; padding: 0px;">for registering with<span style="color: #3498db;"><a href="#" style="color: #3498db; text-decoration: none;">P</a>roud Nepal It suppliers.</span></p></td></tr></tbody></table></div><!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]--></td></tr><tr><td class="drow" valign="top" align="center" style="background-color: #ffffff; box-sizing: border-box; font-size: 0px; text-align: center;"><!--[if (gte mso 9)|(IE)]><table width="100%" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td valign="top"><![endif]--><div class="layer_2" style="max-width: 600px; display: inline-block; vertical-align: top; width: 100%;"><table border="0" cellspacing="0" class="edcontent" style="border-collapse: collapse;width:100%"><tbody><tr><td valign="top" class="edtext" style="padding: 20px; text-align: left; color: #5f5f5f; font-size: 14px; font-family: Helvetica, Arial, sans-serif; word-break: break-word; direction: ltr; box-sizing: border-box;"><p class="text-center" style="text-align: center; margin: 0px; padding: 0px;">Click on the button below to activate your account.</p></td></tr></tbody></table></div><!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]--></td></tr><tr><td class="drow" valign="top" align="center" style="background-color: #ffffff; box-sizing: border-box; font-size: 0px; text-align: center;"><!--[if (gte mso 9)|(IE)]><table width="100%" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td valign="top"><![endif]--><div class="layer_2" style="max-width: 600px; display: inline-block; vertical-align: top; width: 100%;"><table border="0" cellspacing="0" class="edcontent" style="border-collapse: collapse;width:100%"><tbody><tr><td valign="top" class="edbutton" style="padding: 20px;"><table cellspacing="0" cellpadding="0" style="text-align: center;margin:0 auto;" align="center"><tbody><tr><td align="center" style="border-radius: 4px; padding: 12px; background: #f24656;"><a target="_blank" href="localhost/GitHub/OnlineShopping/reg/verify.php?hash=<?php echo $_SESSION['hash']?>" style="color: #ffffff; font-size: 16px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; text-decoration: none; display: inline-block;"><span style="color: #ffffff;">Activate your account</span></a></td></tr></tbody></table></td></tr></tbody></table></div><!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]--></td></tr><tr><td class="drow" valign="top" align="center" style="background-color: #ffffff; box-sizing: border-box; font-size: 0px; text-align: center;"><!--[if (gte mso 9)|(IE)]><table width="100%" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td valign="top"><![endif]--><div class="layer_2" style="max-width: 600px; display: inline-block; vertical-align: top; width: 100%;"><table border="0" cellspacing="0" cellpadding="0" class="edcontent" style="border-collapse: collapse;width:100%"><tbody><tr><td valign="top" class="emptycell" style="padding: 20px;"></td></tr></tbody></table></div><!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]--></td></tr><tr><td class="drow" valign="top" align="center" style="background-color: #ffffff; box-sizing: border-box; font-size: 0px; text-align: center;"><!--[if (gte mso 9)|(IE)]><table width="100%" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td valign="top"><![endif]--><div class="layer_2" style="max-width: 600px; display: inline-block; vertical-align: top; width: 100%;"><table border="0" cellspacing="0" class="edcontent" style="border-collapse: collapse;width:100%"><tbody><tr><td valign="top" class="edtext" style="padding: 20px; text-align: left; color: #5f5f5f; font-size: 14px; font-family: Helvetica, Arial, sans-serif; word-break: break-word; direction: ltr; box-sizing: border-box;"><p style="margin: 0px; padding: 0px;">Have a question? Contact us:<span style="color: #16c2d0;">&nbsp;proudnepal.it@gmail.com</span></p></td></tr></tbody></table></div><!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]--></td></tr><tr><td class="drow" valign="top" align="center" style="background-color: #ffffff; box-sizing: border-box; font-size: 0px; text-align: center;"><!--[if (gte mso 9)|(IE)]><table width="100%" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td valign="top"><![endif]--><div class="layer_2" style="max-width: 600px; display: inline-block; vertical-align: top; width: 100%;"><table border="0" cellspacing="0" cellpadding="0" class="edcontent" style="border-collapse: collapse;width:100%"><tbody><tr><td valign="top" class="emptycell" style="padding: 20px;"></td></tr></tbody></table></div><!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]--></td></tr><tr><td class="drow" valign="top" align="center" style="background-color: #ffffff; box-sizing: border-box; font-size: 0px; text-align: center;"><!--[if (gte mso 9)|(IE)]><table width="100%" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td valign="top"><![endif]--><div class="layer_2" style="max-width: 600px; display: inline-block; vertical-align: top; width: 100%;"><table border="0" cellspacing="0" class="edcontent" style="border-collapse: collapse;width:100%"><tbody><tr><td valign="top" class="edtext" style="padding: 20px; text-align: left; color: #5f5f5f; font-size: 14px; font-family: Helvetica, Arial, sans-serif; word-break: break-word; direction: ltr; box-sizing: border-box;"><p class="text-center" style="text-align: center; margin: 0px; padding: 0px;"><span style="text-align: left;">&nbsp;Kathmandu ,&nbsp;</span>Nepal</p></td></tr></tbody></table></div><!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]--></td></tr><tr><td class="drow" valign="top" align="center" style="background-color: #ffffff; box-sizing: border-box; font-size: 0px; text-align: center;"><!--[if (gte mso 9)|(IE)]><table width="100%" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td valign="top"><![endif]--><div class="layer_2" style="max-width: 600px; display: inline-block; vertical-align: top; width: 100%;"><table border="0" cellspacing="0" cellpadding="0" class="edcontent" style="border-collapse: collapse;width:100%"><tbody><tr><td valign="top" class="edimg" style="padding: 0px; box-sizing: border-box; text-align: center;"><img src="../img/geometric_footer1.png" alt="Image" width="586.989" style="border-width: 0px; border-style: none; max-width: 586.989px; width: 100%;"></td></tr></tbody></table></div><!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]--></td></tr><tr><td class="drow" valign="top" align="center" style="background-color: #efefef; box-sizing: border-box; font-size: 0px; text-align: center;"><!--[if (gte mso 9)|(IE)]><table width="100%" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td valign="top"><![endif]--><div class="layer_2" style="max-width: 600px; display: inline-block; vertical-align: top; width: 100%;"><table border="0" cellspacing="0" class="edcontent" style="border-collapse: collapse;width:100%"><tbody><tr><td valign="top" class="edtext" style="padding: 20px; text-align: left; color: #5f5f5f; font-size: 14px; font-family: Helvetica, Arial, sans-serif; word-break: break-word; direction: ltr; box-sizing: border-box;"><p style="text-align: center; font-size: 10px; margin: 0px; padding: 0px;">If you no longer wish to receive mail from us, you can<a href="{unsubscribe}" style="background-color: initial; font-size: 10px; color: #16c2d0; font-family: Helvetica, Arial, sans-serif; text-decoration: none;">Unsubscribe</a><br>{accountaddress}</p></td></tr></tbody></table></div><!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]--></td></tr></tbody></table><!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]--></td></tr></tbody></table></body></html>',
    
           
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
