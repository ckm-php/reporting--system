<?php
session_start();
include '../function.php';
$id = $_GET['delete'];
$data = new Common();
$row = $data->getOneRowData("SELECT * FROM report WHERE id = ? ", [$id]);
if($_SESSION['id'] == $row['adminId']) { 
    $sqlde = $data->getReturnData("DELETE FROM report WHERE id = ? ", [$id]);
    header("location: index.php");
}
else{
    echo "This page will allow by user only. Please login";
}


?>