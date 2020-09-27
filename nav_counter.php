<?php
include "connection.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
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
                        ?>
                   <div style='position:absolute;font-size:12px; right:-10px; bottom:-10px;height:20px;width:20px; text-align:center;line-height:20px;background:#f5720f; border-radius:50%'>
                     <?php echo $count; ?>
                    </div>
                <?php
                }
            }} 
              ?>