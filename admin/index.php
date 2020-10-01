<?php
    include './comp/row.php';
    include './comp/popup.php';
    include './comp/SearchBox.php';
    include './comp/order.php';
    include '../connection.php';
    require_once('./insert.php');
?>   
 
 
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Admin Panel</title>
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="https://unpkg.com/file-upload-with-preview@4.0.2/dist/file-upload-with-preview.min.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/admin.css">
 </head>
 <body>
    <div class="container">
        <div class="container-fluid mx-auto py-4 bg-dark text-light text-center">
            <h1>Admin Panel</h1>
        </div>
        
        <!-- Ordered Product section -->
        <div id="AdimnProducts">
            <?php
                //calling search box
                SearchForm('productSearch','Search for the product');

                //quering for data presentation
                $query = "SELECT id_no, laptopName, laptopFrontImages, laptopFeatures, laptopPriceDiscounted FROM laptop";
                $result = mysqli_query($connection,$query);
                if(mysqli_num_rows($result) > 0){
                    while($product = mysqli_fetch_assoc($result)){
                        row($product['id_no'],$product['laptopName'],$product['laptopFrontImages'],$product['laptopFeatures'],$product['laptopPriceDiscounted']);
                    }
                }
                else{
                    echo 'No data in database.';
                }

            ?>
        </div>

        <?php
            include './admin.php';
        ?>
        <form action="" method="post">
            <button type="submit" name="add_product" class="btn btn-primary my-5 d-flex mx-auto align-items-center">Add product <span class="material-icons">add</span></button>
        </form>
    


        <!-- Ordered Product section -->
        <div id="OrderedProducts">
            <?php
                //calling search box
                SearchForm('orderSearch','Filter out the orders');

                //quering for data presentation
                $first_query = "SELECT * FROM orders";
                $first_query_result = mysqli_query($connection,$first_query);
                if(mysqli_num_rows($first_query_result) > 0){
                    while($order = mysqli_fetch_assoc($first_query_result)){
                        $orderItemId = $order['product_id'];
                        $second_query = "SELECT laptopName, laptopFrontImages FROM laptop WHERE id_no = '$orderItemId'";
                        $second_query_result = mysqli_query($connection,$second_query);
                        if(mysqli_num_rows($second_query_result) > 0){
                            while($OrderedProduct = mysqli_fetch_assoc($second_query_result)){
                                order($order['id'],$OrderedProduct['laptopName'],$OrderedProduct['laptopFrontImages'],$order['quantity'],$order['user_location'],$order['user_Phone_Number'],$order['user_gmail']);
                            }
                        }
                        else{
                            echo "Error while getting the product";
                        }
                    }
                }
                else{
                    echo 'All orders have been delivered.';
                }

            ?>
        </div>
    
    
    </div>
    
    
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fetch/2.0.3/fetch.js"></script>
    <script src="https://unpkg.com/file-upload-with-preview@4.0.2/dist/file-upload-with-preview.min.js"></script>
    <script src="../js/AdminPopup.js"></script>
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
 
</script>

</body>
 </html>