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
          <a href="#Myorder" >
              <i style="color:#e8e8e8; position:relative;"class="fas fa-shopping-cart"><?php 
                include "connection.php";
                // creating a sql query
                if(isset($_SESSION['email'])){
                    $select = "SELECT cart FROM `userinfo` WHERE emailAddress='{$_SESSION['email']}'";
                    $result = $connection->query($select);
                    $count = 0;
                    if($result->num_rows > 0){
                    while ($row = $result->fetch_assoc()){
                        // checking the number of the rows in the database
                        if(!$row  = 0){
                            $count++;
                        }
                    }
                    if($count > 0 ){
                    echo "<div style='position:absolute;font-size:12px; right:-10px; bottom:-10px;height:20px;width:20px; text-align:center;line-height:20px;background:#f5720f; border-radius:50%' > $count  </div>";
                }
            }}
                    
                
              ?></i>
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

                  <a href="#Laptop" class="cat nav_ko">
                      <li>
                          <i style="color:#e8e8e8;"class="fas fa-laptop"></i>    Laptop
                      </li>
                    </a>
                 
                    <a href="#Mobile" class="cat nav_ko">
                      <li>
                          <i style="color:#e8e8e8;"class="fas fa-mobile"></i>
                          Mobile
                      </li>
                    </a>

             
                    <a href="#Myorder" class="nav_ko">
                      <li><i style="color:#e8e8e8;"class="fas fa-shopping-cart"></i>
                          My Orders
                      </li>
                  </a>

                  <a href="#Profile" class="nav_ko">
                      <li>
                          <i style="color:#e8e8e8;"class="fas fa-user-circle"></i>
                          Profile

                      </li>
                    </a>
        </ul>
    </div>