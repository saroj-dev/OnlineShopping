<?php

function insertData(){
    echo '<script>alert("hello");</script>';
    $conn = $GLOBALS['connection'];
    $productName = mysqli_real_escape_string($conn,trim($_POST['title']));
    $productFrontImage = mysqli_real_escape_string($conn,trim($_POST['title']));
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
        $images .= $imageFullName . ',';
        array_push($fullNameImages,$imageFullName);
        $imageTmpName = $productImage['tmp_name'][$key];
        if(move_uploaded_file($imageTmpName, $targetDir.$imageFullName)){ 
            alert('success','Congrats!','File moved successfully');
        }
        else{ 
            alert('error','NO!','Uploading image failed');
        }        
    }

    $sql = "INSERT INTO laptop (laptopName,laptopImages,laptopFrontImages,laptopFeatures,laptopPriceOrginal,laptopPriceDiscounted,keyword) VALUES('$productName','$images','$fullNameImages[0]','$productFeatures','$productOrginalPrice','$productDiscountPrice','$productKeywords')";

    if(mysqli_query($conn,$sql)){
        alert('success','Yep!','Successfully inserted');
    }
    else{
        alert('error','Failed!',',failed to insert');
    }
}


function updateData(){
    echo '<script>alert("update");</script>';
    $conn = $GLOBALS['connection'];
    $itemID = (int)$_POST['id'];
    $productName = mysqli_real_escape_string($conn,trim($_POST['title']));
    $productFrontImage = mysqli_real_escape_string($conn,trim($_POST['title']));
    $productFeatures = mysqli_real_escape_string($conn,trim($_POST['features']));
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
            $imageName = $productImage['name'][$key];
            $imageUniqueName = uniqid('',true);
            $imageFullName = $imageUniqueName.$imageName;
            $images .= $imageFullName . ',';
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

    $sql = "UPDATE laptop SET laptopName='$productName',laptopImages='$images',laptopFrontImages='$fullNameImages[0]',laptopFeatures='$productFeatures',laptopPriceOrginal='$productOrginalPrice',laptopPriceDiscounted='$productDiscountPrice',keyword='$productKeywords' WHERE id_no='$itemID'";

    if(mysqli_query($conn,$sql)){
        alert('success','Yep!','Successfully updated');
    }
    else{
        alert('error','Failed!',',failed to update');
    }
}


function deleteData(){
    $conn = $GLOBALS['connection'];
    $ID = (int)$_POST['id'];
    $sql = "DELETE FROM laptop WHERE id_no = $ID";
    if(mysqli_query($conn,$sql)){
        alert('success','Yep!','Successfully deleted');
    }
    else{
        alert('error','Failed!',',failed to delete');
    }
}

function deleteOrder(){
    $conn = $GLOBALS['connection'];
    $ID = (int)$_POST['id'];
    $sql = "DELETE FROM orders WHERE id = $ID";
    if(mysqli_query($conn,$sql)){
        alert('success','Yep!','Successfully deleted');
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