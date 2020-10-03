<?php 

if(isset($_SESSION['email'])){
 

    if(isset($_SESSION['userName'])){
 

        if($_SESSION['userName'] == "Admin"){  
 

        if($_SESSION['email'] == "proudnepal.it@gmail.com"){   
    }
    else{            echo "<script> window.location.href = '../index.php'</script> ";

    }    
 } else{            echo "<script> window.location.href = '../index.php'</script> ";

    }
  }  else{            echo "<script> window.location.href = '../index.php'</script> ";

    }
 } else{            echo "<script> window.location.href = '../index.php'</script> ";

    }

?>

<?php 

function order($id,$name,$image,$quantity,$location,$phoneNumber,$gmailID){
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

            <div class=\"col-lg-4 col-md-7 col-12 py-2 my-auto\">
                <div class=\"row\">
                    <div class=\"col-12\">
                        <strong>Address: </strong>
                        $location
                    </div>
                    <div class=\"col-12\">
                        <strong>Phone no.: </strong>
                        $phoneNumber
                    </div>
                    <div class=\"col-12\">
                        <strong>Email id: </strong>
                        $gmailID
                    </div>
                </div>
            </div>

            <div class=\"col-lg-2 col-md-4 col-6 py-2 my-auto\">
                <strong>Quantity:</strong> $quantity
            </div>

            <div class=\"col-lg-1 col-md-1 col-6 py-2 d-flex justify-content-center align-items-center\">
                <button class=\"btn btn-danger btn-sm\" type=\"submit\" name=\"delete_order\" data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"Delete\">
                    <span class=\"material-icons\">delete_forever</span>
                </button>
            </div>
        </div>
    </form>
    ";
}
