<?php
    session_start();
    $INTHECART = array();
 

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
        $product_id = $row['id_no'];
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
               
                <img src="../svg/heartr.svg" id=heart_btn height="20"  width="20" alt=""> 
              
                
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
                <input class="input_container" type="number" min="1" max="5" value="1"  disabled>
                <span class="qty_span add" onclick="add_sub(1)">+</span>
            </small>
<div class="btn_section">
    <div class="buyNow"> buy now
    </div> <?php
    $unique_array_IN  = array_unique($INTHECART);
                    
                    if(in_array($_GET['keyword'], $unique_array_IN) ){
                     
                           ?>
                           
                       
                           <?php
                   }
                   else {
                       ?>
                         
            </a>
                       <?php
               }
?>

                  
<?php
            // making a querry to check fetch the data from the userinfo tab.
            if(isset($_SESSION["is_login"])){
                $checkQ = "SELECT * FROM `userinfo` WHERE emailAddress='{$_SESSION['email']}'";
            //    checking the output of the query
                $output =  $connection->query($checkQ);
                if($output->num_rows > 0){
                    // echo "it has some value";
                  
                    while($cart = $output->fetch_assoc()){
                        array_push($INTHECART , $cart['cart']);
                    }
                    $unique_array_IN  = array_unique($INTHECART);
                         if(in_array($_GET['keyword'], $unique_array_IN)){
                                ?>
                                
                                <a class="AddToCart disabled" href="#cart">
                        In the cart <i class="fas fa-cart-plus"></i>
                    </a>
                                <?php
                        }
                        else {
                            ?>
                           <a class="AddToCart " href="#cart"  >
                 Add to  cart<i class="fas fa-cart-plus"></i></a>
                            <?php
                    }}
                    else {
                        ?>
                     <a class="AddToCart " href="#cart"  >
                 Add to  cart<i class="fas fa-cart-plus"></i></a>
                        <?php
                    }}
                    else{
                        ?>
                        <a class="AddToCart not_logged_in" href="#cart"  >
                 Add to  cart<i class="fas fa-cart-plus"></i></a>
                        <?php
                    }
                
            ?>







        
                    
</div>
        </div>
        
            
        <div class="product_page_delevery_option_container">
					<div class='product_page_display_address'>

					</div><div class="btn_con_add_change"onclick="showFilter()"> Choose Your Shipping address
                        <button class='button_addres_changer_adder' onclick="showFilter()">Add ></button>
                    </div>

                    

<div class="boX_back" id="this">
</div>
    <div class="box_alert">
         <h3>Is this information correct</h3><br>
         <div class="info_tab_box">
             <span>
                User Name :
             </span>
             <span>
                <?php
                  echo  $_SESSION["userName"];
                ?>
             </span>
             <br>
             <span>
                Email :
             </span>
             <span id='user_gmail'>
                <?php
                  echo  $_SESSION["email"];
                ?>
             </span>
             <br>
             <span>
                Phone Number :
             </span>
             <input type="number" placeholder="Select the Number" id="number_container_alert_box">
             <br>
             <span>
                 Shipping Address :
             </span>
             <span id="addresh_container_alert_box">
                
             </span>
             <br>
             <span>
                Product : 
             </span>
                <span id="Product_titile_alert_box">
                    <?php
                    echo $productName;
                    ?>
                </span>
             
             <br>
             <span>
             <small class="qty">
                Quantity  
                <input class="inthe" type="number" min="1" max="5"   disabled>
                 
            </small>
             </span>
             <div class="buyNow1"> buy now
            </div>
             
         </div>
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
        

            
    <?php
            // making a querry to check fetch the data from the userinfo tab.
            if(isset($_SESSION["is_login"])){
                $checkQ = "SELECT * FROM `userinfo` WHERE emailAddress='{$_SESSION['email']}'";
            //    checking the output of the query
                $output =  $connection->query($checkQ);
                if($output->num_rows > 0){
                    // echo "it has some value";
                  
                    while($cart = $output->fetch_assoc()){
                        array_push($INTHECART , $cart['cart']);
                    }
                    $unique_array_IN  = array_unique($INTHECART);
                    
                         if(in_array($product_id, $unique_array_IN) ){
                          
                                ?>
                                
                                <a class="btn_add_cart disabled " href="#cart">
                                    In the Cart <i class="fas fa-cart-plus"></i>
                                </a>
                                <?php
                        }
                        else {
                            ?>
                            <a class="btn_add_cart " href="#cart">
                                        Add to cart <i class="fas fa-cart-plus"></i>
                            </a>
                            <?php
                    }}
                    else {
                        ?>
                        <a class="btn_add_cart " href="#cart">
                                    Add to cart <i class="fas fa-cart-plus"></i>
                        </a>
                        <?php
                    }}
                    else{
                        ?>
                        <a class="btn_add_cart not_logged_in" href="#cart">
                                    Add to cart <i class="fas fa-cart-plus"></i>
                        </a>
                        <?php
                    }
                
            ?>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://smtpjs.com/v3/smtp.js"></script>
 <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->

 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
    if(elm.classList.contains('disabled')){
        elm.style.cursor = "not-allowed";
        elm.style.opacity = "0.5";
    } else{
        elm.addEventListener("click",function(){
            var request = new XMLHttpRequest();
            var  cart  =  elm.parentElement.parentElement.children.item(0).getAttribute("data-id");
     <?php 
    $_SESSION['previous_location_add_buy'] = "?keyword=".$_GET['keyword'];
     ?>
         request.onreadystatechange = function() {
            if(this.readyState === 4 && this.status === 200) {
            if(elm.classList.contains("not_logged_in")){
            window.location.href = "../reg/login.php";
            }else{
            elm.innerHTML = "In the cart <i class='fas fa-cart-plus'></i>";
            elm.style.cursor = "not-allowed";
           elm.style.opacity = "0.5";
           elm.style.pointerEvents = "none";
            }
        }
    };
    request.open("GET","../send_data.php?addtocart="+cart+"&from=p",true);
    request.send();
    })
    }
})

var addtoCart1 = document.querySelectorAll(".AddToCart");
addtoCart1.forEach(function(elm,i){
    if(elm.classList.contains('disabled')){
        elm.style.cursor = "not-allowed";
        elm.style.opacity = "0.5";
    } else{
    var request = new XMLHttpRequest();
        elm.addEventListener("click",function(){
     var  cart  =  elm.parentElement.parentElement.children.item(0).getAttribute("data-id");
     <?php 
    $_SESSION['previous_location_add_buy'] = "?keyword=".$_GET['keyword'];
     ?>
    request.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200) {
            if(elm.classList.contains("not_logged_in")){
            window.location.href = "../reg/login.php";
            }else{
            elm.innerHTML = "In the cart <i class='fas fa-cart-plus'></i>";
            elm.style.cursor = "not-allowed";
           elm.style.opacity = "0.5";
           elm.style.pointerEvents = "none";
            }
        }
    };

    request.open("GET","../send_data_pro.php"+window.location.search,true);
    request.send();
    })
    }
})

document.querySelector(".fa-shopping-cart").addEventListener("click", function(){

window.location.href = "../show_cart.php"; 

});

 var box_black = document.querySelector(".boX_back");
 var alert_box = document.querySelector(".box_alert");
document.querySelector(".buyNow").addEventListener("click",function () {
    addtoCart1.forEach(function(elm,i){
    if(elm.classList.contains("not_logged_in")){
            window.location.href = "../reg/login.php";
    
    }
    })
    setTimeout(function(){

    box_black.style.display = "flex";
    alert_box.style.display="block";
   document.querySelector(".search__container").style.position = "fixed";
   document.querySelector(".search__container").style.top = "50%";
   document.querySelector(".search__container").style.right = "30px";
   document.querySelector(".search__container").style.zIndex = "500";
   document.querySelector(".search__container").style.transform = "translate(30px,-50%)";
   document.querySelector(".inthe").value = document.querySelector(".input_container").value;

setInterval(() => {
    var qty =document.querySelector(".input_container").value ;
    var usrloc =document.querySelector("#addresh_container_alert_box").innerText  ;
    var phn = document.querySelector("#number_container_alert_box").value;
    var usreml =document.querySelector("#user_gmail").innerText;
    if(usrloc!="Choose Your Shipping Address Add >" && phn!=''){
        document.querySelector(".buyNow1").style.opacity="1";
        document.querySelector(".buyNow1").style.pointerEvents = "all";
    }else{
        document.querySelector(".buyNow1").style.opacity="0.6";
        document.querySelector(".buyNow1").style.pointerEvents = "none";
        console.log(usrloc)
    }

}, 100);




box_black.addEventListener("click",function(){
    this.style.display = "none";
    document.querySelector(".search__container").style.position = "absolute";
   document.querySelector(".search__container").style.top = "auto";
   document.querySelector(".search__container").style.right = "50%";
   document.querySelector(".search__container").style.zIndex = "500";
   document.querySelector(".search__container").style.transform = "translate(-50%,5%)";
    alert_box.style.display="none";
})

 

    
},200 )
 
 

})

 
document.querySelector("#number_inp_user").addEventListener("change",function(){
    document.querySelector("#number_container_alert_box").value = (this.value);
    
})
document.querySelector("#number_container_alert_box").addEventListener("keydown",function(e){


check_theNUm(this);
// e.key=1;
})


document.querySelector("#number_inp_user").addEventListener("keydown",function(e){


    check_theNUm(this);
    // e.key=1;
})
// document.querySelector("#addresh_container_alert_box").innerHTML = .innerHTML;

    setInterval(function(){
    document.querySelector("#addresh_container_alert_box").innerHTML = document.querySelector(".btn_con_add_change").innerHTML;
   },1000)

 

   function check_theNUm(e){
 

  if((e.value.length === 9)) {
    //   return true;
        e.style.outline  = "2px solid green";
        }
      else if(e.value.length > 9)
        { 
        e.style.outline  = "2px solid green";
        e.value = parseInt(e.value / 10)
    }
    else{
        e.style.outline = "2px solid red";

        }

console.log(e.value.length)


    // if(e.value.length === 10 ){
        
    // }
    // else{
    // }
    // if(e.value.length >= 10){
    //     e.value = parseInt(e.value / 10);
    //     e.style.outline  = "2px solid green";
    // }



   }



document.querySelector(".buyNow1").addEventListener("click",function(){
    var qty =document.querySelector(".input_container").value ;
    var usrloc =document.querySelector("#addresh_container_alert_box").innerText  ;
    var phn = document.querySelector("#number_container_alert_box").value;
    var usreml =document.querySelector("#user_gmail").innerText;

        if(usrloc!="Choose Your Shipping Address Add >" && phn!=''){
 var window_search= window.location.search + "&qty="+(qty.split(" ")).join("")+"&usrloc="+(usrloc.split(" ")).join("")+"&phn="+(phn.split(" ")).join("") + "&usreml="+(usreml.split(" ")).join("");
        this.style.pointerEvents = "none";
        var send_data_page = new XMLHttpRequest();
        send_data_page.open("GET","../buyNow.php"+window_search,true);
        send_data_page.send();
        box_black.style.display = "none";
        alert_box.style.display="none";

    Email.send({
          SecureToken: "0595beeb-b765-4993-87ac-cd91bf333730",
          To: 'sajanaregmi40@gmail.com',
          From: "proudnepal.it@gmail.com",
          Subject: "shopping order",
          Body: "this is from the uncle ko site how is it...",
        }).then(
          message => {
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Your order is placed successfully ! Thank you',
                showConfirmButton: true,
                timer: 3100
            });
            setTimeout(function(){
            window.location.href = "../index.php";
            }, 3000)
        
        })
          }


}
)




document.querySelector(".fa-user-circle").addEventListener("click",function(){
    window.location.href = "../user_profile.php";
})



</script>
</html>