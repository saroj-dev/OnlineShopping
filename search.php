<?php 
include 'connection.php';
$INTHECART = array();
?>

<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Result</title> 
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/cart_inthe_flex.css">
    
</head>
<body>
<div class="va">
        <?php
include "nav.php";
        ?>


</div>

<h1 class="Search_title_search">Search Results </h1>
<div class="laptopContainer">
<?php
    if(isset($_GET['search_query'])){
        $search = mysqli_real_escape_string($connection,$_GET['search_query']);
        $multiSearch = explode(" ", $search);
        $idOfItems = array();
        for($i = 0; $i < count($multiSearch); $i++){
            $searchQuery = "SELECT id_no FROM laptop WHERE laptopName LIKE '%$multiSearch[$i]%' OR laptopFeatures LIKE '%$multiSearch[$i]%' OR laptopPriceOrginal LIKE '%$multiSearch[$i]%' OR laptopRating LIKE '%$multiSearch[$i]%' OR keyword LIKE '%$multiSearch[$i]%';";
            $result = mysqli_query($connection,$searchQuery);
            $resultRow = mysqli_num_rows($result);
            if($resultRow > 0){
                while($data = mysqli_fetch_assoc($result)){
                    // $n =  intval($data["laptopRating"]);
                    array_push($idOfItems,$data['id_no']);
                }
            }
        }

        if(count($idOfItems) > 0){
            $itemId = array_unique($idOfItems);
            for($j = 0; $j < count($itemId); $j++){
                $getItemQuery = "SELECT * FROM laptop WHERE id_no = '$itemId[$j]'";

                $itemResult = mysqli_query($connection,$getItemQuery);
                $itemResultRow = mysqli_num_rows($itemResult);

                if($itemResultRow > 0){
                    while($item = mysqli_fetch_assoc($itemResult)){
                        $product_id = $item['id_no'];
                        $productName =$item["laptopName"] ;
                        $productImage =$item["laptopImages"];
                        $productFrontImage =$item["laptopFrontImages"]; 
                        $productFeatures =$item["laptopFeatures"]; 
                        $productOrginalPrice =$item["laptopPriceDiscounted"] ;
                        $productDiscountPrice  =$item["laptopPriceOrginal"]; 
                        $n = $item["laptopRating"];
                    ?>
                    <div class="container">
                        <input type="text" hidden style="display: none;" data-id="<?php echo $product_id;   ?>">
            <img class="theImg_from_db_style" src="<?php echo "img/{$productFrontImage}" ;?>">
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
                 &nbsp; &nbsp; 
                 
                 &nbsp;                  <small class="high_price">
                     <?php
                        echo  "RS. {$productDiscountPrice}";
                         ?>
                         </small>
                 &nbsp;  
                         
                 <small class="orginal_price">
                    
                     <?php echo "RS. {$productOrginalPrice}";
                                ?>
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
                        <a class="btn_add_cart  not_logged_in" href="#cart">
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
            }
        }

        else{
            print '<h1>No result find</h1>';
        }

    }
    else{
        print 'Not a good manner, be a good guy';
    }
?>
</div>
</body>
<script src="https://kit.fontawesome.com/cc8ed28d8b.js" crossorigin="anonymous"></script>
<script src="js/nav.js"></script>
<script src="js/redirect.js"></script>

<script>
    var  search_query = document.querySelector("#search_id");
    var  search_button = document.querySelector(".fa-search");
 
search_query.addEventListener("keypress", function(e){
    if(e.key == 'Enter'){
        window.location.href = "?search_query="+search_query.value;
        console.log(window.location.href)
    }
})


    search_button.addEventListener("click",function() {
        window.location.href = "?search_query="+search_query.value;
    })
    var container = document.querySelectorAll(".btm > .heading");
container.forEach(function name(elm , i) {
    elm.addEventListener("click",function(){
        url = "product.php?keyword="+elm.parentElement.parentElement.children.item(0).getAttribute("data-id");
        window.location.href = url;
        alert("url");
    });})

    
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
           var new_req = new XMLHttpRequest();
           new_req.onreadystatechange = function(){
            if(this.readyState === 4 && this.status === 200) {
               console.log(this.responseText)
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
})

</script>
</html>