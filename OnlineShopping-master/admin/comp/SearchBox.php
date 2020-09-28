<?php 
 function searchForm(){
     echo "
     <div class=\"input-group\">
     <input type=\"text\" class=\"form-control\" placeholder=\"Search this blog\">
     <div class=\"input-group-append\">
       <button class=\"btn btn-secondary\" type=\"button\">
         <i class=\"fa fa-search\"></i>
       </button>
     </div>
   </div>
     ";
 }

 function anotherSearchForm(){
    echo '
        <div class="container">
            
            <div class="input-group mt-3">
                <div class="input-group-prepend">
                    <span class="input-group-text material-icons">search</span>
                </div>
                <input class="form-control" id="anythingSearch" type="text" placeholder="Search your product" aria-label="Search" aria-describedby="basic-addon1" />
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="crossorigin="anonymous"></script>
        <script src="../js/SearchAdmin.js"></script>
     ';
 }