<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Document</title>
</head>
    <body>
        <!-- this is the starting of the project  -->
    <div class="main_container">

        <!-- Nav bar -->
        <div class="va">
        <?php

include "nav.php";
        ?>


</div>
            <!-- main content -->
        <div class="main">
        
<!-- code here the main one -->

<section class="sectio_one_image_slider">


    <div class="slideshow-container">
        <div class="slideshow-inner">
          <div class="mySlides fade">
        
            <img  src='img/laptop.png' style='width: 100%;' alt="sally lightfoot crab"/>
            <div class="text">Exclusive, offer</div>
          </div>
        
          <div class="mySlides fade">
        
            <img  src='img/mobile.png' style='width: 100%;' alt="fighting nazca boobies"/>
            <div class="text">Place the order</div>
          </div>
        
          <div class="mySlides fade">
        
            <img  src='img/mobile1.png' style='width: 100%;' alt="otovalo waterfall"/>
            <div class="text">get the trend in your hand</div>
          </div>
        
          <div class="mySlides fade">
        
            <img  src='img/mobile3.png' style='width: 100%;' alt="pelican"/>
            <div class="text">Make an amazing deal with us.</div>
          </div>
          
          </div>
          <div class="mySlides fade">
        
            <img  src='img/pexels-veeterzy-303383.png' style='width: 100%;' alt="pelican"/>
            <div class="text">buy once , remember forever</div>
          </div>
          
          </div>
        
          <div  class="this_is_dot"style='text-align: center;'>
            <span class="dot" onclick='currentSlide(1)'></span>
            <span class="dot" onclick='currentSlide(2)'></span>
            <span class="dot" onclick='currentSlide(3)'></span>
            <span class="dot" onclick='currentSlide(4)'></span>
            <span class="dot" onclick='currentSlide(5)'></span>
  
          </div>
        
          <a class="prev" onclick='plusSlides(-1)' style="display: none;"></a>
          <a class="next" onclick='plusSlides(1)'   style="display: none;"></a>
        </section>







        <!-- anothe section product one -->
        
<section class="product_laptop">
 
    <!--this is for the divl company.-->
    <div class="lpt1">
        
          <div class="title">
                Dell Laptops :
            </div>
        <div class="laptopContainer">
        <?php 
            include "laptop.php";
            $redirect = '<a class="a" href="product/allproducts.php?group=dell&Name=laptop"><button class="div1_button_see_more">See more  </button></a> ';
            printLaptop("Asus" , "img/");
        ?>
        
    </div>
    <!--this is for end of the dell company.-->
        <?php echo  $redirect?>
</div>



    </section>
        </div>
         










<!-- code here the main one -->
            <!-- left gap -->
 
            <!-- fotter -->
        <footer>
            copyright @ 2020
        </footer>
    </div>

 
</body>
<script src="js/index.js"></script>
<script src="https://kit.fontawesome.com/cc8ed28d8b.js" crossorigin="anonymous"></script>
<script src="js/nav.js"></script>
<script src="js/redirect.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- this is for the script to load the php-->

<script>
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


// add to cart


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
})



</script>
 


</html>