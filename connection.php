<?php

    $severname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "chatroom";

    // Creating the database connection
    $con = mysqli_connect($servername,$username,$password,$dbname);

    // Checking the database connection
    if(!$con){
        die("Failed to connect".mysqli_connect_err());
    }


?>