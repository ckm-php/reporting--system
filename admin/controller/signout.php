<?php 
  require_once('../model/common.php');
session_start();
$_SESSION['email'] ="";
session_destroy();
header("Location:../signin.php");
?>