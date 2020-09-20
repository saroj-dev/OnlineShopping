<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="allproducts.css">
    <link rel="stylesheet" href="../css/index.css"> 
    <title>Document</title>
</head>
<body>
     
    <div class="suggested__products__container">
        <div class="title_suggested">
            <?php 
            echo $_GET["group"];
            ?>
            </div>
            <div class="laptopContainer">
        <?php
            include "ProductsCollection.php";
            showProduct("../img/");
        ?>
        </div>
            </div>
       
    
    

</body>
</html>