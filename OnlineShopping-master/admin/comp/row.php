<?php 

    function row($id,$name,$image,$features,$price){
        echo "
        <form action=\"\" method=\"POST\">
            <input type=\"hidden\" name=\"id\" value=\"$id\" />
            <div class=\"row py-4 my-3\">
                <div class=\"col-lg-2 col-md-6 col-12 py-2 my-auto\">
                    <img src=\"./../img/$image\" class=\"w-100\" alt=\"Error loading image\" />
                </div>
                <div class=\"col-lg-3 col-md-6 col-12 py-2 my-auto\">
                    $name
                </div>
                <div class=\"col-lg-3 col-md-5 col-12 py-2 my-auto\">
                    $features
                </div>
                <div class=\"col-lg-2 col-md-3 col-6 py-2 my-auto\">
                    Rs.$price
                </div>
                <div class=\"col-lg-2 col-md-4 col-6 py-2 d-flex justify-content-around align-items-center\">
                    <button class=\"btn btn-success btn-sm\" type=\"submit\" name=\"edit_product\" data-toggle=\"tooltip\" data-placement=\"left\" title=\"Edit\">
                        <span class=\"material-icons\">create</span>
                    </button>
                    <button class=\"btn btn-outline-danger btn-sm\" type=\"submit\" name=\"delete_product\" data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"Delete\">
                        <span class=\"material-icons\">delete_forever</span>
                    </button>
                </div>
            </div>
        </form>
        ";
    }

