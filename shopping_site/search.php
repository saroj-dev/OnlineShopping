<?php 
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Result</title>
     
</head>
<body>

<h1>Search Results </h1>
<?php
    if(isset($_GET['search_query'])){
        $search = mysqli_real_escape_string($connection,$_GET['search_query']);
        $multiSearch = explode(" ", $search);
        $idOfItems = array();
        for($i = 0; $i < count($multiSearch); $i++){
            $searchQuery = "SELECT id_no FROM laptop WHERE laptopName LIKE '%$multiSearch[$i]%' OR laptopFeatures LIKE '%$multiSearch[$i]%' OR laptopPriceOrginal LIKE '%$multiSearch[$i]%' OR laptopRating LIKE '%$multiSearch[$i]%';";
            $result = mysqli_query($connection,$searchQuery);
            $resultRow = mysqli_num_rows($result);
            if($resultRow > 0){
                while($data = mysqli_fetch_assoc($result)){
                    // $n =  intval($data["laptopRating"]);
                    print $data['id_no'];
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
                    echo '<div class="container">
                            <img src="img/'.$item["laptopFrontImages"].'" />
                            <div class="btm">
                                <h2 class="heading">'.$item["laptopName"].'</h2>
                                <small>
                                
                                </small>
                                <small class="orginal_price">
                                    <small class="high_price">
                                    RS.  '.$item["laptopPriceOrginal"].'
                                </small>
                                RS. '.$item["laptopPriceDiscounted"].'
                                </small>
                                <br>
                                <a class="btn_add_cart" href="#cart">
                                        Add to cart <i class="fas fa-cart-plus"></i>
                                </a>
                            </div>
                        </div>';
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
</body>
</html>