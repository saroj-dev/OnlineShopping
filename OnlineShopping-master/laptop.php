<?php 

function printLaptop($key , $dirToImg){
    include "connection.php";
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
         if($count<3){
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
            <a class="btn_add_cart" href="#cart">
                 Add to cart <i class="fas fa-cart-plus"></i>
            </a>
        </div>
    </div>


<?php

$count++;

        }
      }  
    }
 


    }
?>