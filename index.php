<?php
    session_start();
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/swipe.css">

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



                <!--this is for the divl company.-->
                <div class="lpt1">

                    <div class="title">
                        Dell Laptops :
                    </div>
                    <div class="swiper-container swiper">
                        <div class="swiper-wrapper">

                            <?php 
                    include "laptop.php";
                    $redirect = '<a class="a" href="product/allproducts.php?group=dell&Name=laptop"><button class="div1_button_see_more">See more  </button></a> ';
                    printLaptop("dell" , "img/");
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
                <div class="lpt1">

                    <div class="title">
                        Asus :
                    </div>
                    <div class="swiper-container swiper">
                        <div class="swiper-wrapper">

                            <?php 
                
                $redirect = '<a class="a" href="product/allproducts.php?group=asus&Name=laptop"><button class="div1_button_see_more">See more  </button></a> ';
                printLaptop("asus" , "img/");
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
                    <!--this is for end of the dell company.-->


                </div>
                <div class="lpt1">

                    <div class="title">
                        Apple :
                    </div>
                    <div class="swiper-container swiper">
                        <div class="swiper-wrapper">

                            <?php 
                    
                    $redirect = '<a class="a" href="product/allproducts.php?group=Apple&Name=laptop"><button class="div1_button_see_more">See more  </button></a> ';
                    printLaptop("apple" , "img/");
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
                    <!--this is for end of the dell company.-->


                </div>
                <!--this is for the divl company.-->
                <div class="lpt1">

                    <div class="title">
                        Lenovo :
                    </div>
                    <div class="swiper-container swiper">
                        <div class="swiper-wrapper">

                            <?php 
                    
                    $redirect = '<a class="a" href="product/allproducts.php?group=lenovo&Name=laptop"><button class="div1_button_see_more">See more  </button></a> ';
                    printLaptop("lenovo" , "img/");
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
                <div class="lpt1">

                    <div class="title">
                        Acer :
                    </div>
                    <div class="swiper-container swiper">
                        <div class="swiper-wrapper">

                            <?php 
                
                $redirect = '<a class="a" href="product/allproducts.php?group=acer&Name=laptop"><button class="div1_button_see_more">See more  </button></a> ';
                printLaptop("acer" , "img/");
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
                    <!--this is for end of the dell company.-->


                </div>
                <div class="lpt1">

                    <div class="title">
                        HP Laptops :
                    </div>
                    <div class="swiper-container swiper">
                        <div class="swiper-wrapper">

                            <?php 
                    
                    $redirect = '<a class="a" href="product/allproducts.php?group=hp&Name=laptop"><button class="div1_button_see_more">See more  </button></a> ';
                    printLaptop("hp" , "img/");
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
                    <!--this is for end of the dell company.-->


                </div>
                <div class="lpt1">

                    <div class="title">
                        Samsung :
                    </div>
                    <div class="swiper-container swiper">
                        <div class="swiper-wrapper">

                            <?php 
                    
                    $redirect = '<a class="a" href="product/allproducts.php?group=samsung&Name=laptop"><button class="div1_button_see_more">See more  </button></a> ';
                    printLaptop("samsung" , "img/");
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
                <div class="lpt1">

                    <div class="title">
                        Razer Laptops :
                    </div>
                    <div class="swiper-container swiper">
                        <div class="swiper-wrapper">

                            <?php 
                
                $redirect = '<a class="a" href="product/allproducts.php?group=razer&Name=laptop"><button class="div1_button_see_more">See more  </button></a> ';
                printLaptop("razer" , "img/");
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
                    <!--this is for end of the dell company.-->


                </div>
                <div class="lpt1">

                    <div class="title">
                        Microsoft :
                    </div>
                    <div class="swiper-container swiper">
                        <div class="swiper-wrapper">

                            <?php 
                    
                    $redirect = '<a class="a" href="product/allproducts.php?group=microsoft&Name=laptop"><button class="div1_button_see_more">See more  </button></a> ';
                    printLaptop("microsoft" , "img/");
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
                    <!--this is for end of the dell company.---->
                </div>


                <div class="con_for_the_lap">
                    <div class="mainHeading">
                        Need a computer_parts ??
                    </div>
                    <h3>
                        This is a small collection of the Mobiles based on their company.
                        Grouped according to their models. Find the best Mobile in the following groups.
                    </h3>
                    <p><span>*</span> Be the best buy the best.</p>
                    <p><span>*</span> Get the best technology in your hand. </p>
                    <p><span>*</span> Get the Mobile that meets your needs . </p>
                    <div class="swiper-container swiper1">
                        <div class="swiper-wrapper1">
                            <div class="swiper-slide1">
                                <img src="img/mobile-buy" alt="">
                            </div>
                            <div class="swiper-slide1">
                                <img src="img/mobile-best" alt="">
                            </div>
                            <div class="swiper-slide1">
                                <img src="img/mobile-buget" alt="">
                            </div>
                        </div>
                    </div>

                </div>




                <div class="lpt1">
                    <div class="title">
                        RealMe :

                    </div>
                    <div class="swiper-container swiper">
                        <div class="swiper-wrapper">

                            <?php 
                
                $redirect = '<a class="a" href="product/allproducts.php?group=Realme&Name=laptop"><button class="div1_button_see_more">See more  </button></a> ';
                printLaptop("Real" , "img/");
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
                    <!--this is for end of the dell company.-->
                </div>

                <div class="lpt1">

                    <div class="title">
                        One+ :
                    </div>
                    <div class="swiper-container swiper">
                        <div class="swiper-wrapper">

                            <?php 
                
                $redirect = '<a class="a" href="product/allproducts.php?group=one+&Name=laptop"><button class="div1_button_see_more">See more  </button></a> ';
                printLaptop("one" , "img/");
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
                    <!--this is for end of the dell company.-->
                </div>
                <div class="lpt1">

                    <div class="title">
                        Huawei :
                    </div>
                    <div class="swiper-container swiper">
                        <div class="swiper-wrapper">

                            <?php 
                
                $redirect = '<a class="a" href="product/allproducts.php?group=huawei&Name=laptop"><button class="div1_button_see_more">See more  </button></a> ';
                printLaptop("huawei" , "img/");
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
                    <!--this is for end of the dell company.-->
                </div>
                <div class="lpt1">

                    <div class="title">
                        Redmi :
                    </div>
                    <div class="swiper-container swiper">
                        <div class="swiper-wrapper">

                            <?php 
                
                $redirect = '<a class="a" href="product/allproducts.php?group=Redmi&Name=laptop"><button class="div1_button_see_more">See more  </button></a> ';
                printLaptop("redmi" , "img/");
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
                    <!--this is for end of the dell company.-->
                </div>






                <div class="lpt1">

                    <div class="title">
                        Oppo :
                    </div>
                    <div class="swiper-container swiper">
                        <div class="swiper-wrapper">

                            <?php 
                    
                    $redirect = '<a class="a" href="product/allproducts.php?group=Oppo Mobile&Name=laptop"><button class="div1_button_see_more">See more  </button></a> ';
                    printLaptop("oppo" , "img/");
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
                    <!--this is for end of the dell company.-->
                </div>
                <div class="lpt1">

                    <div class="title">
                        Vivo :
                    </div>
                    <div class="swiper-container swiper">
                        <div class="swiper-wrapper">

                            <?php 
                
                $redirect = '<a class="a" href="product/allproducts.php?group=Vivo Mobile&Name=laptop"><button class="div1_button_see_more">See more  </button></a> ';
                printLaptop("vivo" , "img/");
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
                    <!--this is for end of the dell company.-->


                </div>
                <div class="lpt1">

                    <div class="title">
                        Google :
                    </div>
                    <div class="swiper-container swiper">
                        <div class="swiper-wrapper">

                            <?php 
                    
                    $redirect = '<a class="a" href="product/allproducts.php?group=google&Name=laptop"><button class="div1_button_see_more">See more  </button></a> ';
                    printLaptop("google" , "img/");
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
                    <!--this is for end of the dell company.-->


                </div>

                <div class="lpt1">

                    <div class="title">
                        Gaming:
                    </div>
                    <div class="swiper-container swiper">
                        <div class="swiper-wrapper">

                            <?php 
                    
                    $redirect = '<a class="a" href="product/allproducts.php?group=gaming&Name=laptop"><button class="div1_button_see_more">See more  </button></a> ';
                    printLaptop("gaming" , "img/");
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

                <div class="con_for_the_lap">
                    <div class="mainHeading">
                        Need a Mobile ??
                    </div>
                    <h3>
                        This is a small collection of the Computer parts. Find the best computer parts that feets your
                        needs.
                    </h3>
                    <p><span>*</span> Be the best buy the best part you need.</p>
                    <p><span>*</span> Get the part that you want. </p>
                    <p><span>*</span> Get the computer part that meets your needs . </p>
                    <div class="swiper-container swiper1">
                        <div class="swiper-wrapper1">
                            <div class="swiper-slide1">
                                <img src="img/parts-buy" alt="">
                            </div>
                            <div class="swiper-slide1">
                                <img src="img/parts-best" alt="">
                            </div>
                            <div class="swiper-slide1">
                                <img src="img/parts-buget" alt="">
                            </div>
                        </div>
                    </div>

                </div>



                <div class="lpt1">

                    <div class="title">
                        Hard Disk :
                    </div>
                    <div class="swiper-container swiper">
                        <div class="swiper-wrapper">

                            <?php 
                
                $redirect = '<a class="a" href="product/allproducts.php?group=hard disk&Name=laptop"><button class="div1_button_see_more">See more  </button></a> ';
                printLaptop("hdd" , "img/");
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
                    <!--this is for end of the dell company.-->


                </div>
                <div class="lpt1">

                    <div class="title">
                        RAM :
                    </div>
                    <div class="swiper-container swiper">
                        <div class="swiper-wrapper">

                            <?php 
                
                $redirect = '<a class="a" href="product/allproducts.php?group=Ram&Name=laptop"><button class="div1_button_see_more">See more  </button></a> ';
                printLaptop("ram" , "img/");
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
                    <!--this is for end of the dell company.-->


                </div>
                <div class="lpt1">

                    <div class="title">
                        Solid State Drive :
                    </div>
                    <div class="swiper-container swiper">
                        <div class="swiper-wrapper">

                            <?php 
                
                $redirect = '<a class="a" href="product/allproducts.php?group=Solid State Drive&Name=laptop"><button class="div1_button_see_more">See more  </button></a> ';
                printLaptop("sdd" , "img/");
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
                    <!--this is for end of the dell company.-->


                </div>
                <div class="lpt1">

                    <div class="title">
                        M.2 :
                    </div>
                    <div class="swiper-container swiper">
                        <div class="swiper-wrapper">

                            <?php 
                
                $redirect = '<a class="a" href="product/allproducts.php?group=M.2&Name=laptop"><button class="div1_button_see_more">See more  </button></a> ';
                printLaptop("m2" , "img/");
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
                    <!--this is for end of the dell company.-->


                </div>
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

<!-- this is for the script to load the php-->

<script>
    var search_query = document.querySelector("#search_id");
    var search_button = document.querySelector(".fa-search");

    search_query.addEventListener("keypress", function (e) {
        if (e.key == 'Enter') {
            window.location.href = "search.php?search_query=" + search_query.value;

        }
    })


    search_button.addEventListener("click", function () {
        window.location.href = "?search_query=" + search_query.value;
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
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper('.swiper', {
          
        grabCursor: true,
        slidesPerView: 'auto',
         
        pagination: {
            el: '.swiper-pagination',
        },
    });


    var swiper = new Swiper('.swiper1', {
        disableOnInteraction: true,
        autoplay: {
            delay: 3000,
        },
    });
</script>
</html>