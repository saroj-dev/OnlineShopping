<?php 

if(isset($_SESSION['email'])){
 

    if(isset($_SESSION['userName'])){
 

        if($_SESSION['userName'] == "Admin"){  
 

        if($_SESSION['email'] == "proudnepal.it@gmail.com"){  
 
 
    }
    else{            echo "<script> window.location.href = '../index.php'</script> ";

    }    
 } else{            echo "<script> window.location.href = '../index.php'</script> ";

    }
  }  else{            echo "<script> window.location.href = '../index.php'</script> ";

    }
 } else{            echo "<script> window.location.href = '../index.php'</script> ";

    }

?>


<?php

function insertData(){ 
    $conn = $GLOBALS['connection'];
    $productName = mysqli_real_escape_string($conn,trim($_POST['title']));
    $productFrontImage = mysqli_real_escape_string($conn,trim($_POST['title']));
    $productRating = mysqli_real_escape_string($conn,trim($_POST['rating']));
    $productFeatures = mysqli_real_escape_string($conn,trim($_POST['features']));
    $productOrginalPrice = mysqli_real_escape_string($conn,trim($_POST['originalPrice']));
    $productDiscountPrice  = mysqli_real_escape_string($conn,trim($_POST['discountedPrice']));
    $productKeywords = mysqli_real_escape_string($conn,trim($_POST['key']));

    //Playing with images
    $images = $imageFullName = '';
    $fullNameImages = array();
    $productImage = $_FILES['images'];
    $targetDir = "../img/";
 
    foreach($productImage['name'] as $key => $image){
        $imageName = $productImage['name'][$key];
        $imageUniqueName = uniqid('',true);
        $imageFullName = $imageUniqueName.$imageName;
        
        if($key == count($productImage['name'])-1){
            $images .= $imageFullName;
        }
        else{
            $images .= $imageFullName . ',';
        }
        array_push($fullNameImages,$imageFullName);
        $imageTmpName = $productImage['tmp_name'][$key];
        if(move_uploaded_file($imageTmpName, $targetDir.$imageFullName)){ 
            alert('success','Congrats!','File moved successfully');
        }
        else{ 
            alert('error','NO!','Uploading image failed');
        }
    }
    $sql = "INSERT INTO laptop (laptopName,laptopImages,laptopFrontImages,laptopFeatures,laptopPriceOrginal,laptopPriceDiscounted,laptopRating,keyword) VALUES('$productName','$images','$fullNameImages[0]','$productFeatures','$productOrginalPrice','$productDiscountPrice','$productRating','$productKeywords')";
    if(mysqli_query($conn,$sql)){
        alert('success','Yep!','Successfully inserted');
        echo "<script> window.history.replaceState( null, null, window.location.href);window.location.reload(true);</script>";

    }
    else{
        alert('error','Failed!',',failed to insert');
    }
}


function updateData(){ 
    $conn = $GLOBALS['connection'];
    $itemID = (int)$_POST['id'];
    $productName = mysqli_real_escape_string($conn,trim($_POST['title']));
    $productFrontImage = mysqli_real_escape_string($conn,trim($_POST['title']));
    $productFeatures = mysqli_real_escape_string($conn,trim($_POST['features']));
    $productRating = mysqli_real_escape_string($conn,trim($_POST['rating']));
    $productOrginalPrice = mysqli_real_escape_string($conn,trim($_POST['originalPrice']));
    $productDiscountPrice  = mysqli_real_escape_string($conn,trim($_POST['discountedPrice']));
    $productKeywords = mysqli_real_escape_string($conn,trim($_POST['key']));

    //Playing with images
    $images = $imageFullName = '';
    $fullNameImages = array();
    $productImage = $_FILES['images'];
    $targetDir = "../img/"; 
 
    if($productImage){
        foreach($productImage['name'] as $key => $image){
            if(!empty($image)){
            $imageName = $productImage['name'][$key];
            $imageUniqueName = uniqid('',true);
            $imageFullName = $imageUniqueName.$imageName;
            if($key == count($productImage['name'])-1){
                $images .= $imageFullName;
            }
            else{
                $images .= $imageFullName . ',';
            }
            array_push($fullNameImages,$imageFullName);
            $imageTmpName = $productImage['tmp_name'][$key];
            if(move_uploaded_file($imageTmpName, $targetDir.$imageFullName)){ 
                alert('success','Congrats!','Image updated successfully');
            }
            else{
                alert('error','NO!','Uploading image failed');
            }        
        }
    }
    }
  echo $images;

    if(empty($images)){
        $sql = "UPDATE laptop SET laptopName='$productName',laptopFeatures='$productFeatures',laptopPriceOrginal='$productOrginalPrice',laptopPriceDiscounted='$productDiscountPrice',laptopRating='$productRating',keyword='$productKeywords' WHERE id_no='$itemID'";
    }
    else{
        $sql = "UPDATE laptop SET laptopName='$productName', laptopFeatures='$productFeatures',laptopImages='$images',laptopFrontImages='$fullNameImages[0]',laptopPriceOrginal='$productOrginalPrice',laptopPriceDiscounted='$productDiscountPrice',laptopRating='$productRating',keyword='$productKeywords' WHERE id_no='$itemID'";
    }
 
    if(mysqli_query($conn,$sql)){
        alert('success','Yep!','Successfully updated');
        
        echo "<script> window.history.replaceState( null, null, window.location.href);window.location.reload(true);</script>";

    }
    else{
        alert('error','Failed!',',failed to update');
    }
}




function deleteData(){
    $conn = $GLOBALS['connection'];
    $ID = (int)$_POST['id'];
    $imgSql = "SELECT laptopImages FROM laptop WHERE id_no = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt , $imgSql)){
       echo "sql failed";
    }
   else{ 
       mysqli_stmt_bind_param($stmt,"i" , $ID );
       mysqli_stmt_execute($stmt);
       $resu = mysqli_stmt_get_result($stmt);

       while($ro = mysqli_fetch_assoc($resu)){
 
        echo "this is the row of the database.";
        $r = $ro['laptopImages'];
        $img = explode(",",$r);
            foreach($img as $src){
                 
    if(!empty($src)){
    
                
        if (!unlink('../img/'.$src)) {  
            echo ("$src cannot be deleted due to an error");  
        }  
        else {  
            echo ("$src has been deleted");  
        }  
    }}    
    }

    $sql = "DELETE FROM laptop WHERE id_no = $ID";
    if(mysqli_query($conn,$sql)){
        alert('success','Yep!','Successfully deleted');
          echo "<script> window.history.replaceState( null, null, window.location.href);window.location.reload(true);</script>";
    // }
      }  else{
        alert('error','Failed!',',failed to delete');
    }
}
}
function deleteOrder(){
    $conn = $GLOBALS['connection'];
    $ID = (int)$_POST['id'];
    $sql = "DELETE FROM orders WHERE id = $ID";
    if(mysqli_query($conn,$sql)){
        alert('success','Yep!','Successfully deleted');
              echo "<script> window.history.replaceState( null, null, window.location.href);window.location.reload(true);</script>";

    }
    else{
        alert('error','Failed!',',failed to delete');
    }
}

function alert($type,$main,$sec){
    echo '
        <div class="container">
            <div class="alert alert-'.$type.' alert-dismissible fade show" role="alert">
                <strong>'.$main.'</strong> '. $sec .'
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    ';
}

?>