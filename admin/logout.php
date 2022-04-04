<?php
    session_start();
	session_destroy();
    $url = "login.php";
    if(isset($_GET["expiremsg"])) {
        $url .= "?expiremsg=" . $_GET["expiremsg"];
    }
    header("Location:$url");
    exit();

    // if(isset($_GET['expiremsg'])) {
    //     header('location:login.php?expiremsg');
    // }
    // header('location:login.php');
	// exit;  

    // session_start();
	// session_destroy();
    // $url = "login.php";
    // if(isset($_GET["session_expired"])) {
    //     $url .= "?session_expired=" . $_GET["session_expired"];
    // }
    // header("Location:$url");

   
?>