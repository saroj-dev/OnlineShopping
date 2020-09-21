<?php 
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Result</title>
    <link rel="stylesheet" href="product/allproducts.css">
    <link rel="stylesheet" href="css/index.css">
    <style>
       .laptopContainer > .container{
           margin-top: 50px;
        }
        .nav{
            background: #333 ;
        }
    </style>
</head>
<body>
<div class="va">
        <?php
include "../nav.html";
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
                        $productName =$item["laptopName"] ;
                        $productImage =$item["laptopImages"];
                        $productFrontImage =$item["laptopFrontImages"]; 
                        $productFeatures =$item["laptopFeatures"]; 
                        $productOrginalPrice =$item["laptopPriceDiscounted"] ;
                        $productDiscountPrice  =$item["laptopPriceOrginal"]; 
                        $n = $item["laptopRating"];
                    ?>
                    <div class="container">
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
                 <small class="orginal_price">
                     <small class="high_price">
                     <?php
                        echo  "RS. {$productDiscountPrice}";
                         ?>
                         </small>
                     <?php echo "RS. {$productOrginalPrice}";
                                ?>
                    </small>
                    <br>
                    <a class="btn_add_cart" href="#cart">
                         Add to cart <i class="fas fa-cart-plus"></i>
                    </a>
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


</script>
</html>