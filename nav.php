<?php session_start(); ?>
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
          <a class="myorder_counter" href="#Myorder" >
              <i style="color:#e8e8e8; position:relative;"class="fas fa-shopping-cart"> 
              <?php 
               include "nav_counter.php"; ?>
                </i>
          </a>
      </div>
      <div class="search">
          <div class="search__con">
          <input type="text" name="search" id="search_id" autocomplete="off">
          <i style="color:#e8e8e8;"class="fas fa-search"></i>
      </div>
      </div>
      <div class="user_account">
          <a href="#Profile">
              <i style="color:#e8e8e8;"class="fas fa-user-circle"></i>
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
                    
                  <a href="search.php?search_query=laptop" class="cat nav_ko">
                      <li>
                          <i style="color:#e8e8e8;"class="fas fa-laptop"></i>    Laptop
                      </li>
                    </a>
                    <a href="search.php?search_query=mobile" class="cat nav_ko">
                      <li>
                          <i style="color:#e8e8e8;"class="fas fa-mobile"></i>
                          Mobile
                      </li>
                    </a>
                    
                  <a href="search.php?search_query=tab ipad" class="cat nav_ko">
                      <li>
                          <i style="color:#e8e8e8;"class="fas fa-laptop"></i>    Tabs.
                      </li>
                    </a>
                    <a href="search.php?search_query=Computer parts" class="cat nav_ko">
                      <li>
                          <i style="color:#e8e8e8;"class="fas fa-mobile"></i>
                          Computer Parts
                      </li>
                    </a>
                    <a href="index.php" class="nav_ko">
                      <li>
                          <i style="color:#e8e8e8;"class="fas fa-user-circle"></i>
                          Home 
                      </li>
                    </a><?php
                if(isset($_SESSION['email'])){
                ?>
                    <a href="show_cart.php" class="nav_ko">
                      <li><i style="color:#e8e8e8;"class="fas fa-shopping-cart"></i>
                          Cart
                      </li>
                  </a>
                <?php }?>
                  <a href="user_profile.php" class="nav_ko">
                      <li>
                          <i style="color:#e8e8e8;"class="fas fa-user-circle"></i>
                          Profile
                      </li>
                    </a>
                    <?php
                if(!isset($_SESSION['email'])){
                ?>
                    <a href="reg/login.php" class="nav_ko">
                      <li>
                          <i style="color:#e8e8e8;"class="fas fa-user-circle"></i>
                          login 
                      </li>
                    </a>
                    <?php } ?>
        </ul>
    </div>
    <script>
        var loc = window.location.href;
        if(loc.search("product/") > 0){
           let a =  document.querySelectorAll('ul  a');
           a.forEach(function(e){
               let hrf = e.getAttribute("href");
                console.log("it doesnot contains the # so the new hrf is ");
                newhrf = "../" + hrf;
                e.setAttribute("href",newhrf);
           })
        } 
    </script>