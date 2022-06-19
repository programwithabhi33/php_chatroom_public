<?php

// Get the post parameters from $_POST 
$room_name = $_POST['roomname'];

// Checking the post parameter length
if(strlen($room_name)>20 or strlen($room_name)<2){
    $message = "Please choose a rooomname between 2 to 20 characters.";

    // Start the session for setting session variable 
    session_start();
    $_SESSION['main'] = true;
    $_SESSION['message'] = $message;
    $_SESSION['type'] = "warning";
    header("Location:  https://ec8f-2402-8100-22d3-7f1f-24e7-95cd-381d-97cc.in.ngrok.io/php_chatroom/");

}

// Checking the $room_name is alphanumeric 
else if(!ctype_alnum($room_name)){

    $message = "Please choose a rooomname Alphanumeric.";

    // Start the session for setting session variable 
    session_start();
    $_SESSION['main'] = true;
    $_SESSION['message'] = $message;
    $_SESSION['type'] = "warning";
    header("Location:  https://ec8f-2402-8100-22d3-7f1f-24e7-95cd-381d-97cc.in.ngrok.io/php_chatroom/");

}

else{
    // Connecting the database
    include_once "connection.php";
    echo "Lets chat now";
}

// Preparing the sql statement
$sql = "SELECT * FROM `rooms` WHERE roomname = '$room_name'";

// Executing the query
$result = mysqli_query($con,$sql);

// Checking the query execution 
if($result){

    // Checking the room already exist or not
    if(mysqli_num_rows($result)>0){
        $message = "This roomname is already taken.Please choose another roomname";

        // Start the session for setting session variable 
        session_start();
        $_SESSION['main'] = true;
        $_SESSION['message'] = $message;
        $_SESSION['type'] = "warning";
        header("Location:  https://ec8f-2402-8100-22d3-7f1f-24e7-95cd-381d-97cc.in.ngrok.io/php_chatroom/");

    }


    else{
        // Preparing the sql query 
        $sql = "INSERT INTO `rooms` (`roomname`, `created_at`) VALUES ('$room_name', current_timestamp());";

        if(mysqli_query($con,$sql)){
            $message = "Your room is created.Lets chat!!!";
            // Start the session for setting session variable 
            session_start();
            $_SESSION['main'] = true;
            $_SESSION['message'] = $message;
            $_SESSION['type'] = "success";
            header("Location:  https://ec8f-2402-8100-22d3-7f1f-24e7-95cd-381d-97cc.in.ngrok.io/php_chatroom/rooms.php?roomname=$room_name");
        }
}
}
else{
    echo "Error: ".mysqli_error($con);
}



?>