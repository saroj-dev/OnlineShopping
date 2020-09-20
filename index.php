<?php 
include 'OnlineShopping-master\shopping_site\connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Result</title>
    <link rel="stylesheet" href="./css/index.css" />
    <link rel="stylesheet" href="./css/search.css" />
</head>
<body>
<form action=".\OnlineShopping-master\shopping_site\search.php">
    <input type="text" name="search_query" placeholder="Your search" />
    <button type="submit" name='search_button'>Search</button>
</form>
<?php

    $searchQuery = 'SELECT * FROM laptops;';
    $result = mysqli_query($connection,$searchQuery);
    $resultRow = mysqli_num_rows($result);
    if($resultRow > 0){
        while($data = mysqli_fetch_assoc($result)){
            echo '<div class="item">
                    <h1>'. $data['laptopName'] .'</h1>
                    <p>'. $data['laptopPriceDiscounted'] .'</p>
                    </div>';
        }
    }

?>
</body>
</html>
