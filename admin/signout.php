<?php 
session_start();
$_SESSION['email'] ="";
session_destroy();
include 'signin.php';
?>