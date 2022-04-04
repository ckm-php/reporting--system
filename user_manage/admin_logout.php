<?php
    session_start();
    session_destroy();

    $url = "admin_login.php";
    if(isset($_GET["expiremsg"])) {
        $url .= "?expiremsg=" . $_GET["expiremsg"];
    }
    header("Location:$url");
    exit();
?>