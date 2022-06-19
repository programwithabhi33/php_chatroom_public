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
    header("Location:  https://ec8f-2402-8100-22d3-7f1f-24e7-95cd-381d-97cc.in.ngrok.io/php_chatroom/");

}

// Checking the $room_name is alphanumeric 
else if(!ctype_alnum($room_name)){

    $message = "Please choose a rooomname Alphanumeric.";

    // Start the session for setting session variable 
    session_start();
    $_SESSION['main'] = true;
    $_SESSION['message'] = $message;
    header("Location:  https://ec8f-2402-8100-22d3-7f1f-24e7-95cd-381d-97cc.in.ngrok.io/php_chatroom/");

}

else{
    // Connecting the database
    include_once "connection.php";
}



?>