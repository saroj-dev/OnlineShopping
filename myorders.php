<div class="laptopContainer">
<?php 
include "connection.php";
$email = $_SESSION['email'];
// echo $email;
$select  = "SELECT * FROM `orders` WHERE user_gmail = '$email'";
$result = $connection->query($select);
// echo $result->num_rows;
$arr = array();

while($row = $result->fetch_assoc()){
    $id  = $row['product_id'];
    array_push($arr , $id);
}

foreach ($arr as $key ) {
    $dirToImg = "img/";
    $select1 =  "SELECT * FROM `laptop` WHERE id_no = '$key'";
    $result1 = $connection->query($select1) or die($connection->error);
while($row1 = $result1->fetch_assoc()){
    $product_id = $row1['id_no'];
    $laptopName = $row1["laptopName"] ;
    $laptopImage = $row1["laptopImages"];
    $laptopFrontImage = $row1["laptopFrontImages"]; 
    $laptopFeatures = $row1["laptopFeatures"]; 
    $laptopOrginalPrice = $row1["laptopPriceOrginal"] ;
    $laptopDiscountPrice  = $row1["laptopPriceDiscounted"]; 
    $n =  $row1["laptopRating"];
    
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
$connection->close();

?></div>