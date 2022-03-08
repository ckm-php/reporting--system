<?php

session_start();
include '../function.php';
$id = $_GET['delete'];
$data = new Common();

$sqlde = $data->getReturnData("DELETE FROM admin WHERE id = ? ", [$id]);
header("location: management.php");


?>