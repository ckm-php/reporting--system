<?php

if(isset($_GET['logout']))
{
    session_start();
	session_destroy();
	header('location:login.php?logout=true');
	exit;
}

    // session_start();
    // session_destroy();

    // header('Location: login.php');
?>