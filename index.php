<?php
    session_start();
    include "laptop_containers_php.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/swipe.css">
    <style>
   *{
            padding: 0;
            margin: 0;
        }
        .videoBG {
            width: 100%;
        }
    </style>

    <title>Document</title>
</head>

<body>
    <!-- this is the starting of the project  -->
    <div class="main_container">

        <!-- Nav bar -->
        <div class="va">
            <?php
                include "nav.php";
                ?>
        </div>
        <video class="videoBG" autoplay muted loop>
        <source src="videoproject.mp4" type="video/mp4">
        </video>
        <!-- main content -->
        <div class="main">


            <section class="product_laptop">

                <div class="con_for_the_lap">
                    <div class="mainHeading">
                        <h1>
                            Need a laptop ??
                        </h1>
                        <h3>
                            This is a small collection of the laptops based on their company.
                            Grouped according to their models. Find the best laptop in the following groups.
                        </h3><br><br>
                        <p><span>*</span> Be the best buy the best. </p>
                        <p><span>*</span> Get the best technology in your hand. </p>
                        <p><span>*</span> Get the laptop that meets your needs. </p>
                    </div>

                    <div class="swiper-container  swiper1">
                        <div class="swiper-wrapper swiper1_wrapper">
                            <div class="swiper-slide">
                                <img src="img/laptop-buy.jpg" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="img/laptop-best.jpg" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="img/laptop-buget.jpg" alt="">
                            </div>
                        </div>
                    </div>

                </div>
                <?php 
                print_container("Apple");
                ?>

                <?php  
                print_container("Asus");
                ?>

                <?php  
                print_container("dell");
                ?>


                <?php
                print_container("Lenovo");
                ?>

                <?php
                print_container("Acer");
                ?>


                <?php
                print_container("Microsoft");
                ?>

                <div class="con_for_the_lap">
                    <div class="mainHeading">
                        <h1>Need a Mobiles ?? </h1>
                    
                    <h3>This is a small collection of the Mobiles based on their company.Grouped according to their
                        models. Find the best Mobile in the following groups.</h3><br><br>
                    <p><span>*</span> Be the best buy the best.</p>
                    <p><span>*</span> Get the best technology in your hand. </p>
                    <p><span>*</span> Get the Mobile that meets your needs . </p>
                </div>
                    <div class="swiper-container swiper1">
                        <div class="swiper-wrapper swiper1_wrapper">
                            <div class="swiper-slide"><img src="img/mobile-buy.jpg"  alt=""></div>
                            <div class="swiper-slide"><img src="img/mobile-best.jpg" alt=""></div>
                            <div class="swiper-slide"><img src="img/mobile-buget.jpg" alt=""></div>
                        </div>
                    </div>
                </div>

                <?php
                print_container("Redmi");
                ?>

                <?php
                print_container("Oppo");
                ?>

                <?php
                print_container("Gaming Section");
                ?>






                <div class="con_for_the_lap">
                    <div class="mainHeading"><h1> Need Computer parts ?? </h1> 
                    <h3>This is a small collection of the Computer parts. Find the best computer parts that feets
                        yourneeds.</h3>
                        <br><br>
                    <p><span>*</span> Be the best buy the best part you need.</p>
                    <p><span>*</span> Get the part that you want. </p>
                    <p><span>*</span> Get the computer part that meets your needs . </p>
                </div>
                    <div class="swiper-container swiper1">
                        <div class="swiper-wrapper swiper1_wrapper">
                            <div class="swiper-slide"><img src="img/parts-buy.jpg" alt=""></div>
                            <div class="swiper-slide"><img src="img/parts-best.jpg" alt=""></div>
                            <div class="swiper-slide"><img src="img/parts-buget.jpg" alt=""></div>
                        </div>
                    </div>
                </div>


                <?php
                print_container("Hard Disk");
                ?>

                <?php
                print_container("RAM");
                ?>

                <?php
                print_container("Solid State Drive");
                ?>

                <?php
                print_container("M.2");
                ?>


            </section>
        </div>
        <!-- left gap -->

        <!-- fotter -->
        <footer>
            Copy Right @ 2020
        </footer>
    </div>



</body>
<script src="js/index.js"></script>
<script src="https://kit.fontawesome.com/cc8ed28d8b.js" crossorigin="anonymous"></script>
<script src="js/nav.js"></script>
<script src="js/redirect.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


<!-- this is for the script to load the php-->

<script>
    var swiper = new Swiper('.swiper', {

        grabCursor: true,
        slidesPerView: 'auto',

        pagination: {
            el: '.swiper-pagination',
        },
    });


    var swiper1 = new Swiper('.swiper1', {
        autoplay: {
            delay: 3000,
        },
    });




    var search_query = document.querySelector("#search_id");
    var search_button = document.querySelector(".fa-search");

    search_query.addEventListener("keypress", function (e) {
        if (e.key == 'Enter') {
            window.location.href = "search.php?search_query=" + search_query.value;

        }
    })


    search_button.addEventListener("click", function () {
        window.location.href = "search.php?search_query=" + search_query.value;
    })


    var container = document.querySelectorAll(".btm > .heading");
    container.forEach(function name(elm, i) {
        elm.addEventListener("click", function () {
            url = "product/product.php?keyword=" + elm.parentElement.parentElement.children.item(0)
                .getAttribute("data-id");
            window.location.href = url;
        })
    })


    // add to cart


    var addtoCart = document.querySelectorAll(".btn_add_cart");
    addtoCart.forEach(function (elm, i) {
        if (elm.classList.contains('disabled')) {
            elm.style.cursor = "not-allowed";
            elm.style.opacity = "0.5";
        } else {
            elm.addEventListener("click", function () {
                var request = new XMLHttpRequest();
                var cart = elm.parentElement.parentElement.children.item(0).getAttribute("data-id"); <?php
                $_SESSION['previous_location_add_buy'] = ""; ?>
                request.onreadystatechange = function () {
                    if (this.readyState === 4 && this.status === 200) {
                        if (elm.classList.contains("not_logged_in")) {
                            window.location.href = "reg/login.php";
                        } else {
                            elm.innerHTML = "In the cart <i class='fas fa-cart-plus'></i>";
                            elm.style.cursor = "not-allowed";
                            elm.style.opacity = "0.5";
                            elm.style.pointerEvents = "none";
                            var new_req = new XMLHttpRequest();
                            new_req.onreadystatechange = function () {
                                if (this.readyState === 4 && this.status === 200) {
                                    document.querySelector(".myorder_counter > i ").innerHTML =
                                        this.responseText;

                                }
                            };
                            new_req.open("GET", "nav_counter.php", true);
                            new_req.send();
                        }
                    }
                };
                request.open("GET", "send_data.php?addtocart=" + cart + "&from=p", true);
                request.send();
            })
        }
    })

    document.querySelector(".fa-shopping-cart").addEventListener("click", function () {
        window.location.href = "show_cart.php";
    });


    document.querySelector(".fa-user-circle").addEventListener("click", function () {
        window.location.href = "user_profile.php";
    })
</script>

</html>