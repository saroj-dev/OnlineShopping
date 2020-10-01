<?php
session_start();
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Document</title>
    <link rel="stylesheet" href="css/cart_inthe_flex.css">
    <link rel="stylesheet" href="css/cart_item.css">
    <link rel="stylesheet" href="css/user_page.css"/>
    <link rel="stylesheet" href="css/index.css" />
  </head>

  <body>
        <?php
    include "nav.php";
    ?>
    <div class="container_user_page">
      <div class="user_priv_details">
          <div class="logo_name_container">
              
        <div class="logo" style="display: flex;justify-content: center; align-items:center; font-size:60px ">
          <?php
            if(isset($_SESSION['userName'])){
            // this is to setup the image check in the data base
            ?>
  <i class="fas fa-user"></i>
            <?php  

            }
            elseif(isset($_SESSION['logo'])){
            ?>
          <img src="<?php echo $_SESSION['logo']; ?>" alt="" />
                <?php            
        }
        else{
          ?> 
          <i class="fas fa-user"></i>
        <?php
        }
        ?>
        </div>

        <div class="userName">
                <?php
        if(isset($_SESSION['userName'])){
        echo $_SESSION['userName'];
        }
        else{
        echo "New User";
        }
        ?>
        </div>
        </div>
                <?php
        if(isset($_SESSION['userName'])){
        if(isset($_SESSION["email"])){
        ?><?php 
        if(isset($_SESSION['logo'])){
        ?>
        <button id="logout" class="logout" onclick="signOut();">logout</button>
        <?php }else{
          ?>
        <button id="logout" class="logout">logout</button>
        <?php }?>
        
        <?php
            }
            }
            else{   
            ?>      
        <button id="login"class="login">Login</button>
            <?php    
    }
    ?>
        </div>

      <div class="user_detail">
      <div class="cart childs_of_the_user_detail_nav">cart</div>

      <div class="fav childs_of_the_user_detail_nav">favourite</div>
      <div class="orders childs_of_the_user_detail_nav">My orders</div>
    </div>
    </div>

<div class="cart_container_user_page cards_container">
  <?php 
  
        if(isset($_SESSION['userName'])){
        if(isset($_SESSION["email"])){
  include "cart_item.php";
        }}
        else{
        echo "<center> <p style='font-size:1.5em; color:#333; margin-top:50px'>Dear, user you must login to see this features.</p>  </center>" ; 
        }?>
</div>

<div class="fav_container_user_page cards_container">
 
</div>

<div class="orders_container_user_page cards_container">
   <?php
   
        if(isset($_SESSION['userName'])){
        if(isset($_SESSION["email"])){
   include "myorders.php";
        }}
        else{
        echo "<center> <p style='font-size:1.5em; color:#333; margin-top:50px'>Dear, user you must login to see this features.</p>  </center>" ; 
        }?>
</div>







    
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="js/nav.js"></script>
<script src="https://kit.fontawesome.com/cc8ed28d8b.js" crossorigin="anonymous"></script>

  <script>

let below_nav = document.querySelectorAll(".childs_of_the_user_detail_nav");
below_nav.forEach(function(elm , i ){
  elm.addEventListener("click",function(){
    if(i == 1 ){
      var favList  = [];
      var counter = 0;
      for (let [key, value] of Object.entries(localStorage)) {
        let minfied = key.replace("?keyword=", "");
        
        if(isNaN(minfied)){
        }else{
          favList.push(minfied);
        }}
        if(counter < 1){

          var xmlhttp = new XMLHttpRequest(); 
        xmlhttp.open("GET", "load_fav.php?q=" + favList, true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200) {
        document.querySelector(".fav_container_user_page").innerHTML =this.responseText;
             counter++;
      }
    }
  }

    }
    below_nav.forEach(elme =>{
      elme.style.border ="none";
    });
    elm.style.borderBottom = "5px solid rgba(51, 51, 51, 0.802)";
  })
})
    


      if(document.querySelector("button").classList.contains("logout")){
    document.querySelector("#logout").addEventListener("click", function () {
      var req = new XMLHttpRequest();
      req.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
        }
      };
      req.open("get", "logout.php", true);
      req.send();
      window.location.href = "index.php";
    });
      }
      else{

          
          document.querySelector("#login").addEventListener("click", function () {
              window.location.href = "reg/login.php";
            });
        }

        
    var  search_query = document.querySelector("#search_id");
    var  search_button = document.querySelector(".fa-search");
    
    search_query.addEventListener("keypress", function(e){
        if(e.key == 'Enter'){
            window.location.href = "search.php?search_query="+search_query.value;
             
        }
    })
    
    
    search_button.addEventListener("click",function() {
        window.location.href = "?search_query="+search_query.value;
    })
    
    
    var container = document.querySelectorAll(".btm > .heading");
container.forEach(function name(elm , i) {
    elm.addEventListener("click",function(){
        url = "product/product.php?keyword="+elm.parentElement.parentElement.children.item(0).getAttribute("data-id");
        window.location.href = url;
    })
})
var addtoCart = document.querySelectorAll(".btn_add_cart");
addtoCart.forEach(function(elm,i){
    if(elm.classList.contains('disabled')){
        elm.style.cursor = "not-allowed";
        elm.style.opacity = "0.5";
    } else{
        elm.addEventListener("click",function(){ 
            var request = new XMLHttpRequest();
            var  cart  =  elm.parentElement.parentElement.children.item(0).getAttribute("data-id");
    <?php 
    $_SESSION['previous_location_add_buy'] = "";
     ?>
         request.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200) {
            if(elm.classList.contains("not_logged_in")){
            window.location.href = "reg/login.php";
            }else{
            elm.innerHTML = "In the cart <i class='fas fa-cart-plus'></i>";
            elm.style.cursor = "not-allowed";
           elm.style.opacity = "0.5";
           elm.style.pointerEvents = "none";
           var new_req = new XMLHttpRequest();
           new_req.onreadystatechange = function(){
            if(this.readyState === 4 && this.status === 200) { 
                document.querySelector(".myorder_counter > i ").innerHTML = this.responseText;
          
             }  };
           new_req.open("GET", "nav_counter.php", true);
           new_req.send();
            }
        }
    };
    //  request.open("GET","send_data.php"+window.location.search,true);
    request.open("GET","send_data.php?addtocart="+cart+"&from=p",true);
    request.send();
    })
    }
})


document.querySelector(".fa-shopping-cart").addEventListener("click", function(){
window.location.href = "show_cart.php";
});


document.querySelector(".fa-user-circle").addEventListener("click",function(){
    window.location.href = "user_profile.php";
});



document.querySelectorAll(".View").forEach(function(elm){
elm.addEventListener("click",function(){
  var  url = "product/product.php?keyword="+elm.parentElement.parentElement.parentElement.children.item(0).getAttribute("data-id");
        window.location.href = url;
})
})

document.querySelectorAll(".delete_the_item").forEach(function(elm){
elm.addEventListener("click",function(){
    url = "delete_from_the_cart.php?send=1&keyword="+elm.parentElement.parentElement.parentElement.children.item(0).getAttribute("data-id");
    window.location.href = url;
})
})


let switch_tab_bottom = document.querySelectorAll(".cards_container");
below_nav.forEach(function(e,i){
  e.addEventListener("click",function(){

switch_tab_bottom.forEach((element , j) => {
  if(j == i){
    element.style.display = "block";
  }else{
    element.style.display = "none";
  }
});
  })
})

function callMeend(e){ 
        url = "product/product.php?keyword="+e;
        window.location.href = url; 
}


 
  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
    });
  }
 
 
  </script>
</html>