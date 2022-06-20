<?php
      // Connecting the database
      include_once "connection.php";
      $msg = $_POST['text'];
      $room = $_POST['room'];
      $ip = $_POST['ip'];

    //   Preparing the sql query
    $sql = "INSERT INTO `msg` (`mes`, `roomname`, `ip`, `created_at`) VALUES ('$msg', '$room', '$ip', current_timestamp()); ";

    // Executing the sql query
    mysqli_query($con,$sql);
    mysqli_close($con);
?>