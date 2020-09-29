<?php 
function printLaptop($key , $dirToImg){
    $INTHECART = array();
    include "connection.php";
    $select = "SELECT * FROM  `laptop` WHERE keyword='$key' LIMIT 10";
    $result = $connection->query($select) or die("<h1 color='#fff'>Error from our side sorry</h1>");
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
             <div class="swiper-slide">
        <input type="text" hidden style="display: none;" data-id="<?php echo $product_id;   ?>">
         <img src="<?php echo "{$dirToImg}{$laptopFrontImage}" ;?>">
        <div class="btm" >
            <h2 class="heading"><?php echo $laptopName ; ?></h2>
            <br>
            <small>
            <?php
            while ($n>0){
               echo '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z"/></svg>';
                $n = $n-1;
            }
            ?>
         </small>
                             &nbsp;
                            &nbsp;
                            &nbsp;
                            
                
        <small class="high_price">
            RS.  <?php echo $laptopOrginalPrice ; ?>
        </small>
        &nbsp;
                         
         <small class="orginal_price">
            RS. <?php echo  $laptopDiscountPrice ; ?>
            </small>
            <br>
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
      ?>
     
      <?php
      
    }
 


    }
?>