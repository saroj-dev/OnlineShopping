<?php include "connection.php";

if(isset($_REQUEST['submit'])){
  if($_REQUEST['username']=="" || $_REQUEST['email']=="" || $_REQUEST['password']==""){
     $error_mess = '<div class="warning">All feild are required</div> ';
    }else{
          if(!filter_var($_REQUEST['email'],FILTER_VALIDATE_EMAIL)){
            $error_mess = '<div class="not">Please enter a valid Email </div> ';
          }else{
            if(!preg_match("/^[a-zA-Z'-]+$/",$_REQUEST['username'])){
              $error_mess = '<div class="not">Please enter a valid  username (number,symbols & space not allowed) </div> ';
            }else{

          $emailcheck = " SELECT email FROM user_register WHERE email = '".$_REQUEST['email']."' " ;// this ..(dot dot) is the SELECT syntax for Advanced PHP.  (alrready exist or not..)
          $result = $con->query($emailcheck);
          if($result->num_rows ==1){
            $error_mess = '<div class="not">Email Aleardy Registred. </div> ';
            //str_replace(' ', '', $str) {used to remove the white space}
            
          }else{
            $username =str_replace(' ', '',($_REQUEST['username']));
            $email =str_replace(' ', '',($_REQUEST['email']));
            $password =str_replace(' ', '',($_REQUEST['password']));
            $tokens = bin2hex(random_bytes(15));//generating the random nunber for tolens
            $lenpass = strlen($password);//len of pass
            $lenuser = strlen($username); //len of username
          
            if($lenpass>8){
               if($lenuser>8){

            $insert = " INSERT INTO user_register(`username`, `email`, `password`,`token`,`status`)VALUES('$username','$email','$password','$tokens','inactive')";
            $sucess = $con->query($insert); //advanced php syntax to fire insert query
            if($sucess){
            $error_mess = '<div class="sucess">Account Created Sucessfully</div> ';
            $redirect = ' <div class="centerlogin"> <span>Please Login Here</span> &nbsp; <a href="login.php">Login</a></div>';
            

            }else{
            $error_mess = '<div class="not">unable to create Account.</div> ';
              }
            } else{
              $error_mess = '<div class="not">Username must be more than 8 chracter</div> ';
            }
          
        }else{
          $error_mess = '<div class="not">May be you entered white space OR pass is less than 8 chracter</div> ';
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
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> Register Here</title>
   <link rel="stylesheet" href="css/login_register.css">

 </head>
 <body>
 <br><br><br>
 <div class="wrapper">
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
   <p class="hide">
   <?php if(isset($error_mess)) { echo "$error_mess";}?>
   <br>
   <?php if(isset($redirect)) { echo "$redirect";}?>
    
   </p>

    </form>
    </div>  
    <br>
    <br>
    <br>
    <br>
    <script>
    if ( window.history.replaceState ) {
      x= window.location.href;
        window.history.replaceState( null, null, x );
          
    }
</script>
 </body>
 </html>
 
  
 
 
<style>
 
 
  .not{
    font-size:13px;
    font-size:17px;
    text-align:center;
    margin-top:30px;
    background-color:#ffd599f6;
    padding:10px 0;
}
.sucess{
    font-size:13px;
    font-size:17px;
    text-align:center;
    margin-top:30px;
    background-color:#b5ebb5;
    padding:10px 0;
}
.warning{
  background-color:#ffcccb;
  font-size:13px;
    font-size:17px;
    text-align:center;
    margin-top:30px;
    padding:10px 0;
}
.centerlogin{
  text-align:center;
}
.hide{
  display:none;
}
</style>
 