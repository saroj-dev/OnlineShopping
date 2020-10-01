<?php 
include('connection.php'); 
include('linl.php'); 
$sql = " SELECT * FROM user_comment WHERE status ='0' ";
$result = $con->query($sql) or die($con->_error) ;


if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
       $id = $row['id'];
       $name = $row['name'];
       $comment = $row['comment'];
       ?>
       <div class="data">
            <div class="id border ">  <?php echo $id ; ?> </div>
            <div class="name border "> <?php echo $name ; ?> </div>
            <div class="comment border "> <?php echo $comment ; ?> </div>
            <form  method="post">
            <input type="submit" name="aprove" value="aprove " class="aprove" > 
             <input type="hidden" name="id" value = <?php echo   $id ?>>
            <input type="submit" name="delete" value="delete"> 
            </form>
        </div>
       <?php

  }
} else {
  echo "0 results";
}
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
        font-family: 'Poppins', sans-serif;

        }
        .data{
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap : wrap;
            text-align: center;
            width: 70%;
        }
        .border{
            border: 1px solid #444444;
            flex-basis: 200px;
        }
    </style>
</head>
<body>
        
</body>
</html>
<?php   
if(isset($_POST['delete'])){
$del = " DELETE FROM user_comment WHERE id =  {$_POST['id']}";
   if(mysqli_query($con,$del)){
    //    echo ' <meta http-equiv="refresh" content=" 0;URL=? deleted "/> '; 
     echo ' <script> alert(" Deleted "); </script> ';
   }else{
       echo "not";
   }
}
//update status value to 1;
if(isset($_POST['aprove'])){
    $up = " UPDATE user_comment SET status ='1' WHERE id= {$_POST['id']} ";
    if(mysqli_query($con,$up)){
        echo ' <script> 
        let aprove = document.querrySelector(".aprove");
        aprove.value = "Aproved";
        </script> ';
    }else{
        echo "not";
    }
}

?>
<script>
      
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>