
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your comment</title>
    <style>
    body{
        font-family: 'Poppins', sans-serif;
    }
    h1{
        text-align: center;
    }
    div{
        text-align: center;
    }
    input{
        outline: 0;
        padding: 10px ;
        font-size: 20px;
    }
    .text-area{
        width: 50%;
    }
    .container{
        width: 100%;
        height:auto;
        text-align: left;
        display:flex;

    }
   
    </style>
</head>
<body>
    <h1>Leave the comment .</h1>
    <div>

        <form action="" method="POST" >  
            <label> Name : </label>
            <input type="text" name ="name" placeholder="Enter your name" required>
            &nbsp; &nbsp;&nbsp;  
            <label> Comment </label>
            <input type="text" class="text-area" name ="message" placeholder="leave your message " required> <br><br><br> 
            <input type="submit" name="post" value="Submit">
        </form>
    </div>

   
</body>
</html>

<?php
include ('connection.php');
include ('linl.php');

if(isset($_POST['post'])){
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

        $select  = " SELECT * FROM user_comment WHERE status = '1' ";
        $result = mysqli_query($con,$select);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $name = $row['name'];
                $comment = $row['comment'];
                ?>
                 <div class="container">
                    <p> <?php echo $name ;?> : </p>
                    <span> <?php echo $comment ;?>  </span>
                </div>
                <?php
            } 
 
        }
?>
<script>
      
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>