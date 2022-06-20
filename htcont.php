<?php

    $room = $_POST['room'];
     // Connecting the database
     include 'connection.php';
    
    //  Preparing the sql statement
     $sql = "SELECT mes,created_at,ip FROM msg WHERE roomname = '$room'";
 
     $res = "";

    //  Executing the sql query
    $result = mysqli_query($con,$sql);
    if($result){
        // echo "Result is successful";
    }

    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            $res = $res. '<div class = "border border-2 border-primary rounded  my-3 p-3">';
            $res = $res. $row['ip'];
            $res = $res. 'says:- <p class="fs-3"> <b>'.$row['mes'];
            $res = $res. '</b></p> <span class = "time-right">'.$row['created_at']. '</span></div>'; 
        }
    }
    else{
        // echo "Something went wring".mysqli_error($con);
        // echo $res;
    }
    echo $res;




?>