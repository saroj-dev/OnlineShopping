<div class="laptopContainer">

<?php   

    if(isset($_REQUEST['q'])){ 
    $INTHECART = array();
    include "connection.php";
    $arra = explode(",",$_REQUEST['q']);
    foreach ($arra as $k) {
        $select  = "SELECT * FROM `laptop`";
        $result = $connection->query($select);
    // $result = $connection->prepare("SELECT * FROM `laptop`");
    // $result->bind_param("i",$_REQUEST['q']);
    // $result->execute();
    $dirToImg = "img/";
    
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
            if($k  == $product_id){

            ?>
        <div class="container">
        <input type="text" hidden style="display: none;" data-id="<?php echo $product_id;   ?>">
         <img src="<?php echo "{$dirToImg}{$laptopFrontImage}" ;?>">
        <div class="btm">
            <h2 class="heading" onclick="callMeend(<?php echo $product_id?>)"><?php echo $laptopName ; ?></h2>
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
                                    Click The title To order 👆 
                                </a>
                                <?php
                        }
                        else {
                            ?>
                            <a class="btn_add_cart " href="#cart">
                            Click The title 👆 
                            </a>
                            <?php
                    }}
                    else {
                        ?>
                        <a class="btn_add_cart " href="#cart">
                        Click The title 👆  
                        </a>
                        <?php
                    }}
                    else{
                        ?>
                        <a class="btn_add_cart not_logged_in" href="#cart">
                        Click The title 👆 
                        </a>
                        <?php
                    }
                
            ?>




        </div>
    </div>


<?php 

        
            }  }
    }else{
        ?>
        <h3 style="margin-top:20px">
            Try adding items in the favurite list.
        </h3>
        <?php
         
    } 
}}

     
    ?>

    </div>
 