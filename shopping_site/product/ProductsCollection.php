<?php
function showProduct($dirToImg){
include "../connection.php";
  
$table = $_GET['Name'];
$select = "SELECT * FROM  $table";
$result = $connection->query($select);

if($result->num_rows > 0){
    while ($row = $result->fetch_assoc()) {
        $productName = $row["{$table}Name"] ;
         $productImage = $row["{$table}Images"];
         $productFrontImage = $row["{$table}FrontImages"]; 
         $productFeatures = $row["{$table}Features"]; 
         $productOrginalPrice = $row["{$table}PriceDiscounted"] ;
         $productDiscountPrice  = $row["{$table}PriceOrginal"]; 
         $n =  $row["{$table}Rating"];
?> 
            <div class="container">
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
                    <br>
                    <a class="btn_add_cart" href="#cart">
                         Add to cart <i class="fas fa-cart-plus"></i>
                    </a>
                </div>
        </div>
     


<?php }

}
}

?>