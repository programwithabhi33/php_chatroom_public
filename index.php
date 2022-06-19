<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Freelancer - Start Bootstrap Theme</title>
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

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top">MyChatApp</a>
        </div>
    </nav>

  
    <!-- Masthead-->
    <header class="masthead bg-success text-white text-center">

    <div class="container">
        
        <?php
        // Checking the previsously set session variable in claim.php if set then show alert to the user
        session_start();
         if(isset($_SESSION['main'])){
            echo '
            <div class="alert alert-warning alert-dismissible fade show my-4" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
            <strong>Error!</strong> '.$_SESSION['message'] .'
          </div>
            ';
        // Settting the sesssion as an empty array
        $_SESSION = array();
        // Destroying the session
        session_destroy();
         }
        ?>
        </div>


        <div class="container d-flex align-items-center flex-column">
            <!-- Masthead Avatar Image-->
            <img class="masthead-avatar mb-5" src="assets/img/avataaars.svg" alt="..." />
            <!-- Masthead Heading-->
            <h1 class="masthead-heading text-uppercase mb-0">Chat With Your Friends</h1>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
            </div>
            <!-- Masthead Subheading-->
            <p class="masthead-subheading font-weight-light mb-0">Create A Chatroom </p>
            <form method="post" action="claim.php">
                <div class="mb-3">
                    <input type="text" class="form-control my-2" name="roomname" id="roomname" aria-describedby="emailHelp" required >
                </div>
                <button type="submit" class="btn btn-warning">Create Room</button>
            </form>
        </div>
    </header>


 <?php
        //session_start();
        // <!-- echo $_SESSION['message']; -->
        //$_SESSION = array();
        //session_destroy();
    ?>
 
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>