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
             
            echo "<script>window.location.href = 'reg/login.php'</script>";
       
        }
        
        
        
  

    ?>


        </div>
            <!-- </div> -->
       