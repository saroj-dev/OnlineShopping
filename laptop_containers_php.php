<?php
    include "laptop.php";
    if(isset($_GET['type'])){
        print_container($_GET['type']);
    }
    function print_container($type){
        ?>
        <div class="lpt1">
        <div class="title">
            <?php  echo $type; ?>
        </div>
        <div class="swiper-container swiper">
            <div class="swiper-wrapper">
                <?php 
        $redirect = '<a class="a" href="product/allproducts.php?group='.$type.'&Name=laptop"><button class="div1_button_see_more">See more  </button></a> ';
        printLaptop($type , "img/");
        ?>
                <div class="swiper-slide">
                    <h1 class="heading" style="text-align:center; margin-top:100px">
                        See all the <br>
                        Related items.
                    </h1>
                    <?php echo  $redirect?>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
 
    <?php
    }
    ?>