<?php
session_start();
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Document</title>
    <link rel="stylesheet" href="css/cart_item.css">
    <link rel="stylesheet" href="css/user_page.css" />
    <link rel="stylesheet" href="css/index.css" />
  </head>

  <body>
        <?php
    include "nav.php";
    ?>
    <div class="container_user_page">
      <div class="user_priv_details">
          <div class="logo_name_container">
              
        <div class="logo">
          <?php
            if(isset($_SESSION['userName'])){
            echo "Img_from_db";
            }
            elseif(isset($_SESSION['logo'])){
            ?>
          <img src="<?php echo $_SESSION['logo']; ?>" alt="" />
                <?php            
        }
        else{
        echo "NU";
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
        ?>
        <button id="logout" class="logout">logout</button>
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
  include "cart_item.php";
  ?>
</div>

<div class="fav_container_user_page cards_container">
this  isjidis
</div>

<div class="orders_container_user_page cards_container">
  dsdbfhhdfbsdbfhdhfbfhsdfhi
</div>







    
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="js/nav.js"></script>
<script src="https://kit.fontawesome.com/cc8ed28d8b.js" crossorigin="anonymous"></script>

  <script>
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
            }
        }
    };
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

let below_nav = document.querySelectorAll(".childs_of_the_user_detail_nav");

below_nav.forEach(function(elm , i ){
  elm.addEventListener("click",function(){
    below_nav.forEach(elme =>{
      elme.style.border ="none";
    });
    elm.style.borderBottom = "5px solid rgba(51, 51, 51, 0.802)";


  })
})


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








  </script>
</html>