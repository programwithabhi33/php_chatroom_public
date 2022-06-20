<?php

// Get the parameters
$roomname = $_GET['roomname'];

// Connecting to the db
include_once 'connection.php';

// Check the room already exist or not : Prepring the query
$sql = "SELECT * FROM `rooms` WHERE roomname = '$roomname'"; 

// Executing the query
$result = mysqli_query($con,$sql);

// Checking the query executed or not
if($result){
    // Check the rooom exist or not
    if(mysqli_num_rows($result)==0){
        $message = "This room is not exist";

        // Start the session for setting session variable 
        session_start();
        $_SESSION['main'] = true;
        $_SESSION['message'] = $message;
        $_SESSION['type'] = "warning";
        header("Location:    https://6c4f-2402-8100-22db-e33f-74b9-2b80-ad50-f7e1.in.ngrok.io/php_chatroom/");
    }
    else{
        //echo "Lets Chat Now"
    }
}
else{
    echo "Error:".mysqli_error($con);
}

?>


<!DOCTYPE html>
<html>

<head>

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>MyChatRoom</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
            type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <style>
        body {
            margin: 0 auto;
            /* max-width: 800px; */
            padding: 0 20px;
        }


        .time-right {
            /* float: right; */
            color: #aaa;
        }
        .main{
            height:480px;
            overflow-y:scroll;
        }
        .button{
          display:block;
          background:#25d366;
          max-width:180px;
          padding:11px 15px;
          color:#fff;
          font-weight:700;
          font-size:14px;
          text-align:center;
          text-transform:uppercase;
          letter-spacing:0.5px;
          margin:auto;
          border-radius:100%;
          transition:all .3s;
          border :none;

        }
        #msg{
            display:inline;
            width:80%;

        }
        #submit{
            display:inline;
        }
    </style>
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar bg-primary rounded my-2">
        <div class="container-fluid">
          <span class="navbar-brand mb-0 h1">MyChatApp</span>
        </div>
      </nav>

    <h2>Chat Messages-
        <?php echo $roomname; ?>
    </h2>

    <div>
        <div class="main">

        </div>
 
    </div>

    <div>
         <input id="msg" type="text" class="form-control my-2" name="msg" placeholder="Message">
        <button class="button my-2 mx-2" id="submit">&#x27A4;</button>
    </div>

</body>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<script>

// Check new messages in every 1 second
setInterval(() => {
    $.post("htcont.php",{room:'<?php echo $roomname; ?>'},
    function(data,status){
        document.getElementsByClassName('main')[0].innerHTML = data;
    }
    );
}, 10);


// Get the input field
var input = document.getElementById("msg");

// Execute a function when the user presses a key on the keyboard
input.addEventListener("keypress", function(event) {
  // If the user presses the "Enter" key on the keyboard
  if (event.key === "Enter") {
    // Cancel the default action, if needed
    event.preventDefault();
    // Trigger the button element with a click
    document.getElementById("submit").click();
  }
});
    
    $("#submit").click(function(){
        let clientmsg = $("#msg").val();
    $.post("postmsg.php",{
        text:clientmsg,
        room:'<?php echo $roomname; ?>',
        ip: '<?php echo $_SERVER['REMOTE_ADDR']; ?>'
    },
        function (data,status){
            document.getElementsByClassName('main')[0].innerHTML = data;
        });
        $('#msg').val("");
        return false;
});


</script>

</html>