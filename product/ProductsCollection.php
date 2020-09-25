<?php
function showProduct( $check, $dirToImg){
      $INTHECART = array();
include "../connection.php";
  if(isset($_GET['Name'])){
      $table = $_GET['Name'];
    }
    else{
        $table = "laptop";

  }
if($check!=0){
    $select = "SELECT * FROM  $table";
}
else{
    $select = "SELECT * FROM  $table WHERE keyword=$check  ";
}

$result = $connection->query($select);

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
     


<?php }

}
}

?>