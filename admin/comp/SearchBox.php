<?php 

 function SearchForm($ID_for_search_input,$placeholder_for_search_field){
    echo "
        <div class=\"input-group mt-3\">
            <div class=\"input-group-prepend\">
                <span class=\"input-group-text material-icons\">search</span>
            </div>
            <input class=\"form-control\" id=\"$ID_for_search_input\" type=\"text\" placeholder=\"$placeholder_for_search_field\" aria-label=\"Search\" aria-describedby=\"basic-addon1\" />
        </div>
        <script src=\"https://code.jquery.com/jquery-3.5.1.min.js\" integrity=\"sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=\"crossorigin=\"anonymous\"></script>
        <script src=\"../js/SearchAdmin.js\"></script>
     ";
 }