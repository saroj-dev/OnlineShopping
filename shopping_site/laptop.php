<?php 

function printLaptop(){
    include "connection.php";
    $select = " SELECT * FROM  laptops";
    $result = $connection->query($select);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
         $laptopName = $row["laptopName"] ;
         $laptopImage = $row["laptopImages"];
         $laptopFrontImage = $row["laptopFrontImages"]; 
         $laptopFeatures = $row["laptopFeatures"]; 
         $laptopOrginalPrice = $row["laptopPriceDiscounted"] ;
         $laptopDiscountPrice  = $row["laptopPriceOrginal"]; 
         $n =  $row["laptopRating"];
         ?>
        <div class="container">
         <img src="img/<?php echo $laptopFrontImage ?>">
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



        }
      }  

 


    }
?>