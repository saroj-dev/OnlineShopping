<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="../css/index.css">
     <style>
         
         .title_suggested{
             margin-top: 80px;
             text-transform: capitalize;
             font-size: 2.5em;
             font-weight: bolder;
             color:rgba(51, 51, 51, 0.733);
             margin-left: 50px;
         }
     </style>
    <title>Document</title>
</head>
<body>
<?php 
      include "../nav.php" ;
?>

    <div class="suggested__products__container">
        <div class="title_suggested">
            <?php 
            if(isset($_GET['group'])){

                echo $_GET["group"];
            }
            ?>
            </div>
            <div class="laptopContainer">
        <?php
            include "ProductsCollection.php";
            showProduct(0,"../img/");
        ?>
        </div>
            </div>
       
    
    

</body>
<script src="https://kit.fontawesome.com/cc8ed28d8b.js" crossorigin="anonymous"></script>
<script src="../js/nav.js"></script>
<script src="../js/redirect.js"></script>
<script>
     var container = document.querySelectorAll(".btm > .heading");
container.forEach(function name(elm , i) {
    elm.addEventListener("click",function(){
        url = "product.php?keyword="+elm.parentElement.parentElement.children.item(0).getAttribute("data-id");
        window.location.href = url;
    });})
    var  search_query = document.querySelector("#search_id");
    var  search_button = document.querySelector(".fa-search");
search_query.addEventListener("keypress", function(e){
    if(e.key == 'Enter'){
        window.location.href = "../search.php?search_query="+search_query.value;
        console.log(window.location.href)
    }
})


    search_button.addEventListener("click",function() {
        window.location.href = "../search.php?search_query="+search_query.value;
    })


// add to cart


var addtoCart = document.querySelectorAll(".btn_add_cart");
addtoCart.forEach(function(elm,i){
        elm.addEventListener("click",function(){
     var  cart  =  elm.parentElement.parentElement.children.item(0).getAttribute("data-id");
     window.location.href= "../send_data.php?addtocart="+cart+"&from=p";
    })
})

var addtoCart1 = document.querySelectorAll(".AddToCart");
addtoCart.forEach(function(elm,i){
        elm.addEventListener("click",function(){
     var  cart  =  elm.parentElement.parentElement.children.item(0).getAttribute("data-id");
     
     window.location.href= "../send_data.php?addtocart="+cart+"&from=p";
    })
})
 

 
</script>
</html>