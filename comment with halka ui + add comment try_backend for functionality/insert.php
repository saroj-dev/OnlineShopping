<?php
include ('link.php');
include ('connection.php');
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $message = $_POST['message'];
    $insert = " INSERT INTO user_comment (name,comment,status) VALUES ('$name','$message','0')" ;
    $con->query($insert);
        if($insert){
             echo ' <script> alert("Message Commited Sucessfully . Wait admin to aprove the message"); </script> ';
        }else{
            echo "nope";
        }

    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment Picker  </title>
    <style>
        body{
            font-family: 'Poppins', sans-serif;
        }
        i{
            font-size: 15px;
        }
        .change_read{
            float: right;
            margin-top: 5px;
            width: 3%;
            cursor: pointer;
        }
        
    </style>
</head>
<body>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary d-block mx-auto mt-5" data-toggle="modal" data-target="#exampleModal">
  Comment Here
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title  w-100 " id="exampleModalLabel">Add The Comment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
    <form method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" readonly required class="form-control costum_readonly" id="exampleInputEmail1  " aria-describedby="emailHelp" name="name" value ="Session name"> 
                <p class="change_read"> <i class="fas fa-edit   " title="Edit name"></i>  </p>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea3">Your Comments</label>
                <textarea class="form-control"name="message" id="reset" required id="exampleFormControlTextarea3" placeholder="Your comment goes here" rows="7"></textarea>
            </div>

            <div class="modal-footer">
                <input type="submit" name="submit" value="Post" class="btn btn-primary">
                <button type="button" class="btn btn-danger"   onclick="myFunction()">Reset</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="myFunction1()" >Close</button>
      </div>
    </form>
        </div>
      </div>
      
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
 <script>
    let change_read = document.querySelector(".change_read");
    let costum_readonly = document.querySelector(".costum_readonly");
    let bool = true;
    change_read.addEventListener("click",function(){
        if(bool==false){
            console.log("false")
            costum_readonly.readOnly = true;
            bool = true;
            }else{
        costum_readonly.removeAttribute('readonly')
        costum_readonly.focus();
        var val = costum_readonly.value;
        costum_readonly.value = '';
        costum_readonly.value = val;
        bool = false
}
    })
        
    
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    let reset = document.querySelector("textarea");
 function myFunction(){
     if(reset.value!=0){

         Swal.fire({
             title: 'Are you sure?',
             text: "You want to clear the message ",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
      }).then((result) => {
          if (result.isConfirmed) {
            let reset = document.querySelector("textarea").value = "";
            
            Swal.fire(
                'cleared!',
                'Your message has been cleared.',
                'success'
                )
            }
        })
    }else{
        Swal.fire({
            icon: 'warning',
            title: 'There is not any message to reset'
          })
    }
}
      function myFunction1(){
        let reset = document.querySelector("textarea").value = "";

      }
 </script>
</body>
</html> 
    
 