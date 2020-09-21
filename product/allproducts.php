<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="../css/index.css">
     <style>
         
         .title_suggested{
             margin-top: 80px;
             text-transform: capitalize;
             font-size: 2.5em;
             font-weight: bolder;
             color:rgba(51, 51, 51, 0.733);
             margin-left: 50px;
         }
     </style>
    <title>Document</title>
</head>
<body>
<?php 
      include "../nav.html" ;
?>

    <div class="suggested__products__container">
        <div class="title_suggested">
            <?php 
            if(isset($_GET['group'])){

                echo $_GET["group"];
            }
            ?>
            </div>
            <div class="laptopContainer">
        <?php
            include "ProductsCollection.php";
            showProduct(0,"../img/");
        ?>
        </div>
            </div>
       
    
    

</body>
<script src="https://kit.fontawesome.com/cc8ed28d8b.js" crossorigin="anonymous"></script>
<script src="../js/nav.js"></script>
</html>