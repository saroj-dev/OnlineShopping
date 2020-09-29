<?php
function send_data($data , $prev){
    include "connection.php";
    session_start();

    if(isset($_SESSION['is_login'])){

        $email = $_SESSION['email'];
        $send = $connection->prepare("INSERT INTO `userinfo`(`emailAddress`, `cart`) VALUES (? , ? )");
        $send->bind_param("ss", $email , $data);
        if($send->execute()){
        if($prev == "i"){
            header("location:./index.php");
            // echo "in the if statement";
           }
           if($prev == 'p'){
            //    echo "product/product.php". $_SESSION['previous_location_add_buy'];
               header("location:product/product.php". $_SESSION['previous_location_add_buy']);
            // echo "in the another if statement";
        }  
        if($prev == "all"){
            header("location:product/allproducts.php". $_SESSION['previous_location_add_buy']);
            // echo "data is " . $data;
        }
      }
  else{
         
    }
    }
    
     else{
         header("location:reg/login.php");
        
     }

   }    

send_data($_GET['addtocart'], $_GET['from']);

?>



<!-- what is application software explain it's types? -->
<!-- the software that is developed for the user need's is called application software -->