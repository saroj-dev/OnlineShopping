<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/product.css">
    <link rel="stylesheet" href="../css/searchFilter.css">
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <?php
    include "../nav.php";
    include "../connection.php";
    if(isset( $_GET['keyword'] )) {
        $key = $_GET['keyword'];
    }
    else{
        header("location: ../index.php");
    }
 $table = "laptop";
 $select = "SELECT * FROM  `$table` WHERE id_no='$key'";
$result = $connection->query($select);
if($result->num_rows > 0){
    while ($row = $result->fetch_assoc()) {
        $productName = $row["{$table}Name"] ;
        $productImage = $row["{$table}Images"];
        $productFrontImage = $row["{$table}FrontImages"]; 
        $productFeatures = $row["{$table}Features"]; 
        $productOrginalPrice = $row["{$table}PriceOrginal"] ;
        $productDiscountPrice  = $row["{$table}PriceDiscounted"]; 
        $n =  $row["{$table}Rating"];
        $features = explode("," , $productFeatures);
?>  
 
    <div class="product_page_main_container">
        <div class="product_page_img_container">
            <div class="img">
                <?php
                $img = explode(",",$productImage);
            foreach($img as $src){
    ?>
    <img src="<?php echo "../img/{$src}" ;  ?>" alt="wrong location">
    <?php
}


?>
                <br>
                <br><br>
                <div class="hr"></div>
            </div>
            <div class="img_control">
<?php
$img = explode(",",$productImage);
 

 
foreach($img as $src){
    ?>
    <img src="<?php echo "../img/{$src}" ;  ?>" alt="wrong location">
    <?php
}


?>


            </div>
        </div>
        <div class="product_page_product_container">
            <div class="product_title">
               <h1> <?php
                echo $productName  ;
               ?> </h1>
               <div class="left"><img src="../svg/share.svg" height="20"  width="20" alt=""> &nbsp;&nbsp;
                <img src="../svg/heartr.svg"  height="20"  width="20" alt=""> 
            </div>
            
            <p><small>
                        <?php
  while ($n>0){
    echo("⭐");
    $n = $n-1;
}
                        ?>
            </small> <span> &nbsp;&nbsp;ratting</span></p>
        </div>
        
        <!-- product title end here -->
        <div class="price_quantity">
            <div class="hr"></div>
            <textarea id="url" rows="1" cols="30"></textarea>
            <?php
                echo "RS. {$productDiscountPrice}";
            ?>
         
        <br>

        
    </div>
            <small class="qty">
                Quantity <span class="qty_span sub" onclick="add_sub(-1)">-</span>
                <input class="input_container" type="number" min="1" max="5" value="1" disabled>
                <span class="qty_span add" onclick="add_sub(1)">+</span>
            </small>
<div class="btn_section">
    <div class="buyNow"> buy now
    </div>
    <div class="AddToCart">
        add to cart
    </div>
</div>
        </div>
        <div class="product_page_delevery_option_container">
					<div class='product_page_display_address'>

					</div><div class="btn_con_add_change"onclick="showFilter()"> Choose Your Shipping address
                        <button class='button_addres_changer_adder' onclick="showFilter()">Add ></button>
                    </div>
					<div class="search__container">
						<div class="search__dir">
                            <div class="right" onclick="cross()">X</div>
			
						</div>
						<input type="text" class='search__input' onkeyup="filterOut(this)" placeholder="Select Region" />
						<div class="search__options">
							
						</div>
					</div>
                    <div class="number_con">
                        <div class="flg"><img src="../img/flag.png"></div><span>+977</span><input
                        type="number" name="num"  id="number_inp_user" placeholder="Phone Number"
                        required>
                    </div>
                    <div class="freeShiping">
                        <img src="../svg/shipping-fast-solid.svg" alt="" srcset="">
                       &nbsp;&nbsp; Free Shipping.
                    </div>

                    <div class="cash_on_deli">
                        <img src="../svg/money-bill-wave-solid.svg" alt="" srcset="">
                          &nbsp;&nbsp;  Cash on Delivery
                    </div>
                    <div class="ship_under_1week">
                        <img src="../svg/truck-loading-solid.svg" alt="">
                      &nbsp;&nbsp;  Shipping under 1 Week.
                    </div>

        </div>
    </div>
    
    
            <div class="product_page_features_section">
                <div class="features_container">
                    <div class="tittle_fratures">
                        Features 
                    </div>
                   
                        <?php   foreach($features as $feature){
                            echo  "<span class='span_star'> *</span> <span>{$feature}</span><br>";

                    }?>
                    
                </div>

                <div class="img_container">
                <?php
                $img = explode(",",$productImage);
            foreach($img as $src){
                    ?>
                    <img src="<?php echo "../img/{$src}" ;  ?>" alt="wrong location">
                    <?php
                }

            }}
                ?>
                
                </div>
                </div>

            <div class="lpt1">
                <div class="title">
                     similar products :
                </div>
                <div class="laptopContainer">
                    
                  <?php

                include "../connection.php";
                $dirToImg = "../img/";
                $key = 'dell' ;
    if($key!=0){
        $select = "SELECT * FROM  `laptop` WHERE keyword = $key"  ;
    }else{
    $select = "SELECT * FROM  `laptop`" ;
    }
    $result = $connection->query($select);
    $count = 0;

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $product_id = $row['id_no'];

         $laptopName = $row["laptopName"] ;
         $laptopImage = $row["laptopImages"];
         $laptopFrontImage = $row["laptopFrontImages"]; 
         $laptopFeatures = $row["laptopFeatures"]; 
         $laptopOrginalPrice = $row["laptopPriceOrginal"] ;
         $laptopDiscountPrice  = $row["laptopPriceDiscounted"]; 
         $n =  $row["laptopRating"];
         
         ?>
        <div class="container">
        <input type="text" hidden style="display: none;" data-id="<?php echo $product_id;   ?>">
         <img src="<?php echo "{$dirToImg}{$laptopFrontImage}" ;?>">
        <div class="btm">
            <h2 class="heading"><?php echo $laptopName ; ?></h2>
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
               RS.  <?php echo $laptopOrginalPrice ; ?>
            </small>
            RS. <?php echo  $laptopDiscountPrice ; ?>
            </small>
            <br>
            <a class="btn_add_cart " href="#cart">
                 Add to cart <i class="fas fa-cart-plus"></i>
            </a>
        </div>
    </div>


<?php

        }
      }  
    
  
?>

</div>
                
            </div>

</body>
<script src="./product.js"></script>
<script src='./searchFilter.js'></script>
<script src="https://kit.fontawesome.com/cc8ed28d8b.js" crossorigin="anonymous"></script>
<script src="../js/nav.js"></script>
<script src="../js/redirect.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
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
        // window.location.href)
    }
})


    search_button.addEventListener("click",function() {
        window.location.href = "../search.php?search_query="+search_query.value;
    })

var addtoCart = document.querySelectorAll(".btn_add_cart");
addtoCart.forEach(function(elm,i){
        elm.addEventListener("click",function(){
     var  cart  =  elm.parentElement.parentElement.children.item(0).getAttribute("data-id");
     window.location.href= "../send_data.php?addtocart="+cart+"&from=p";
    })
})

var addtoCart1 = document.querySelectorAll(".AddToCart");
addtoCart1.forEach(function(elm,i){
        elm.addEventListener("click",function(){
     var  cart  =  elm.parentElement.parentElement.children.item(0).getAttribute("data-id");
     <?php 

        $_SESSION['previous_location_add_buy'] = "?keyword=".$_GET['keyword'];
     ?>
     
     window.location.href= "../send_data_pro.php"+window.location.search+"&from=p";
    })
})
 
</script>
</html>

