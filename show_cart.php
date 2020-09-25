
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="css/index.css">
         <link rel="stylesheet" href="css/cart_item.css">
    <title>Document</title>
</head>
<body>
    <?php 
     session_start();
      include "nav.php" ;
      ?>
 
 <div class="title_suggested">
     <?php
                echo "My cart";
                ?>
            </div>
          
    <?php
    include "cart_item.php";
    ?>
    

</body>
<script src="https://kit.fontawesome.com/cc8ed28d8b.js" crossorigin="anonymous"></script>
<script src="js/nav.js"></script>
<script src="js/redirect.js"></script>
<script>
     var container = document.querySelectorAll(".btm > .heading");
  container.forEach(function name(elm , i) {
    elm.addEventListener("click",function(){
        url = "product/product.php?keyword="+elm.parentElement.parentElement.children.item(0).getAttribute("data-id");
        window.location.href = url;
    });})
    var  search_query = document.querySelector("#search_id");
    var  search_button = document.querySelector(".fa-search");
search_query.addEventListener("keypress", function(e){
    if(e.key == 'Enter'){
        window.location.href = "search.php?search_query="+search_query.value;
        console.log(window.location.href)
    }
})
    search_button.addEventListener("click",function() {
        window.location.href = "search.php?search_query="+search_query.value;
    })


// add to cart




document.querySelector(".fa-shopping-cart").addEventListener("click", function(){
window.location.href = "show_cart.php"; 

});

    

document.querySelectorAll(".View").forEach(function(elm){
elm.addEventListener("click",function(){
  var  url = "product/product.php?keyword="+elm.parentElement.parentElement.parentElement.children.item(0).getAttribute("data-id");
        window.location.href = url;
})
})

document.querySelectorAll(".delete_the_item").forEach(function(elm){
elm.addEventListener("click",function(){
    url = "delete_from_the_cart.php?keyword="+elm.parentElement.parentElement.parentElement.children.item(0).getAttribute("data-id");
    window.location.href = url;
})
})



document.querySelector(".fa-user-circle").addEventListener("click",function(){
    window.location.href = "user_profile.php";
})



</script>
</html>