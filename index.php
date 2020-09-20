<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="shopping_site/css/index.css">
    <title>Document</title>
</head>
    <body>
        <!-- this is the starting of the project  -->
    <div class="main_container">

        <!-- Nav bar -->
        <div class="va">
            <div class="nav">
          <div class="open">
              <!-- svg -->
            <svg  id="svg_icon_bar "aria-hidden="true" focusable="false" data-prefix="fas"   viewBox="0 0 448 512">
                <path  d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z">
                </path>
            </svg>
              <!-- svg -->
          </div>
         <!-- right slide  -->
        <div class="rightnav">
            <div class="myOrder">
                <a href="#Myorder">
                    <i class="fas fa-shopping-cart"></i>
                </a>
            </div>
            <div class="search">
                <div class="search__con">
                <input type="text" name="search" id="search_id" autocomplete="off">
                <i class="fas fa-search"></i>
            </div>
            </div>
            <div class="user_account">
                <a href="#Profile">
                    <i class="fas fa-user-circle"></i>
                </a>
            </div>
        </div>
    </div>
         <!-- right slide  -->
          <div class="side_slide_nav">

              <ul>
                    <div class="shop">
                        <h3>
                            shop by category &nbsp; &nbsp; &nbsp;  &#8620;
                        </h3>
                    </div>

                        <a href="#Laptop" class="cat nav_ko">
                            <li>
                                <i class="fas fa-laptop"></i>    Laptop
                            </li>
                          </a>
                       
                          <a href="#Mobile" class="cat nav_ko">
                            <li>
                                <i class="fas fa-mobile"></i>
                                Mobile
                            </li>
                          </a>

                   
                          <a href="#Myorder" class="nav_ko">
                            <li><i class="fas fa-shopping-cart"></i>
                                My Orders
                            </li>
                        </a>

                        <a href="#Profile" class="nav_ko">
                            <li>
                                <i class="fas fa-user-circle"></i>
                                Profile

                            </li>
                          </a>
              </ul>
          </div>
        </div>
    
            <!-- main content -->
        <div class="main">
         

<!-- code here the main one -->

<section class="sectio_one_image_slider">


    <div class="slideshow-container">
        <div class="slideshow-inner">
          <div class="mySlides fade">
        
            <img  src='shopping_site/img/laptop.png' style='width: 100%;' alt="sally lightfoot crab"/>
            <div class="text">Exclusive, offer</div>
          </div>
        
          <div class="mySlides fade">
        
            <img  src='shopping_site/img/mobile.png' style='width: 100%;' alt="fighting nazca boobies"/>
            <div class="text">Place the order</div>
          </div>
        
          <div class="mySlides fade">
        
            <img  src='shopping_site/img/mobile1.png' style='width: 100%;' alt="otovalo waterfall"/>
            <div class="text">get the trend in your hand</div>
          </div>
        
          <div class="mySlides fade">
        
            <img  src='shopping_site/img/mobile3.png' style='width: 100%;' alt="pelican"/>
            <div class="text">Make an amazing deal with us.</div>
          </div>
          
          </div>
          <div class="mySlides fade">
        
            <img  src='shopping_site/img/pexels-veeterzy-303383.png' style='width: 100%;' alt="pelican"/>
            <div class="text">buy once , remember forever</div>
          </div>
          
          </div>
        
          <div  class="this_is_dot"style='text-align: center;'>
            <span class="dot" onclick='currentSlide(1)'></span>
            <span class="dot" onclick='currentSlide(2)'></span>
            <span class="dot" onclick='currentSlide(3)'></span>
            <span class="dot" onclick='currentSlide(4)'></span>
            <span class="dot" onclick='currentSlide(5)'></span>
  
          </div>
        
          <a class="prev" onclick='plusSlides(-1)' style="display: none;"></a>
          <a class="next" onclick='plusSlides(1)'   style="display: none;"></a>
        </section>







        <!-- anothe section product one -->
        
<section class="product_laptop">
 
    <!--this is for the divl company.-->
    <div class="lpt1">
        
          <div class="title">
                Dell Laptops :
            </div>
        <div class="laptopContainer">
        <?php 
            include "shopping_site/laptop.php";
            $redirect = '<button class="div1"><a href="shopping_site/product/allproducts.php?group=dell&Name=laptop">See more </a>  </button>';
            printLaptop("Asus" , "shopping_site/img/");
        ?>
        
    </div>
    <!--this is for end of the dell company.-->
    <button>
        <?php echo $redirect;?>
    </button>
</div>



    </section>
        </div>
         










<!-- code here the main one -->
            <!-- left gap -->
 
            <!-- fotter -->
        <footer>
            copyright @ 2020
        </footer>
    </div>

 
</body>
<script src="shopping_site/js/index.js"></script>
<script src="shopping_site/js/font-awsome.js"></script>

<!-- this is for the script to load the php-->

<script>
    var  search_query = document.querySelector("#search_id");
    var  search_button = document.querySelector(".fa-search");

search_query.addEventListener("keypress", function(e){
    if(e.key == 'Enter'){
        window.location.href = "shopping_site/search.php?search_query="+search_query.value;
        console.log(window.location.href)
    }
})


    search_button.addEventListener("click",function() {
        console.log(window.location.href)
    })

</script>
 


</html>