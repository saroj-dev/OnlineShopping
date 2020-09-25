<?php

if(isset($_POST['add_product'])){
    echo "
        <script>
            document.querySelector('body').onload = function() {
                window.scroll({
                    top: document.querySelector('.admin__popupContainer').offsetTop,
                    left: 0,
                    behavior: 'smooth'
                  });
            }
        </script>
        ";
    popup('Add','create_product','','','','','','','');
}

if(isset($_POST['save'])){
    insertData();
}

if(isset($_POST['edit_product'])){
    $getID = (int)$_POST['id'];
    $sql_query = "SELECT * FROM laptop WHERE id_no = $getID";
    $sql_queryResult = mysqli_query($connection,$sql_query);
    $productD = mysqli_fetch_assoc($sql_queryResult);
    $ImagesArrary = explode(',',$productD['laptopImages']);
    $printImages = '';
    foreach ($ImagesArrary as $index => $name){
        $printImages .="
                <div class=\"custom-file-container__image-multi-preview\" data-upload-token=\"2ptms4gpij7iwe51o5b63\" style=\"background:url('../img/$name'); \">
                    <span class=\"custom-file-container__image-multi-preview__single-image-clear\">
                        <span class=\"custom-file-container__image-multi-preview__single-image-clear__icon\" data-upload-token=\"2ptms4gpij7iwe51o5b63\">×</span>
                    </span>
                </div>
            ";
    }
    popup('Save','update_product',$productD['laptopName'],$printImages,$productD['laptopFeatures'],$productD['laptopPriceOrginal'],$productD['laptopPriceDiscounted'],$productD['keyword'],'<input type="hidden" name="id" value='.$getID.'/>');
    echo "
        <script>
            document.querySelector('body').onload = function() {
                window.scroll({
                    top: document.querySelector('.admin__popupContainer').offsetTop,
                    left: 0,
                    behavior: 'smooth'
                  });
            }
        </script>
        ";
}

if(isset($_POST['create_product'])){
    insertData();
}

if(isset($_POST['update_product'])){
    updateData();
}

if(isset($_POST['delete_product'])){
    deleteData();
}