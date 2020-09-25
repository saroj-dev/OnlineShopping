<?php
    session_start();
    // $INTHECART = array();
    ?>



<!DOCTYPE html>
< lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="css/index.css">
        <style>
         
         .title_suggested{
             margin-top: 80px;
             text-transform: capitalize;
             font-size: 2.5em;
             font-weight: bolder;
             color:rgba(51, 51, 51, 0.733);
             margin-left: 50px;
         }
         .View{
            height: 50px;
            background: #2abbe8;
            text-align:center;
            line-height:50px;
            border-radius:5px;
            color:#fff;
            min-width: 80%;
            cursor: pointer;
            /* font-size:20px; */
        }
        .btm_cart_controls{
            margin-top:30px;
             display: flex;
             width: 100%;

         }
         .delete_the_item{
             margin-left: 5px;
             height: 50px;
            background: #e02a2ab7;
            text-align:center;
            line-height:50px;
            color: #fff;
            max-width: 20%;
            min-width: 20%;
            border-radius: 5px;
            cursor: pointer;
         }
     </style>
    <title>Document</title>
</head>
<body>
    <?php 
      include "nav.php" ;
      ?>
 
 <div class="title_suggested">
     <?php
                echo "My cart";
                ?>
            </div>
            <div class="laptopContainer">
                <?php
             include "connection.php";
             $INTHECART = array();
             if(isset($_SESSION["is_login"])){
                 $checkQ = "SELECT * FROM `userinfo` WHERE emailAddress='{$_SESSION['email']}'";
                 //    checking the output of the query
                 $output =  $connection->query($checkQ);
                 if($output->num_rows > 0){
                     // echo "it has some value";
                     while($cart = $output->fetch_assoc()){
                         // echo $cart['cart'];
            array_push($INTHECART , $cart['cart']);
        }
    } 
    
    
    
    $unique_array_IN  = array_unique($INTHECART);
    $dirToImg = "img/";
    
    $j = 0;
    foreach ($unique_array_IN as $key ) {
        $getItemQuery = "SELECT * FROM laptop WHERE id_no = '$key'";
            $table  ="laptop";
            $result = $connection->query($getItemQuery);
            if($result->num_rows > 0){
                while ($row = $result->fetch_assoc()) {
                    $product_id = $row['id_no'];
                    $productName = $row["{$table}Name"] ;
                    $productImage = $row["{$table}Images"];
                    $productFrontImage = $row["{$table}FrontImages"]; 
                    $productFeatures = $row["{$table}Features"]; 
                    $productOrginalPrice = $row["{$table}PriceDiscounted"] ;
                    $productDiscountPrice  = $row["{$table}PriceOrginal"]; 
                    $n =  $row["{$table}Rating"];
                    
                    
                    ?>  
                <div class="container">
                    <input type="text" hidden style="display: none;" data-id="<?php echo $product_id;   ?>">
                    <img class="theImg_from_db_style" src="<?php echo "{$dirToImg}{$productFrontImage}" ;?>">
                    <div class="btm">
                        <h2 class="heading"><?php
                        echo $productName;
                        ?> </h2>
                     <small>
                     <?php
                while ($n>0){
                    echo("⭐");
                    $n = $n-1;
                }
                ?>
                     </small>
                     <small class="orginal_price">
                         <small class="high_price">
                         <?php
                            echo  "RS. {$productDiscountPrice}";
                             ?>
                             </small>
                             <?php echo "RS. {$productOrginalPrice}";
                                    ?>
                        </small>
                          
    <div class="btm_cart_controls">

        <div class="View"> View
            </div>
            <div class="delete_the_item">
            <i class="far fa-trash-alt"></i>        
        </div>

    </div></div>
    </div>
       <?php
        }
    }
         }
        }
        else{
            header("Location: reg/login.php");
        }
        
        
  

    ?>


        </div>
            <!-- </div> -->
       
    
    

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