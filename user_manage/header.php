<?php
    session_start();
    // echo $_SESSION['id'];
    // die();
    if(!isset($_SESSION['id'])) {
        header('location: admin_login.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin View</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="../css/all.css" >
    <link rel="stylesheet" href="../css/pagination.css">
    <link rel="stylesheet" href="../css/jquery.datetimepicker.css">
    <link rel="stylesheet" href="../css/jquery-ui.css">
    <link rel="stylesheet" href="../css/custom.css">
    
    <script src="../js/jquery-3.6.0.js"></script>
    <script src="../js/custom.js"></script>
    <script src="../js/all.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script src="../js/popper.min.js" ></script>
    <script src="../js/jquery.datetimepicker.full.min.js"></script>
    <script src="../js/jquery-ui.js"></script>
    <script src="../js/bootstrap.min.js" ></script>
</head>
<body>